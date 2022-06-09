<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    //
    public function home(){
        return view('home');
    }

    public function services(){
        return view('services');
    }

    public function about() {
        return view('about');
    }

    public function department(){
        return view('departments');
    }

    public function register()
    {
        return view('reg');
    }

    public function submitted( Request $req)
    {
      $req->validate([
          'name'=>'required|alpha',
          'mail'=>'required|email:rfc,dns',
          'uname'=>'required|alpha_num',
          'pass'=>'required|alpha_num'

      ]);

        $name=$req->name;
        $email=$req->mail;
        $usname=$req->uname;
        return view('submitteddata')->with('username',$usname)->with('name',$name)->with('email',$email);
    }

    public function log()
    {
        return view('login');
    }


    public function contact()
    {
        return view('contact');
    }

    public function loggedin(Request $req)
    {
         $req->validate([
            'uname'=>'required',
          'pass'=>'required'

         ]);
         $data=array(
           'username'=>'Arpita',
           'password'=>'12end'

           );
         
           $usname=$req->uname;
           $pass=$req->pass;

           if($usname==$data['username']&& $pass==$data['password'])
           {
                return view('dashboard')->with('uname',$usname);
           }
           else{
               return "Username and password doesn't matched";
           }
    }

    public function submittedcontact( Request $req)
    {
      $req->validate([
        'name'=>'required',
        'mail'=>'required|email:rfc',
        'info'=>'required'
        
    ]);
        $name=$req->name;
        $email=$req->mail;
        
        return view('showcontact')->with('name',$name)->with('email',$email)->with('info',str($req->info));
      }
}
