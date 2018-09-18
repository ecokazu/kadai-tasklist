@extends('layouts.app')

@section('content')

<h1>メッセージの新規投稿</h1>



{{--モデルインスタンス名,連想配列routeで実行先を指定--}}
{!! Form::model($tasklist,['route'=>'task.store'])!!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}
        
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::select('status',  [
   '未着手' => '未着手',
   '着手' => '着手',
   '完了' => '完了']
   )!!}
   
       
        
        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}
    
@endsection