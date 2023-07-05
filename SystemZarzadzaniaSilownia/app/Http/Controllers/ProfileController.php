<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('sites/profile');
    }

    //zmiana adresu
    public function changeAddress(Request $request)
    {
         DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['address' => $request->input('newAddres')]);
        return view('sites/updateData');
    }

    //zmiana numeru telefonu
    public function changePhoneNumber(Request $request)
    {
        $validatedData = $request->validate([
            'newPhoneNumber'=> ['required', 'numeric']
        ]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['phone_number' => $validatedData['newPhoneNumber']]);
        return view('sites/updateData');
    }

    //zmiana hasła
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'newPassword'=> ['required', 'string', 'min:8', 'confirmed']
        ]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['password' =>Hash::make($validatedData)]);
        return view('sites/updateData');
    }

    //usuwanie konta
    public function deleteAccount()
    {
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->delete();

        Auth::logout();
        return view('auth/login');
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
        }
        return redirect()->route('profile');
    }

      //zmiana numeru nip
      public function changeNip(Request $request)
      {
          $validatedData = $request->validate([
              'newNIP'=> ['required', 'numeric']
          ]);
          DB::table('gym')
              ->where('id', 1)
              ->update(['nip' => $validatedData['newNIP']]);
          return view('sites/updateData');
      }

      //zmiana adresu siłowni
    public function changeAddressGym(Request $request)
    {
        $validatedData = $request->validate([
            'newAddressGym'=> ['required']
        ]);
         DB::table('gym')
            ->where('id', 1)
            ->update(['address' => $request->input('newAddressGym')]);
        return view('sites/updateData');
    }

    //zmiana numeru telefonu siłowni
    public function changeGymPhoneNumber(Request $request)
    {
        $validatedData = $request->validate([
            'newPhoneGym'=> ['required', 'numeric']
        ]);
        DB::table('gym')
            ->where('id', 1)
            ->update(['phone' => $validatedData['newPhoneGym']]);
        return view('sites/updateData');
    }

     //zmiana adresu email siłowni
     public function changeGymEmail(Request $request)
     {
        $validatedData = $request->validate([
            'newEmailGym'=> ['required']
        ]);
          DB::table('gym')
             ->where('id', 1)
             ->update(['email' => $request->input('newEmailGym')]);
         return view('sites/updateData');
     }

      //zmiana nazwy siłowni
    public function changeGymName(Request $request)
    {
        $validatedData = $request->validate([
            'newNameGym'=> ['required']
        ]);
         DB::table('gym')
            ->where('id', 1)
            ->update(['nazwa_silowni' => $request->input('newNameGym')]);
        return view('sites/updateData');
    }

}
