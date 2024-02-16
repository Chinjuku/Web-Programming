@extends('layout')
@section('title', 'about me')
@section('content') 
    <p>ชื่อเล่น : {{ $name }}</p>
    <p>วันเกิด : {{ $date }}</p>
@endsection