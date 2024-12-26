<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest; // นำเข้า ProfileUpdateRequest สำหรับการตรวจสอบข้อมูลที่อัพเดต
use Illuminate\Contracts\Auth\MustVerifyEmail; // นำเข้าอินเทอร์เฟซ MustVerifyEmail สำหรับตรวจสอบว่าอีเมลต้องยืนยันหรือไม่
use Illuminate\Http\RedirectResponse; // นำเข้า RedirectResponse สำหรับการเปลี่ยนเส้นทางหลังจากการดำเนินการเสร็จ
use Illuminate\Http\Request; // นำเข้า Request สำหรับการเข้าถึงข้อมูลจากคำขอของผู้ใช้
use Illuminate\Support\Facades\Auth; // นำเข้า Auth สำหรับการจัดการการยืนยันตัวตนของผู้ใช้
use Illuminate\Support\Facades\Redirect; // นำเข้า Redirect สำหรับการเปลี่ยนเส้นทางหลังจากการดำเนินการเสร็จ
use Inertia\Inertia; // นำเข้า Inertia สำหรับการใช้ Inertia.js ในการเรนเดอร์หน้าเว็บ
use Inertia\Response; // นำเข้า Response เพื่อระบุประเภทการตอบสนองจาก Inertia

class ProfileController extends Controller
{
    /**
     * แสดงฟอร์มโปรไฟล์ของผู้ใช้
     */
    public function edit(Request $request): Response
    {
        // เรนเดอร์หน้าฟอร์มโปรไฟล์และส่งข้อมูลต่างๆ ไปยัง Vue/React ผ่าน Inertia
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail, // ตรวจสอบว่าอีเมลของผู้ใช้ต้องยืนยันหรือไม่
            'status' => session('status'), // ส่งสถานะข้อความที่เก็บในเซสชัน (ถ้ามี)
        ]);
    }

    /**
     * อัพเดตข้อมูลโปรไฟล์ของผู้ใช้
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // เติมข้อมูลที่ผู้ใช้ส่งมาไปยังผู้ใช้ที่ล็อกอิน
        $request->user()->fill($request->validated());

        // ตรวจสอบว่ามีการเปลี่ยนแปลงอีเมลหรือไม่
        if ($request->user()->isDirty('email')) {
            // ถ้ามีการเปลี่ยนแปลงอีเมล จะรีเซ็ตค่า email_verified_at เป็น null
            $request->user()->email_verified_at = null;
        }

        // บันทึกการเปลี่ยนแปลง
        $request->user()->save();

        // เปลี่ยนเส้นทางไปยังหน้าฟอร์มแก้ไขโปรไฟล์
        return Redirect::route('profile.edit');
    }

    /**
     * ลบบัญชีผู้ใช้
     */
    public function destroy(Request $request): RedirectResponse
    {
        // ตรวจสอบรหัสผ่านของผู้ใช้เพื่อยืนยันว่าเป็นรหัสผ่านปัจจุบัน
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // เข้าถึงผู้ใช้ที่ล็อกอิน
        $user = $request->user();

        // ล็อกเอาท์ผู้ใช้
        Auth::logout();

        // ลบบัญชีผู้ใช้จากฐานข้อมูล
        $user->delete();

        // ทำการล้างข้อมูลในเซสชันและรีเจนเนอเรตโทเค็นเพื่อความปลอดภัย
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // เปลี่ยนเส้นทางไปยังหน้าแรก
        return Redirect::to('/');
    }
}
