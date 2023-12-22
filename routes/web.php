<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    // fetch all users
    //$user = DB::select('select * from users');
    // $user = DB::table('users')->get();
    // dd($user);
    $users = User::find(17);
    dd($users->email);

    // create new users
    /*$user = DB::insert('insert into users ( name,email,password ) values (?,?,?)', ['Sumon Sk','ikbalasif1465@gmail.com','password']);
    dd($users);*/
    /*$user = DB::table('users')->insert([
        'name'=> 'Juel rana',
        'email'=>'asif.pasdigitech@gmail.com',
        'password'=>'password',
    ]);
    dd($user);*/
    /*$user = User::create([
        'name'=> 'Rony',
        'email'=>'rony.pasdigitech@gmail.com',
        'password'=>'password',
    ]);
    dd($user);*/

    // update existing users
    /*$user = DB::update("update users set name='Asif Ikbal' where name=?", ['panu delar']);
    dd($user);*/
    /*$user = DB::table('users')->where('id',13)->update(['email'=>'asifikbal8081@gmail.com','password'=>'afif']);
    dd($user);*/
    /*$user = User::where('id', 14)->update(['email'=>'asifikbal8081@gmail.com']);
    dd($user);*/

    // delete existing user
    /*$user = DB::delete("delete from users where name=?",['Juel Rana']);
    dd($user);*/
    /*$user = DB::table('users')->where('id',13)->delete();
    dd($user);*/
    /*$user = User::where('id',16)->delete();
    dd($user);*/
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
