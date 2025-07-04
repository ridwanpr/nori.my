<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index(): View
    {
        return view('frontend.inquiry.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'cf-turnstile-response' => app()->environment('production') ? ['required', Rule::turnstile()] : [],
        ]);

        Inquiry::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('inquiry.index')->with('success', 'Pesan anda telah diterima dan akan segera kami proses.');
    }
}
