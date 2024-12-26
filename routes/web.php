<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Callback Function คือ เมื่อมีการเข้าไปใน url นั้นแล้ว จะให้ตัวโค้ดทำงานตามที่กำหนดไว้
//call back function + parameter คือ นำค่า parameter ที่มากับ  url มาใช้งาน
Route::get('/', function () {   
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// ไปที่ ProductController
Route::get('/products', [ProductController::class, 'index']);   //แบบ call back function
Route::get('/products/{id}', [ProductController::class, 'show'] //แบบ call back function + parameter
)->middleware(['auth']);  //ตรวจสอบว่าได้ล็อกอินเข้ามาหรือยัง
//Middleware auth ตรวจสอบว่า ผู้ใช้ได้เข้าสู่ระบบแล้วหรือยัง (authenticated)


Route::get('/users/{user}', [UserController::class, 'show']);  // routing ให้แสดงผ่าน controller // แสดงข้อความผ่านตัว routing

// Route::get('/user/{id}', function (string $id) {  //Routing แบบ call back function + parameter
//     return 'User '.$id;          
// });

Route::get('/user', [UserController::class, 'index']); // เพิ่ม path user ให้ไปทำงานที่ index

Route::get('/greeting', function () { //Routing แบบ call back function
    return 'Hello World';               // แสดงข้อความผ่านตัว routing
});

// กำหนดเส้นทางเมื่อเข้า URL '/dashboard' ให้แสดงหน้าที่ชื่อ 'Dashboard' ผ่าน Inertia
// และตรวจสอบว่าได้ทำการล็อกอินแล้วหรือไม่ (auth) และบัญชีผู้ใช้งานต้องได้รับการยืนยัน (verified)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');  // แสดงหน้าที่ชื่อ 'Dashboard' ใน frontend (อาจใช้ Vue หรือ React)
})->middleware(['auth', 'verified'])->name('dashboard');  // ใช้ middleware 'auth' และ 'verified' เพื่อตรวจสอบสถานะผู้ใช้

// ตั้งกลุ่ม route ที่ต้องการให้ผู้ใช้ล็อกอินก่อน (auth)
Route::middleware('auth')->group(function () {
    // เมื่อเข้า URL '/profile' จะเรียกเมธอด 'edit' ของ ProfileController เพื่อแสดงหน้าสำหรับแก้ไขโปรไฟล์
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  
    
    // เมื่อทำการ PATCH ที่ URL '/profile' จะเรียกเมธอด 'update' ของ ProfileController เพื่ออัปเดตข้อมูลโปรไฟล์
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');  
    
    // เมื่อทำการ DELETE ที่ URL '/profile' จะเรียกเมธอด 'destroy' ของ ProfileController เพื่อทำการลบโปรไฟล์
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');  
});

// รวมไฟล์ที่เกี่ยวกับการจัดการการเข้าสู่ระบบและการยืนยันตัวตน (auth routes)
require __DIR__.'/auth.php';  // โหลดไฟล์ที่เกี่ยวกับการเข้าสู่ระบบ (เช่น การสมัครสมาชิก, การล็อกอิน)
