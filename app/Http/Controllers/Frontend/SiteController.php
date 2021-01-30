<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;


class SiteController extends Controller{
   public  function index()
   {
    return view('frontend.home');
   }

   public  function singlePost()
   {
    return view('frontend.single-post');
   }

   //Registration method
   public  function showRegisterFrom()
   {
    return view('frontend.auth.register');
   }
   public  function registration(UserRegistration $request)
   {
      /* $photo = $request->file('photo');
       if ($photo->isValid()){
           $file_name = rand(11111,999999).date('ymdhis.').$photo->getClientOriginalExtension();
           $photo->storeAs('usersimages',$file_name);
       }*/
       try{
           User::create([
               'name'  => $request->name,
               'email'  => $request->email,
               'password'  => bcrypt($request->password)
           ]);
           session()->flash('type','success');
           session()->flash('message','User registration success...');
       }catch (Exception $exception){
           session()->flash('type','danger');
           session()->flash('message',$exception->getMessage());
       }
       return redirect()->back();
   }

   //login method
    public  function showLoginForm()
    {
        return view('frontend.auth.login');
   }
   public  function login(Request $request){
    $data = $request->validate([
        'email'     => 'required|email',
        'password'  => ['required','min:6'],//array style
    ]);
   if ( auth()->attempt($data)) {
     return redirect('/');

     }else{
       session()->flash('type','danger');
       session()->flash('message','These credentials do not match our records.');
       return redirect()->back();
   }
   }
   //logout method
    public  function logout(){
       auth()->logout();
        return redirect('/');

    }

}
