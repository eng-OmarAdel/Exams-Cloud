@extends('layout.app')


@section('content')
<br>
        <h1 class="text-center">Create Question <h1><br>
                        {!! Form::open(['action' => 'questionsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Question'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Answer')}}
                            {{Form::text('answer','',['class' => 'form-control', 'placeholder' => 'Answer'])}}
                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
         
                @endsection