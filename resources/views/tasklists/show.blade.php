@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>id = {{ $tasklist->id }} のメッセージ詳細ページ</h1>

<p>{{ $tasklist->content }}＞＞{{ $tasklist->status }}</p>

{!! link_to_route('task.edit', 'このメッセージを編集', ['id' => $tasklist->id]) !!}

{!! Form::model($tasklist,['route'=>['task.destroy',$tasklist->id],'method' => 'delete']) !!}
    {!! Form::submit('削除') !!}
    {!! Form::close() !!}


@endsection