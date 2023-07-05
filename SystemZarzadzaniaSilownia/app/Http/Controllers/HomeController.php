<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // $data['messages'] = DB::table('messagesv')->orderBy('data', 'desc')->limit(15)->get()->toArray(); i nie zwracaj $data
       $data1['newUsers'] = DB::table('users')->orderBy('created_at', 'desc')->get();
       $year = ['1','2','3','4','5','6','7','8','9','10','11','12'];
       $thisyear = Carbon::now()->year;
       $user = [];
       $zestawy = [];
       foreach ($year as $key => $value) {
        //   $user[] = Order::where(\DB::raw("DATE_FORMAT(data_zakupu, '%m')"),$value)->count();
        $user[] = DB::table('orders')->whereRaw("DATE_FORMAT(data_zakupu, '%m') = $value")->whereRaw("DATE_FORMAT(data_zakupu, '%Y') =  $thisyear")->where("order_type","Karnet")->count();
        $zestawy[] =DB::table('orders')->whereRaw("DATE_FORMAT(data_zakupu, '%m') = $value")->whereRaw("DATE_FORMAT(data_zakupu, '%Y') =  $thisyear")->where("order_type","Zestaw")->count(); ;
       }
      return view('adminLte/dashboard',$data1)->with('thisyear',$thisyear)->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK))->with('zestawy',json_encode($zestawy,JSON_NUMERIC_CHECK));;
        //return view('home');
    }

      //czatownie
      public function sendMessage(Request $request)
      {
        //$data['messages'] = DB::table('messages')->orderBy('data', 'desc')->limit(15)->get()->toArray();
        DB::table('messages')
        ->insert([
          'kto' => Auth::user()->name,
          'wiadomosc' =>$request->wiadomosc,
          'kto_id' =>Auth::user()->id,
          'image' =>Auth::user()->image,
          ]);
        return response()->json(['success'=>'Successfully']);
      }

    //format date
    public static function formatDate($timestamp) {
        Carbon::setLocale('pl');
        return Carbon::parse($timestamp)->translatedFormat('d F');
    }

    public static function activeMemberships()
    {
      $rekordy = DB::table("active_memberships")->count();
      $yesterday = Carbon::yesterday();
      $aktywny_karnety=0;

      for ($i=1; $i<=$rekordy; $i++) {
        $karnet = DB::table("active_memberships")->where("id",$i)->select("karnet_expiry")->get();
        $karnet = $karnet[0]->karnet_expiry;

        if( $result = $yesterday->lte($karnet)){
            $aktywny_karnety = $aktywny_karnety+1;
        }
       }
      return  $aktywny_karnety;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
