@extends('layout.app')


@section('content')
                @if (count($questions)>0)

    <div class="block">
        <div class="container">
            <h2 class="center">Questions</h2>
            <hr>
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
            @foreach ($questions as $question)
                <div class="card" >
                <h3> <a href="#" >{{ $question->title}} <a></h3>
                <h6> written on: {{$question->created_at}}</h6>
                <button class="btn btn-md btn-success" onclick="location.href='/questions/{{$question->id}}';">View Question</button>&nbsp;
                <button class="btn btn-md btn-info" onclick="location.href='/questions/{{$question->id}}/take';">Answer Question</button>
                <br>
                </div><br>
            @endforeach
        
                </div>
                <!--/ .col-md-10-->
            </div>
            <!--/ .row-->
        </div>
        <!--/ .container-->
        <div class="bg bg-color-neutral opacity-20"></div><!--/ .bg-->
    </div>
    <!--/ .block-->
             <div class="col-md-6 col-offset-1"></div>{{ $questions->links() }}

    @else
                    <h2 class="center">No questions found</h2>
    @endif
    
    @endsection