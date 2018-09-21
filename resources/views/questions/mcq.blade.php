@extends('layout.app')


@section('content')
<br>
<h1 class="text-center">Create Question <h1><br>
                        {!! Form::open(['action' => 'questionsController@storemcq', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <br>
                        <div class="form-group">
                            {{Form::label('body', 'Answers')}}
                            {{Form::text('answer1', '', ['id' => '', 'class' => 'form-control', 'placeholder' => 'Choice 1'])}}<br>
                            {{Form::text('answer2', '', ['id' => '', 'class' => 'form-control', 'placeholder' => 'Choice 2'])}}<br>
                            {{Form::text('answer3', '', ['id' => '', 'class' => 'form-control', 'placeholder' => 'Choice 3'])}}<br>
                            {{Form::text('answer4', '', ['id' => '', 'class' => 'form-control', 'placeholder' => 'Choice 4'])}}<br>
                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
         
                @endsection