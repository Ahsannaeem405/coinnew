<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\add_coin;
use App\Models\coin_vote;
use App\Models\subscribe;
use App\Models\comment;
use App\Models\contact;
use App\Models\User;
use App\Models\ban_slider_img;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail1;
use App\Mail\SendMail2;

use App\Models\slider_img;
use App\Models\ip_add;
use App\Models\KYC;
use App\Models\Audit;
use DB;
use Session;
use DateTime;

class userController extends Controller
{
    public function coin_save(Request $request)
    {

      $coinSave=new add_coin();
      $coinSave->name= $request->name;
      $coinSave->sym= $request->sym;
      $coinSave->des= $request->des;
      $coinSave->checkbox= $request->checkbox;
      $coinSave->telegram= $request->telegram;
      $coinSave->web= $request->web;
      $coinSave->address_name= $request->address_name;
      $coinSave->address= $request->address;
      $coinSave->other= $request->other;
      $coinSave->e_c_address= $request->e_c_address;
      $coinSave->logo_link= $request->logo_link;
      $coinSave->act_price= $request->act_price;
      $coinSave->mark_cap= $request->mark_cap;
      $coinSave->launch_date= $request->launch_date;
      $coinSave->sol_address= $request->sol_address;
      $coinSave->facebook= $request->facebook;
      $coinSave->twi= $request->twi;
      $coinSave->rec= $request->rec;
      $coinSave->youtube= $request->youtube;
      $coinSave->insta= $request->insta;
      $coinSave->vote= 0;
      $coinSave->devote= 0;
      $coinSave->chart= $request->chart;
      $coinSave->cmc= $request->cmc;
      $coinSave->kyc= $request->kyc;
      $coinSave->audit= $request->audit;

      if(isset($request->image))
        {
        $image=$request->file('image');
        $imageName = $image->getClientOriginalName();
        $coinSave->image=$imageName;
        $path=$image->move(public_path('images'),$imageName);
           
        }
        $coinSave->save();

   //  $coin= $request->only(['name', 'sym', 'des','checkbox', 'telegram', 'web','address_name',  'address', 'other', 'e_c_address',
   //              'logo_link', 'act_price', 'mark_cap', 'launch_date','sol_address','facebook','twi','rec','youtube','insta','chart']);
   //  $coin['created_by']=Auth::user()->id;

   //  $user =add_coin::create($coin);

    return back()->with('success', 'Your Coin is Successfully Saved.');

    }
    public function p_dt($id)
    {

   
    $soc=0;
    $coin=add_coin::where('id',$id)->get();
    $date = date('Y-m-d');

    $tod=coin_vote::where('coin_id',$id)->whereDate('created_at',$date)->count();
   
    return view('p_dt',compact('coin','soc','tod'));

    }

    public function vote(Request $request)
    {
       $id=$request->id;

       $get_vote=add_coin::where('id',$id)->value('vote');
       
       $get_vote_val=add_coin::where('id',$id)->value('devote');

       $userVote=coin_vote::where('user_id', Session::get('id'))->where('coin_id', $id)->first();
 
       $userVote=coin_vote::where('user_id', Session::get('id'))->where('coin_id', $id)->sum('devote');
       $data=add_coin::find($id);
      // dd($userVote);
       if( $userVote > 0)
       {
         //dd($data->devote);

         
         $voty=DB::Table('coin_votes')->where('user_id',Session::get('id'))->where('coin_id',$id)->delete();
         $data->devote=($data->devote - 1);
         $data->vote=($data->vote + 1);
       }else{
         //dd(5678);
         $data->vote=($data->vote + 1);

           
       }
       $data->save();
    
       if(!Auth::user() And !(Session::has('id')))
       {
            $use= new User;
            $use->name = 'gust';
            $use->password=encrypt('123456dummy');
            $use->save();
            Session::put('id', $use->id);
       }
       if(Auth::user())
      {
       $voty=new coin_vote();
       $voty->user_id=Auth::user()->id;
       $voty->coin_id=$id;
       $voty->vote=1;
       $voty->save();


       $savd_ip=new ip_add();
       $savd_ip->user_id=Auth::user()->id;
       $savd_ip->ip=$request->ip();
       $savd_ip->save();

      }
      else{
       $voty=new coin_vote();
       $voty->user_id=Session::get('id');
       $voty->coin_id=$id;
       $voty->vote=1;
       $voty->save();


       $savd_ip=new ip_add();
       $savd_ip->user_id=Session::get('id');
       $savd_ip->ip=$request->ip();

       $savd_ip->save();
      }



       $dat=add_coin::where('id',$id)->value('vote');
       $devote=add_coin::where('id',$id)->value('devote');

       return response()->json(['dat'=>$dat,'id'=>$id,'devote'=>$devote]);


    }


