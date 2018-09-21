@extends('layout.app')


@section('content')
<br>
<a class="btn btn-dark" href="/questions">back</a><br><br>
        <h1>{{ $question->title}} <h1>
            <div > 
                @if($question->kind =='MCQ')
                    {!!$question->answer1!!}<br>
                    {!!$question->answer2!!}<br>
                    {!!$question->answer3!!}<br>
                    {!!$question->answer4!!}<br>
                @endif
                @if($question->kind =='simple' || $question->kind =='tf')
                    {!!$question->answer!!}
                @endif
            </div>
            <hr>
      <h6> written on: {{$question->created_at}}</h6>
         <hr>
       

        {!!Form::open(['action' => ['questionsController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        <a class="btn btn-dark" href="/questions/{{$question->id}}/edit">Edit</a>
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
                @endsection