<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use App\Models\Patient;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        
        $req->validate([
            'nam'=>'required',
            'mail'=>'required|email:rfc',
            'uname'=>'required|alpha_num',
            'pass'=>'required|alpha_num',
            'gender'=>'required|alpha',
            'dob'=>'date',
            'pp'=>'required|mimes:jpg,png'
  
  
        ]);
        if($req->hasFile('pp'))
        {
          $req->pp->store('dp', 'public');
          $patient=new Patient();
          $patient->patient_name = $req->nam;
          $patient->patient_email = $req->mail;
          $patient->patient_un= $req->uname;
          $patient->patient_pass = $req->pass;
          $patient->patient_dob= $req->dob;
          $patient->patient_gender = $req->gender;
          $patient->patient_dp=$req->pp->hashName();
          
          $patient->save();
          return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function logout() {

        session()->forget('admin_username');
        return redirect()->route('admin_login');
    }

    public function dashboard(){

        return view('Admin.dashboard');
    }

    public function patient_reg(){
        return view('Admin.Createpatient');
    }
    public function showUsers(){
        $patient=Patient::all();
        return view('Admin.managepatient')->with('patients',$patient);
    }
    public function adminlogin(Request $req){

        $req->validate([
            'uname'=>'required',
            'pass'=>'required'
        ]);

        $username = $req->uname;
        $password = $req->pass;

        $admin = Admin::whereRaw("BINARY admin_username = '$username'")->whereRaw("BINARY admin_pass = '$password'")->first();

        if($admin){

        $req->session()->put('admin_username',$username);
        if($req->remember){
            setcookie('uname',$req->uname, time()+20);
            setcookie('pass',$req->pass, time()+20);
            return redirect()->route('admin_dashboard');
        }


        return redirect()->route('admin_dashboard');

        }else{

            return 'Invalid username or password ' . $password;

        }


    }
    public function showUser(Request $req){

        $patient = Patient::where('patient_id',$req->id)->first();

        return view('Admin.viewuser')->with('patient',$patient);

    }
    public function updateProfile(Request $req) {

        $req->validate([

            'nam'=>'required',
            'mail'=>'required|email:rfc',
            'uname'=>'required|alpha_num',
            'pass'=>'required|alpha_num',
            
            'dob'=>'date',
        ]);

        $patient=Patient::where('patient_id',$req->p_id)->first();
        $patient->patient_name = $req->nam;
          $patient->patient_email = $req->mail;
          $patient->patient_un= $req->uname;
          $patient->patient_pass = $req->pass;
          $patient->patient_dob= $req->dob;
        $patient->save();

        return redirect()->route('manage_patients');




    }
    public function editUser(Request $req){

        $patient = Patient::where('patient_id',$req->id)->first();

        return view('Admin.edituser')->with('patient',$patient);

    }

    public function deleteUser(Request $req){

        $patient = Patient::where('patient_id',$req->id)->first();
        $patient->delete();
        return redirect()->route('manage_patients');

    }

}
