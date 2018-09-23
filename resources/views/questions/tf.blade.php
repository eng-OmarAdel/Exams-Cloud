@extends('layout.app')


@section('content')
<br>
        <h1 class="text-center">Create Question <h1><br>
                        {!! Form::open(['action' => 'questionsController@storetf', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Question'])}}
                        </div>
                        <div class="form-group">
                                <h2>{{Form::radio('answer', 'true')}}  True</h2>
                                <h2>{{Form::radio('answer', 'false')}}  False</h2>
                            </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
         
                @endsection