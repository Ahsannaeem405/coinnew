<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Footer;
use App\Models\add_coin;
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
    
    public function coinUpdate(Request $request,$id)
    {
        $data=add_coin::find($id);
        $data->name=$request->name;
        $data->sym=$request->sym;
        $data->des=$request->des;
        $data->telegram=$request->telegram;
        $data->web=$request->web;
        $data->address=$request->address;
        $data->other=$request->other;
        $data->e_c_address=$request->e_c_address;
        $data->logo_link=$request->logo_link;
        $data->act_price=$request->act_price;
        $data->mark_cap=$request->mark_cap;
        $data->launch_date=$request->launch_date;
        $data->sol_address=$request->sol_address;
        $data->facebook=$request->facebook;
        $data->twi=$request->twi;
        $data->rec=$request->rec;
        $data->youtube=$request->youtube;
        $data->insta=$request->insta;
        $data->chart=$request->chart;
        if(isset($request->image))
         {
         $image=$request->file('image');
         $imageName = $image->getClientOriginalName();
         $data->image=$imageName;
         $path=$image->move(public_path('images'),$imageName);
            
         }
        $data->save();
        if(\Auth::user()->role=='admin')
        {
         return redirect('admins/coin')->with('success', 'You Successfully update it');
        }
        else{
         return back()->with('success', 'Your Successfully Update it');
        }
    }
}
