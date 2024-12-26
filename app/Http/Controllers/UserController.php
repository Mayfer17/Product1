<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "User page";
    }

    /**
     * Show the form for creating a new resource.
     * แสดงที่กรอกข้อมูลเพื่อเพิ่มข้อมูลใหม่
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * นำข้อมูลที่มาจาก form เก็บไว้ในที่เก็บข้อมูล
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * เลือกแสดงข้อมูลที่อยากให้แสดงขึ้นมา
     */
    public function show(string $user)
    {
        return "User page ".$user; //การต่อstringของ php ใช้ .(จุด)
    }

    /**
     * Show the form for editing the specified resource.
     * แสดงที่กรอกข้อมูลเพื่อแก้ไขในส่วนที่อยากแก้
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * แก้ไขข้อมูลนั้นๆในที่จัดเก็บข้อมูล
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * ลบข้อมูลที่ต้องการออกจากที่เก็บข้อมูล
     */
    public function destroy(User $user)
    {
        //
    }
}
