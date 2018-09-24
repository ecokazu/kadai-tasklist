@extends('layouts.app')

@section('content')


<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
    
<h1>全てののタスク一覧</h1>
試しに全データを表示のページ

ログイン中のID:{{$authuser}}
@if(count($tasklists)>0)
 <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                     <th>備考</th>
                    <th>ステータス</th>
                    <th>担当者</th>
                    <th>担当者ID</th>
                </tr>
            </thead>


    @foreach($tasklists as $tasklist)
    
    
    <tr>
    {{-- link_to_route(リンク先, リンクのアンカーテキスト, リンク先urlに該当のid --}}
        <td>{!! link_to_route('task.show',$tasklist->id, ['id' => $tasklist->id]) !!}</td>
        
        @if($authuser==$tasklist->user->id)
        <td><b>{{ $tasklist->title }}</b></td>
        
        @else
        <td>{{ $tasklist->title }}</td>
        @endif
        
        <td>{{ $tasklist->content }}</td>
        <td>{{ $tasklist->status }}</td>
        <td>{{ $tasklist->user->name }}</td>
       <td> {{ $tasklist->user->id }}</td>
    </tr>    
        
    @endforeach

</table>




@endif

{!! $tasklists->render() !!}

</div>
@endsection