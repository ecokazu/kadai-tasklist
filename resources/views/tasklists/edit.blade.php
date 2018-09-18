@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
<h1>{{ $tasklist->id }}のメッセージの編集ページ</h1>


{!! Form::model($tasklist, ['route' => ['task.update', $tasklist->id], 'method' => 'put']) !!}

<div class="form-group">
        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content',null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
       {!! Form::label('status', 'ステータス:') !!}
        {!! Form::select('status',  [
   '未着手' => '未着手',
   '着手' => '着手',
   '完了' => '完了'], null, ['class' => 'form-control']
   )!!}
</div>   
   
        {!! Form::submit('更新',['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>

@endsection