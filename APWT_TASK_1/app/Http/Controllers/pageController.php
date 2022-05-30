<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function hpage()
    {
        return view('Home');
    }

    public function med()
    {
        $f1 = array(
            'Name' => 'Maxpro',
            'price' => '25 tk',
        );
        $f2=array(
            'Name'=>'Osartil',
            'Price'=>'80 tk'

        );
        $f3=array(
            'Name'=>'Calbo',
            'Price'=>'50 tk'

        );
        $f4=array(
            'Name'=>'Biotin',
            'Price'=>'100 tk'
        );
        $f5=array(
            'Name'=>'Floriz',
            'Price'=>'70 tk'

        );
        $f6=array(
            'Name'=>'Multivit',
            'Price'=>'120 tk'
        );
        return view('medicines')->with('med1', $f1)->with('med2', $f2)->with('med3', $f3)->with('med4', $f4)->with('med5', $f5)->with('med6', $f6);
    }
    public function teams()
        {
            return view('team');
        }
        public function about()
        {
            return view('aboutus');
        }
        public function cont()
        {
            return view('contact');
        }
    
}
