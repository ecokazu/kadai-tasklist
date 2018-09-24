@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
<h1>id = {{ $tasklist->id }} の詳細ページ</h1>


  <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $tasklist->id }}</td>
        </tr>
        <tr>
            <th>タスク名</th>
            <td>{{ $tasklist->title }}</td>
        </tr>
        <tr>
            <th>備考</th>
            <td>{{ $tasklist->content }}</td>
        </tr>
        
        <tr>
            <th>ステータス</th>
            <td>{{ $tasklist->status }}</td>
        </tr>
    </table>
    
    
{!! link_to_route('task.edit', 'このタスクを編集', ['id' => $tasklist->id], ['class' => 'btn btn-default']) !!}


{!! Form::model($tasklist,['route'=>['task.destroy',$tasklist->id],'method' => 'delete']) !!}
    {!! Form::submit('削除',['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

</div>
@endsection