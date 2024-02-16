@extends('layout')
@section('title', 'edit title')
@section('content1')
    <form action="{{ route('update', $getblogs->id) }}" method="post">
        @csrf
        <h1>Change Title</h1>
        <label for="">Title</label>
        <input type="text" name="title" value="{{ $getblogs->title }}">
        <label for="">Content</label>
        <input type="text" name="content" value="{{ $getblogs->content }}">
        <button type="submit">Submit</button>
    </form>
@endsection