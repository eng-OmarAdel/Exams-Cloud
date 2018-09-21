@extends('layout.app')


@section('content')
    <h1>Questions <h1>
            @if (count($questions)>0)
            @foreach ($questions as $question)
                <div class="card" >
                <h3> <a href="/questions/{{$question->id}}" >{{ $question->title}} <a></h3>
                <h6> written on: {{$question->created_at}}</h6>
                </div>
            @endforeach
        
    @endif
    
    @endsection