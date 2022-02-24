<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Footer;
use App\Models\Promote;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function promote()
    {
        $promote = Promote::find(1);

        return view('admin.promote', compact('promote'));
    }


    public function update_promote(Request $request)
    {
        $promote = Promote::find(1);

        if ($request->logo) {
            $file = $request->logo;
            $extension = $request->logo->extension();
            $fileName = time() . "_." . $extension;
            $request->logo->move('upload/images/', $fileName);
            $promote->logo = $fileName;
        }

        $promote->title = $request->title;
        $promote->content = $request->content;
        $promote->email = $request->email;
        $promote->save();

        return redirect()->back()->with('success', 'Promote Content is Updated Successfully.');
    }

    public function footer()
    {
        $footer = Footer::find(1);


        return view('admin.footer', compact('footer'));
    }

    public function update_footer(Request $request)
    {
        $footer = Footer::find(1);

        if ($request->logo) {
            $file = $request->logo;
            $extension = $request->logo->extension();
            $fileName = time() . "_." . $extension;
            $request->logo->move('upload/images/', $fileName);
            $footer->logo = $fileName;
        }

        $footer->slogan = $request->slogan;
        $footer->copyright = $request->copyright;
        $footer->save();

        return redirect()->back()->with('success', 'Footer Content is Updated Successfully.');
    }

    public function email()
    {
        return view('admin.email');
    }

    public function update_email(Request $request)
    {
        User::where('role','admin')->update([
            'newsletter_email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Email Updated Successfully.');
    }
}
