<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function register()
    {
        return view('Patient.reg');
    }

    public function log()
    {
        return view('Patient.login');
    }
    
    public function loginRequest(Request $req){

        $req->validate([
            'uname'=>'required',
            'pass'=>'required'
        ]);

        $username = $req->uname;
        $password = $req->pass;



        $patient = Patient::whereRaw("BINARY patient_un = '$username'")->whereRaw("BINARY patient_pass = '$password'")->first();

        if($patient){

        $req->session()->put('username',$username);

        if($req->remember){
            setcookie('uname',$req->uname, time()+20);
            setcookie('pass',$req->pass, time()+20);
            return redirect()->route('dashboard');
        }

        return redirect()->route('dashboard');

        }else{

            return 'Invalid username or password ';


        }
        


    }
    public function dashboard(){

        return view('Patient.dashboard');
    }

    public function logout() {

        session()->forget('username');
        return redirect()->route('login');
    }
    public function viewProfile() {

        $patient=Patient::where('patient_un',session('username'))->first();

        return view('Patient.profile')->with('patient',$patient);


    }

    public function editProfile(){

        $patient=Patient::where('patient_un',session('username'))->first();

        return view('Patient.editprofile')->with('patient',$patient);

    }

    public function edit_Profile(Request $req) {

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

        return redirect()->route('profile');




    }


}
