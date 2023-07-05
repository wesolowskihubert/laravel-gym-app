<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    public function index(){
        $data1['allTrainers'] = DB::table('users')->where("account_type","Trener")->orderBy('id')->get();
        return view('sites/trainers',$data1);
        //return $data1;
    }

    public function rating(Request $request, $id){
        DB::table('ratings')->insert([
            'oceniajacy_id' => Auth::user()->id,
            'trainer_id' => $id,
            'rating' => $request->input("trainer_rating")]);
        return redirect()->route('trainers');
    }
}
