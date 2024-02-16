<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function aboutme() {
        $name = "Chinjung";
        $date = "11/06/2547";
        return view('about', compact('name', 'date')); // compact() : เป็นตัวส่งข้อมูลไปยัง view
    }
}