    public function devote(Request $request)
    {
       $id=$request->id;
//   dd( $id);
       $get_vote=add_coin::where('id',$id)->value('devote');
       $get_vote_val=add_coin::where('id',$id)->value('vote');

       $userVote=coin_vote::where('user_id', Session::get('id'))->where('coin_id', $id)->sum('vote');
       //dd($get_vote_val);
       $data=add_coin::find($id);
       if($userVote > 0)
       {
        // dd(1122);
        $voty=DB::Table('coin_votes')->where('user_id',Session::get('id'))->where('coin_id',$id)->delete();
         $data->vote=($data->vote - 1);
         $data->devote=($data->devote + 1);
       }else{
         //dd(5678);
         $data->devote=($data->devote + 1);

         
       }
       $data->save();
      
       if(!Auth::user() And !(Session::has('id')))
       {
            $use= new User;
            $use->name = 'gust';
            $use->password=encrypt('123456dummy');
            $use->save();
            Session::put('id', $use->id);
       }
       if(Auth::user())
      {
       $voty=new coin_vote();
       $voty->user_id=Auth::user()->id;
       $voty->coin_id=$id;
       $voty->devote=1;
       $voty->save();


       $savd_ip=new ip_add();
       $savd_ip->user_id=Auth::user()->id;
       $savd_ip->ip=$request->ip();
       $savd_ip->save();

      }
      else{
       $voty=new coin_vote();
       $voty->user_id=Session::get('id');
       $voty->coin_id=$id;
       $voty->devote=1;
       $voty->save();


       $savd_ip=new ip_add();
       $savd_ip->user_id=Session::get('id');
       $savd_ip->ip=$request->ip();

       $savd_ip->save();
      }



       $dat=add_coin::where('id',$id)->value('devote');

       $vote=add_coin::where('id',$id)->value('vote');

       return response()->json(['dat'=>$dat,'id'=>$id,'vote'=>$vote]);


    }

    public function un_devote(Request $request)
    {
       $id=$request->id;

       $get_vote=add_coin::where('id',$id)->value('devote');
       $data=add_coin::find($id);
  
         $update_vote=$get_vote - 1;         
         $data->devote=$update_vote;
       

       $data->save();

       if(Auth::user())
      {

       $voty=DB::Table('coin_votes')->where('user_id',Auth::user()->id)->where('coin_id',$id)->delete();
      }
      else{
        $voty=DB::Table('coin_votes')->where('user_id',Session::get('id'))->where('coin_id',$id)->delete();

      }
      $dat=add_coin::where('id',$id)->value('devote');
       return response()->json(['dat'=>$dat,'id'=>$id]);

    }
    public function vote_guest(Request $request)
    {
       $id=$request->id;

       $get_vote=add_coin::where('id',$id)->value('vote');
       $update_vote=$get_vote+1;


       $data=add_coin::find($id);
       $data->vote=$update_vote;
       $data->save();
       if(!Auth::user() And !(Session::has('id')))
       {
            $use= new User;
            $use->name = 'gust';
            $use->password=encrypt('123456dummy');
            $use->save();
            Session::put('id', $use->id);
       }
       if(Auth::user())
      {
       $voty=new coin_vote();
       $voty->user_id=Auth::user()->id;
       $voty->coin_id=$id;
       $voty->vote=1;
       $voty->save();
      }
      else{
       $voty=new coin_vote();
       $voty->user_id=Session::get('id');
       $voty->coin_id=$id;
       $voty->vote=1;
       $voty->save();

      }

       $dat=add_coin::where('id',$id)->value('vote');

       $devote=add_coin::where('id',$id)->value('devote');

       return response()->json(['dat'=>$dat,'id'=>$id,'devote'=>$devote]);

    }



