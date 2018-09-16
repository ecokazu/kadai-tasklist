@extends('layouts.app')

@section('content')

<h1>メッセージの新規投稿</h1>



{{--モデルインスタンス名,連想配列routeで実行先を指定--}}
{!! Form::model($tasklist,['route'=>'tasklist.store'])!!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}
    
@endsection