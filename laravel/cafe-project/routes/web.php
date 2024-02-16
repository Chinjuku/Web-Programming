<?php // ใช้อันนี้เป็นหลัก

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
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

// GET Method
Route::get('/', [AdminController::class, 'index']); // return folder views -> file ชื่อ welcome.blade.php

// Route::get('/hi/admin/chinjukusudlhor', function () { // สามารถรับค่า $name เข้ามาได้ 
//     return view('welcome');
// })->name('login'); // คำสั่งตั้งชื่อ route

Route::get('/about', [AboutController::class, 'aboutme'])->name('about');
Route::get('/form', [AdminController::class, 'createform']);    
Route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
Route::get('change/{id}', [AdminController::class, 'change'])->name('change');
Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');

//POST Method
Route::post('insert', [AdminController::class, 'insert'])->name('insert');
Route::post('update/{id}', [AdminController::class, 'updateForm'])->name('update');

Route::fallback( function() {
    return 'ไม่พบหน้าเว็บ (404 ERROR)';
});
// Route::get('/home', function() {
//     return view('home');
// })->name('home');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