    public function un_vote(Request $request)
    {
       $id=$request->id;
       $get_vote=add_coin::where('id',$id)->value('vote');
       if($get_vote > 0)
       {
         $update_vote=$get_vote-1;

       }else{
         $update_vote=$get_vote+1;

       }

       $data=add_coin::find($id);
       $data->vote=$update_vote;
       $data->save();

       if(Auth::user())
      {

       $voty=DB::Table('coin_votes')->where('user_id',Auth::user()->id)->where('coin_id',$id)->delete();
      }
      else{
        $voty=DB::Table('coin_votes')->where('user_id',Session::get('id'))->where('coin_id',$id)->delete();

      }
      $dat=add_coin::where('id',$id)->value('vote');
       return response()->json(['dat'=>$dat,'id'=>$id]);

    }

    public function subscribe(Request $request)
    {

       if (subscribe::where('email', '=', $request->email)->exists()) {

       return back()->with('success', 'This email already subscribe');
       }
       else{

       $dat=new subscribe();
       $dat->email=$request->email;
       $dat->save();
       $data = array(

            'mail'=>$request->email
        );

//    Mail::to('demo1.browntech@gmail.com')->send(new SendMail2($data));

   $naim=User::where('role','admin')->value('newsletter_email');


   Mail::to($naim)->send(new SendMail2($data));

       return back()->with('success', 'Your Successfully Subscribe it');

       }


    }
    public function permote(Request $request,$id)
    {



       $data=add_coin::find($id);
       $data->permote=1;
       $data->save();
       return back()->with('success', 'Your Successfully Promote it');

    }
    public function un_permote(Request $request,$id)
    {


       $data=add_coin::find($id);
       $data->permote=Null;
       $data->save();


       return back()->with('success', 'Your Successfully Un Promote it');

    }
    public function update_vote(Request $request)
    {

       $data=add_coin::find($request->id);
       $data->vote=$request->vote;
       $data->save();
      return back()->with('success', 'Your Successfully vote it');

    }
     public function approve($id)
    {


       $data=add_coin::find($id);
       $data->approve=1;
       $data->save();


       return back()->with('success', 'Your Successfully Un Approve it');

    }
    public function com_save(Request $request)
    {




       $voty=new comment();
       $voty->user_id=Auth::user()->id;
       $voty->coin_id=$request->id;
       $voty->com=$request->com;
       $voty->save();
       $soc=1;
       $id=$request->id;
       $coin=add_coin::where('id',$id)->get();
       return view('p_dt',compact('soc','coin'))->with('success', 'Your Successfully vote it');

    }
    public function contact(Request $request)
    {

       $voty=new contact();
       $voty->name=$request->name;
       $voty->email=$request->email;
       $voty->msg=$request->msg;
       $voty->save();
      $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->msg,
            'mail'=>$request->email
        );

