@extends('layouts.app')

@section('content')





{{--モデルインスタンス名,連想配列routeで実行先を指定--}}

<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
        
 <h1>メッセージの新規投稿</h1>
 
{!! Form::model($tasklist,['route'=>'task.store'])!!}

<div class="form-group">
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::select('status',  [
   '未着手' => '未着手',
   '着手' => '着手',
   '完了' => '完了'], null, ['class' => 'form-control']
   )!!}
</div>   
       
        
        {!! Form::submit('投稿',['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    
</div>

@endsection