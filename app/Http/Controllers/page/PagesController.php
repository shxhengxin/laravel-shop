<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function root() {
        return view('pages.root');
    }

    public function emailVerifyNotice(Request $request)
    {
        return view('pages.email_verify_notice');
    }
}
