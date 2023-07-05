<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function index()
    {
        return view('sites/bmi');
    }
    public function index2()
    {
        return view('sites/kcal');
    }

    public function calculateBMI(Request $request)
    {
        $wzrost = $request->wzrost/100;
        $przedzial;
        $bmi = round($request->waga/($wzrost*$wzrost),2);
        if($bmi>=40){
            $przedzial="otyłość skrajna";
        }else if($bmi>=35){
            $przedzial="II stopień otyłości";
        }else if($bmi>=30){
            $przedzial="I stopień otyłości";
        }else if($bmi>=25){
            $przedzial="nadwaga";
        }else if($bmi>=18.5){
            $przedzial="wartość prawidłowa";
        }else if($bmi>=17){
            $przedzial="niedowaga";
        }else if($bmi>=16){
            $przedzial="wychudzenie";
        }else{
            $przedzial="wygłodzenie";
        }

        return view("sites/bmi_resault")->with("bmi",$bmi)->with("przedzial",$przedzial);
    }


    public function calculateKCAL(Request $request)
    {
        $pal;
        $kcal;
        $waga = $request->waga;
        $wzrost = $request->wzrost;
        $wiek = $request->wiek;
        $activity = $request->activity;
        if($activity==0){
            $pal=1.2;
        }else if($activity==1){
            $pal=1.4;
        }else if($activity==2){
            $pal=1.6;
        }else if($activity==3){
            $pal=1.8;
        }else if($activity==4){
            $pal=2.0;
        }

        if($request->plec=="Kobieta"){
            $kcal=(655+(9.6*$waga)+(1.8*$wzrost)-(4.7*$wiek))*$pal;
        }else{
            $kcal=(66+(13.7*$waga)+(5*$wzrost)-(6.8*$wiek))*$pal;
        }

        return view("sites/kcal_resault")->with("kcal",$kcal);
    }
}
