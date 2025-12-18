<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class VisitorStatsService
{
    /**
     * Get visitor statistics with caching
     *
     * @return array
     */
    public function getStats(): array
    {
        return Cache::remember('visitor_stats', now()->seconds(5), function () {
            $tableName = config('visitor.table_name', 'shetabit_visits');
            
            return [
                'total_visits' => $this->getTotalVisits($tableName),
                'today_visits' => $this->getTodayVisits($tableName),
                'week_visits' => $this->getWeekVisits($tableName),
                'month_visits' => $this->getMonthVisits($tableName),
            ];
        });
    }

    /**
     * Get total number of visits
     *
     * @param string $tableName
     * @return int
     */
    private function getTotalVisits(string $tableName): int
    {
        try {
            return DB::table($tableName)->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get today's visits
     *
     * @param string $tableName
     * @return int
     */
    private function getTodayVisits(string $tableName): int
    {
        try {
            return DB::table($tableName)
                ->whereDate('created_at', today())
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get this week's visits
     *
     * @param string $tableName
     * @return int
     */
    private function getWeekVisits(string $tableName): int
    {
        try {
            return DB::table($tableName)
                ->whereBetween('created_at', [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ])
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Get this month's visits
     *
     * @param string $tableName
     * @return int
     */
    private function getMonthVisits(string $tableName): int
    {
        try {
            return DB::table($tableName)
                ->whereBetween('created_at', [
                    now()->startOfMonth(),
                    now()->endOfMonth()
                ])
                ->count();
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Clear visitor stats cache
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('visitor_stats');
    }
}