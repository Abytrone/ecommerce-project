<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $validated['email'],
            'subscribed_at' => now(),
            'is_active' => true,
        ]);

        return back()->with('success', 'You have successfully subscribed to our newsletter!');
    }
}
