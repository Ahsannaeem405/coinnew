<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Promote;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function promote()
    {
        $promote = Promote::find(1);

        return view('contact_us', compact('promote'));
    }

    public function footer()
    {
        $footer = Footer::find(1);

        return view('layouts.main', compact('footer'));
    }
}
