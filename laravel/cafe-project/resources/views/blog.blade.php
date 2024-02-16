@extends('layout') {{-- เรียก Layoutมาใช้ใน page --}}
@section('title', 'Cafe soju')
@section('content1')
    <h1>Hi</h1>
    <h1>My</h1>
    <h1>is</h1>
    <h1>Chinjung</h1>
    <h1>!!!!!!!</h1>
@endsection
{{-- @section('content2') --}}
    {{-- @foreach ($register as $item) --}}
        {{-- <h1>{{ $item->fname }}</h1><h1>{{ $item->lname }}</h1> --}}
    {{-- @endforeach --}}
    {{-- {{ print_r($blogs) }} --}}
    {{-- @foreach ($blogs as $item) --}}
        {{-- เรียก key จะได้ผลลัพธ์เป็น values --}}
        {{-- @if ($item->status == 1) --}}
            {{-- <h1 class="text-3xl mb-3">{{ $item->title }}</h1> --}}
            {{-- <h2 class="mb-3">{{ $item->content }}</h2>
        @else
            <h1 class="text-red-500">ไม่มีstatus</h1>
        @endif
        
    @endforeach
@endsection --}}
@section('content2')
    @if (count($blogs) > 0)
        <table class="border border-black mx-[20px] text-center">
            <thead class="border border-black">
                <tr class="border border-black">
                    <th class="border border-black">title</th>
                    <th class="border border-black">Content</th>
                    <th class="border border-black">Edit title</th>
                    <th class="border border-black">Change status</th>
                    <th class="border border-black">Delete Title</th>
                </tr>
            </thead>
                @foreach ($blogs as $item)
                    <tr class="border border-black">
                        <td class="border border-black"><h1 class="text-3xl mb-3">{{ $item->title }}</h1></td>
                        <td class="border border-black"><h2 class="mb-3">{{ Str::limit($item->content, 20) }}</h2></td>
                        <td class="border border-black"> 
                            <a href="{{route('edit', $item->id)}}" class="border rounded-lg p-3 bg-blue-200 border-black">
                                Edit ja
                            </a> 
                        </td>
                        <td class="border border-black">
                            @if ($item->status == true)
                                <a class="border rounded-lg p-3 bg-green-500 border-black" href="{{ route('change', $item->id) }}">Share</a>
                            @else
                                <a class="border rounded-lg p-3 bg-red-500 border-black" href="{{ route('change', $item->id) }}">Clone</a>
                            @endif
                        </td>
                        <td>
                            
                            <a 
                            href="{{ route('delete', $item->id) }}" 
                            class="text-red-600"
                            onclick="return confirm('คุณต้องการลบ {{ $item->title }} หรือไม่ ?')"
                            >
                            Delete data {{ $item->id }}
                            </a>
                        </td>
                    </tr>
                @endforeach
        </table>
        {{$blogs->links()}}
    @else
        <h1>ไม่มีบทความในระบบ</h1>
    @endif
    
@endsection