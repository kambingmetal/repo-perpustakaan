<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Rate limiting
        $key = 'contact-form:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            return redirect()->route('contact', '#contact-form-section')->withErrors([
                'rate_limit' => "Terlalu banyak percobaan. Silakan coba lagi dalam {$seconds} detik."
            ])->withInput();
        }

        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email:rfc,dns|max:255',
            'phone' => 'required|string|max:20|regex:/^[\+]?[0-9\-\(\)\s]+$/',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000|min:10',
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.regex' => 'Nama hanya boleh mengandung huruf dan spasi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone.required' => 'Nomor telepon harus diisi.',
            'phone.regex' => 'Format nomor telepon tidak valid.',
            'subject.required' => 'Subjek harus diisi.',
            'message.required' => 'Pesan harus diisi.',
            'message.min' => 'Pesan minimal 10 karakter.',
            'message.max' => 'Pesan maksimal 2000 karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact', '#contact-form-section')->withErrors($validator)->withInput();
        }

        try {
            // Store the message
            ContactMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Hit the rate limiter
            RateLimiter::hit($key, 300); // 5 minutes

            return redirect()->route('contact', '#contact-form-section')->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim. Kami akan menghubungi Anda segera.');

        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return redirect()->route('contact', '#contact-form-section')->withErrors([
                'error' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.'
            ])->withInput();
        }
    }
}
