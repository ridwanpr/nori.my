<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryListController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::latest()->paginate(15);
        return view('backend.inquiry-list.index', compact('inquiries'));
    }
}
