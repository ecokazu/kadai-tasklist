@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>{{ $tasklist->id }}のメッセージの編集ページ</h1>

    
{!! Form::model($tasklist, ['route' => ['task.update', $tasklist->id], 'method' => 'put']) !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}


       {!! Form::label('status', 'ステータス:') !!}
        {!! Form::select('status',  [
   '未着手' => '未着手',
   '着手' => '着手',
   '完了' => '完了']
   )!!}
   
   
        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection