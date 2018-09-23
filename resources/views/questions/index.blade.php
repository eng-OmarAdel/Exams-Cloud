@extends('layout.app')


@section('content')
    <br><h1>Questions <h1><br>
            @if (count($questions)>0)
            @foreach ($questions as $question)
                <div class="card" >
                <h3> <a href="#" >{{ $question->title}} <a></h3>
                <h6> written on: {{$question->created_at}}</h6>
                <button class="btn btn-md btn-success" onclick="location.href='/questions/{{$question->id}}';">View Question</button>&nbsp;
                <button class="btn btn-md btn-info" onclick="location.href='/questions/{{$question->id}}/take';">Answer Question</button>
                <br>
                </div><br>
            @endforeach
        
    @endif
    
    @endsection