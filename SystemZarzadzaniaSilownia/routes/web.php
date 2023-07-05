<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddUsersController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\BMIController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TEST;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Routing strony domowej
Route::get('/home', [HomeController::class, 'index'])->name('adminLte/dashboard');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }else{
        return view('auth/login');
    }
});

Auth::routes();

//Routing wylogowania
Route::get('logout', [HomeController::class, 'logout']);

//Routing strony kontaktowej
Route::get('contact',[ContactController::class, 'index'])->middleware('auth');


//Routing edycji profilu
Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::post('changeAddress', [ProfileController::class, 'changeAddress'])->middleware('auth');;
Route::post('changePhoneNumber', [ProfileController::class, 'changePhoneNumber'])->middleware('auth');
Route::post('changePassword', [ProfileController::class, 'changePassword'])->middleware('auth');
Route::post('deleteAccount', [ProfileController::class, 'deleteAccount']);
Route::post('changeNip', [ProfileController::class, 'changeNip'])->middleware('auth');
Route::post('changeGymAddress', [ProfileController::class, 'changeAddressGym'])->middleware('auth');;
Route::post('changeGymPhoneNumber', [ProfileController::class, 'changeGymPhoneNumber'])->middleware('auth');
Route::post('changeGymName', [ProfileController::class, 'changeGymName'])->middleware('auth');
Route::post('changeGymEmail', [ProfileController::class, 'changeGymEmail'])->middleware('auth');

Route::post('sendMessage', [HomeController::class, 'sendMessage']);

Route::get('mail', function ()
{
    return view('sites/mail');
})->middleware('auth');


Route::get('users', [AddUsersController::class, 'ShowUsers'])->name('users')->middleware('auth');
Route::get('addowner', [AddUsersController::class, 'index'])->middleware('auth');
Route::post('adduser', [AddUsersController::class, 'store'])->middleware('auth');

Route::get('user-edit/{id}', [AddUsersController::class, 'editUser'])->middleware('auth');
Route::put('user-update/{id}', [AddUsersController::class, 'updateUser'])->middleware('auth');
Route::delete('user-delete/{id}', [AddUsersController::class, 'deleteUser'])->middleware('auth');
Route::post('user-upload-image',[ProfileController::class, 'uploadImage']);

Route::get('exerciseCalendar', [CalendarController::class, 'index'])->middleware('auth');
Route::post('manage-events', [CalendarController::class, 'manageEvents'])->middleware('auth');
Route::delete('delete-events/{id}', [CalendarController::class, 'deleteEvents'])->middleware('auth');

Route::get('membership', [MembershipController::class, 'ShowMemberships'])->name('karnet')->middleware('auth');
Route::get('addkarnet', [MembershipController::class, 'index'])->middleware('auth');
Route::post('addMemberships', [MembershipController::class, 'addMemberships'])->middleware('auth');

Route::post('place-order', [OrdersController::class, 'placeorder']);


Route::get('chat', function ()
{
    $data['messages'] = DB::table('messages')->orderBy('data', 'desc')->limit(15)->get()->toArray();
    $data1['newUsers'] = DB::table('users')->orderBy('created_at', 'desc')->get();
    return view('layouts/chat',$data,$data1);
});

Route::get('bmi', [BMIController::class, 'index'])->middleware('auth');
Route::post('calculate_bmi', [BMIController::class, 'calculateBMI'])->middleware('auth');

Route::get('kcal', [BMIController::class, 'index2'])->middleware('auth');
Route::post('calculate_kcal', [BMIController::class, 'calculateKCAL'])->middleware('auth');

Route::get('order_history', [OrderListController::class, 'ShowOrders'])->name('invoices')->middleware('auth');
Route::get('order-show/{id}', [OrderListController::class, 'showSingleOrder'])->middleware('auth');
Route::get('order_history_all', [OrderListController::class, 'ShowAllOrders'])->middleware('auth');

Route::get('trainers', [TrainerController::class, 'index'])->name('trainers')->middleware('auth');

Route::get('test', [TEST::class, 'index']);

Route::post('add-rating/{id}', [TrainerController::class, 'rating'])->middleware('auth');

