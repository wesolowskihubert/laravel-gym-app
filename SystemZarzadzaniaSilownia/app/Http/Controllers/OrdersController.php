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


class OrdersController extends Controller
{
    public function placeorder(Request $request)
    {
        DB::table('orders')->insert([
            'nazwa_karnetu' => $request->przedmiot,
            'cena' => $request->cena,
            'klient' => $request->klient,
            'klient_id' => Auth::user()->id,
            //'data_zakupu' => Carbon::now(),
            'order_type' => "Karnet",
            'klient_email' => Auth::user()->email,
            'klient_address' => Auth::user()->address,
            'klient_phone' => Auth::user()->phone_number,
        ]);

        $active_karnet=DB::table('active_memberships')->where('user_id', Auth::user()->id)->count();

        if($active_karnet==0) {
            DB::table('active_memberships')->insert([
                'user_id' => Auth::user()->id,
                'karnet_expiry' => $request->karnet_expiry]);
            return response()->json(['success'=>'Data is successfully added']);
        }else{
            DB::table('active_memberships')->update(['karnet_expiry' => $request->karnet_expiry]);
            return response()->json(['success'=>'Data is successfully added']);
        }

    }
}