     Mail::to('contact@coinhype.to')->send(new SendMail1($data));
     return back()->with('success', 'Thanks for contacting us!');



    }
    public function audit(Request $request)
    {
       $voty=new Audit();
       $voty->name=$request->name;
       $voty->email=$request->email;
       $voty->msg=$request->msg;
       $voty->save();
      $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->msg,
            'mail'=>$request->email
        );

     Mail::to('contact@coinhype.to')->send(new SendMail1($data));
     return back()->with('success', 'Audit Successfully Submited!');



    }
    public function kyc(Request $request)
    {

       $voty=new KYC();
       $voty->name=$request->name;
       $voty->email=$request->email;
       $voty->msg=$request->msg;
       $voty->save();
      $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->msg,
            'mail'=>$request->email
        );

     Mail::to('contact@coinhype.to')->send(new SendMail1($data));
     return back()->with('success', 'KFC Successfully Submited!');



    }
    public function coin_edit($id)
    {
    $coin=add_coin::find($id);
    return view('coin_edit',compact('coin'));

    }
    public function update_coin(Request $request,$id)
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
       $data->approve=Null;

       $data->update();
       if(Auth::user()->role=='admin')
       {
        return view('admin/coin')->with('success', 'You Successfully update it');
       }
       else{
        return back()->with('success', 'Your Successfully Update it');
       }


    }
    public function save_img(Request $request)
    {




        $data=new slider_img();
        $data->url=$request->url;
        $data->file = $request->file;


          if($request->hasFile('file'))
          {
          $file=$request->file('file');
          $extension=$request->file->extension();
          $fileName=time()."_.".$extension;
          $request->file->move('upload/images/',$fileName);
          $data->file =$fileName;
          }


          $data->save();
          return back()->with('success', 'Your Successfully add Image');


    }
    public function ban_save_img(Request $request)
    {




        $data=new ban_slider_img();
        $data->url=$request->url;
        $data->file = $request->file;


          if($request->hasFile('file'))
          {
          $file=$request->file('file');
          $extension=$request->file->extension();
          $fileName=time()."_.".$extension;
          $request->file->move('upload/images/',$fileName);
          $data->file =$fileName;
          }


          $data->save();
          return back()->with('success', 'Your Successfully add Image');


    }
     public function img_del($id)
    {


       $data=slider_img::find($id);
       $data->delete();
       return back()->with('success', 'Your Successfully Un Approve it');

    }
    public function ban_img_del($id)
    {


       $data=ban_slider_img::find($id);
       $data->delete();
       return back()->with('success', 'Your Successfully Un Approve it');

    }

    public function coin_del($id)
    {
      $data=add_coin::find($id);
      $data->delete();
      return back()->with('success', 'You Successfully Delete it');
    }
    function see_all_coin(Request $request)
    {

      $coin=add_coin::whereNotNull('approve')->skip(2)->take(PHP_INT_MAX)->get();
      return response()->json( array('coin' =>$coin));

    }
    function get_see_all(Request $request)
    {

       $all_coin2=add_coin::select("*")
                            ->whereNotNull('approve')->orderBy('vote', 'DESC')->get();
      $pr_id=$request->id;
      $id=intval($pr_id)+1;
                            
                            
                            //$all_coin2 = $all_coin->sortByDesc('vote');
      //dd($all_coin2,$id);

                            
     return view('see_more_all',compact('all_coin2','id'));

    }
    function get_see_all_admin(Request $request)
    {

       $sub=add_coin::whereNull('permote')->whereNotNull('approve')->where('id', '>',$request->id )
               ->take(50)->get();
     return view('see_more_all1',compact('sub'));

    }
    function get_see_all_admin2(Request $request)
    {

      $sub2=add_coin::whereNull('approve')->where('id', '>',$request->id )->take(50)->get();
      return view('see_more_all2',compact('sub2'));

    }
    function get_see_all_new(Request $request)
    {
           $dt=date('Y-m-d');
           $mon_start=date('Y-m-01', strtotime($dt));
           $mon_end=date('Y-m-t', strtotime($dt));
           $monthly_coin=add_coin::whereNotNull('approve')->whereDate('created_at','>=',$mon_start)->whereDate('created_at','<=',$mon_end)->where('id', '>',$request->id )
               ->take(30)->get();
     return view('see_more_all3',compact('monthly_coin'));

    }
    public function del_user($id)
    {

    $coin=user::find($id)->delete();
    return back()->with('success', 'You Successfully Delete The User');
    }
    public function edit_user($id)
    {

    $user=user::find($id);
    return view('admin/edit_user',compact('user'));
    }
    public function update_user(Request $request,$id)
    {
      $user=user::find($id);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->save();
      return redirect('admins/user')->with('success', 'You Successfully Update The User');

    }
     public function del_msg($id)
    {

       $voty=contact::find($id)->delete();
       return back()->with('success', 'You Successfully Delete it');



     }

     public function searchCoin(Request $request)
     {
    
      $searchCoin['searchCoin'] = add_coin::where('name', 'like', '%' . $request->searchCoin . '%')->get();
      return view('searchCoin',$searchCoin);
     }









}
