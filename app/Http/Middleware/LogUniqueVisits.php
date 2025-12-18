<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Facade\Visitor;
use Symfony\Component\HttpFoundation\Response;

class LogUniqueVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip if route is in except list
        $except = config('visitor.except', []);
        $routeName = $request->route()?->getName();
        
        if (in_array($routeName, $except)) {
            return $next($request);
        }

        // Generate unique visitor identifier
        $visitorId = $this->generateVisitorId($request);
        
        // Check if this visitor has been logged recently (within last 24 hours)
        $cacheKey = "unique_visit_{$visitorId}";
        
        if (!Cache::has($cacheKey)) {
            Visitor::visit();
            
            // Cache the visitor ID for configured duration to prevent duplicate logging
            $duration = config('visitor.unique_visit_duration', 24);
            Cache::put($cacheKey, true, now()->addHours($duration));
        }

        return $next($request);
    }

    /**
     * Generate a unique identifier for the visitor based on IP, device, platform, and browser
     *
     * @param Request $request
     * @return string
     */
    private function generateVisitorId(Request $request): string
    {
        $ip = $request->ip();
        
        // Use visitor methods to get device, platform, and browser info
        $device = $request->visitor()->device() ?: 'unknown';
        $platform = $request->visitor()->platform() ?: 'unknown';
        $browser = $request->visitor()->browser() ?: 'unknown';
        
        // Create unique identifier from IP, device, platform, and browser
        $identifierParts = [
            $ip,
            $device,
            $platform,
            $browser
        ];
        
        // Hash the combined identifier for privacy and consistent length
        return hash('sha256', implode('|', $identifierParts));
    }
}