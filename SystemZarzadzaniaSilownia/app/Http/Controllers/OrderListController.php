<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class OrderListController extends Controller
{
    public function ShowOrders()
    {
        $orders = Order::all();
        $data1['allOrders'] = DB::table('orders')->orderBy('id')->where("klient_id",Auth::user()->id)->paginate(5);
        return view('sites/orderlist',$data1);
    }

    public function ShowAllOrders()
    {
        $orders = Order::all();
        $data1['allOrders'] = DB::table('orders')->orderBy('id')->paginate(5);
        return view('sites/orderlistall',$data1);
    }

    public function showSingleOrder(Request $request, $id){
        $orders = DB::table('orders')->where('id',$id)->get();
        $gym = DB::table('gym')->get();
        Carbon::setLocale('pl');
        $idd = $id;
        $orders[0]->dataz = Carbon::parse($orders[0]->data_zakupu)->translatedFormat('d F Y');
        if($orders[0]->klient_id==Auth::user()->id || Auth::user()->account_type=="Właściciel"){
            return view('sites/showSingleOrder')->with('orders',$orders)->with('gym',$gym);
        }else{
            return redirect()->route('invoices');
        }
     }

    public function index()
    {
        return view('sites/orderlist');
    }
}
