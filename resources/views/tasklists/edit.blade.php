@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>{{ $tasklist->id }}のメッセージの編集ページ</h1>

    {{--バリデーション--}}
    @include('commons.error_messages')

{!! Form::model($tasklist, ['route' => ['tasklist.update', $tasklist->id], 'method' => 'put']) !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection