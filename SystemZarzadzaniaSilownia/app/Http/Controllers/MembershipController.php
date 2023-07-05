<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{
    public function index()
    {
        $karnet = Membership::all();
        return view('sites/add_karnet');
    }

    public function ShowMemberships()
    {
        $data1['allMemberships'] = DB::table('memberships')->orderBy('id')->paginate(1);

        return  view('sites/membershiplist',$data1);
    }

    public static function showToday($dni)
    {
        $active_karnet=DB::table('active_memberships')->where('user_id', Auth::user()->id)->count();
        if(MembershipController::showExpiryAlert()){

            $today = Carbon::today()->format('Y-m-d');
            return $today;

          }else if($active_karnet==0){

            $today = Carbon::today()->translatedFormat('Y-m-d');
            return $today;

        }else{
            $today = DB::table('active_memberships')->select('karnet_expiry')->where('user_id', Auth::user()->id)->get();
            return $today[0]->karnet_expiry;
        }
    }

    public static function showExpiredDate(){
       if(DB::table('active_memberships')->select("karnet_expiry")->where("user_id",Auth::user()->id)->count()>0){
            $expiredDate = DB::table('active_memberships')->select("karnet_expiry")->where("user_id",Auth::user()->id)->get();
            $expiredDate = $expiredDate[0]->karnet_expiry;
            return $expiredDate;
         }else{
            return 0;
         }
    }

    public static function showExpiryAlert()
    {
        $today = Carbon::yesterday();
        if(DB::table('active_memberships')->select('karnet_expiry')->where('user_id', Auth::user()->id)->count()>0){
            $exipy_date = DB::table('active_memberships')->select('karnet_expiry')->where('user_id', Auth::user()->id)->get();
            $exipy_date = $exipy_date[0]->karnet_expiry;
            $result = $today->gt($exipy_date);
            return $result;
        }else{
            return 0;
        }
    }

    public static function showExpiry($dni)
    {
        $active_karnet=DB::table('active_memberships')->where('user_id', Auth::user()->id)->count();
        if(MembershipController::showExpiryAlert()){

            $today = Carbon::today()->add($dni, 'days')->format('Y-m-d');
            return $today;

        } else if($active_karnet==0){

            $today = Carbon::today()->add($dni, 'days')->format('Y-m-d');
            return $today;

        } else{
            $today = DB::table('active_memberships')->select('karnet_expiry')->where('user_id', Auth::user()->id)->get();
            $today = $today[0]->karnet_expiry;
            $dueDateTime = Carbon::createFromFormat('Y-m-d', $today, 'Europe/Warsaw')->add($dni, 'days')->format('Y-m-d');
            return $dueDateTime;
        }
    }

    public function addMemberships(Request $request){

        $this->validate($request,[
        "nazwa_karnetu" => "required|string",
        "cena" => "required|numeric",
        "dni_karnetu" => "required|numeric"
        ]);

        $karnet = Membership::create($request->all());

        return redirect()->route('karnet');
    }


}
