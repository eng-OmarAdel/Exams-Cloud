@extends('layout.app')


@section('content')
<a class="btn btn-dark" href="/questions">back</a>
        <h1>{{ $question->title}} <h1>
            <div > 
                {!!$question->body!!}
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