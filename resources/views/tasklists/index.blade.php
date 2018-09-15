@extends('layouts.app')

@section('content')

<!-- 8.6 MessagesController@storeから -->

<h1>TASK一覧</h1>

@if(count($tasklists)>0)
<ul>
    @foreach($tasklists as $tasklist)
    
    {{-- link_to_route(リンク先, リンクのアンカーテキスト, リンク先urlに該当のid --}}
        <li>{{$tasklist->id}}:{!! link_to_route('tasklist.show','詳細', ['id' => $tasklist->id]) !!}:{{ $tasklist->content }}
        </li>
        
        
    @endforeach
    
    
</ul>



@endif

{!! link_to_route('tasklist.create','新規メッセージ') !!}

@endsection