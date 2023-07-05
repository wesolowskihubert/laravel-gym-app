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


class AddUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('sites/add_owner');
    }
    public function ShowUsers()
    {
        $users = User::all();
        $data1['allUsers'] = DB::table('users')->orderBy('id')->paginate(5);
        return view('sites/userslist',$data1);
    }

    // public function create()
    // {
    //     $roles = Role::all();
    // }

    public function store(Request $request){

        $this->validate($request,[
        "name" => "required|string",
        "email" => "required|string|email",
        "password" => "required|string|min:6|confirmed"
        ]);

        $request['password']= Hash::make($request['password']);
        $request['image']= 'user.png';
        $user = User::create($request->all());

        return redirect()->route('users');
    }

    public function deleteUser($id){
        User::where('id',$id)->delete();
        return redirect()->route('users');
    }

    public function editUser(Request $request, $id){
       $users = DB::table('users')->where('id',$id)->first();
       return view('sites/editUser')->with('users',$users);
    }

    public function updateUser(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->surname = $request->input('surname');
        $users->email = $request->input('email');
        $users->phone_number = $request->input('phone_number');
        $users->birth_date = $request->input('birth_date');
        $users->address = $request->input('address');
        $users->account_type = $request->input('account_type');
        $users->update();
        return redirect()->route('users');
     }
}
