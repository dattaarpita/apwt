<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    //
    public function register()
    {
        return view('Patient.reg');
    }

    public function log()
    {
        return view('Patient.login');
    }

    public function submitted( Request $req)
    {
      $req->validate([
          'name'=>'required',
          'mail'=>'required|email:rfc',
          'uname'=>'required|alpha_num',
          'pass'=>'required|alpha_num',
          'gender'=>'required|alpha',
          'dob'=>'date'


      ]);

        $name=$req->name;
        $email=$req->mail;
        $usname=$req->uname;
        $gender=$req->gender;
        $dob=$req->dob;

        return view('Patient.submitteddata')->with('username',$usname)->with('name',$name)->with('email',$email)->with('gender',$gender)->with('dob',$dob);
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
                return view('Patient.dashboard')->with('uname',$usname);
           }
           else{
               return back();
           }
    }

}
