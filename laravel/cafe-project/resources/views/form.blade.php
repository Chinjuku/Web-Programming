@extends('layout')
@section('title', 'Cafe soju')
@section('content1')
    <form method="POST" action="/insert">
        @csrf {{-- ป้อนข้อมูลแบบไม่แสดงเนื้อหาใน URL --}}
        <div>
            <label for="">Title</label>
            <input type="text" name="title">
        </div>
        @error('title') {{-- Show Error --}}
        <div class="my-3">
            <span class="text-red-600">{{$message}}</span>
        </div>
        @enderror
        <div>
            <label for="">Content</label>
            <input type="text" name="content">
        </div>
        @error('content')
        <div class="my-3">
            <span class="text-red-600">{{$message}}</span>
        </div>
        @enderror
        <button class="bg-white border border-black p-[10px]" type="submit">Submit Form</button>
        <a href="/">ไปหน้าหลัก</a>
    </form>
    <div>
        hi
    </div>
@endsection