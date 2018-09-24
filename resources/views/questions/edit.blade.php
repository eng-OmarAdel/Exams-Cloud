@extends('layout.app')


@section('content')


    <div class="block">
        <div class="container">
            <h2 class="center">Edit Question</h2>
            <hr>
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                                  {!! Form::open(['action' =>[ 'questionsController@update' , $question->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', $question->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Body')}}
                            {{Form::textarea('body', $question->body , ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
         
        
                </div>
                <!--/ .col-md-10-->
            </div>
            <!--/ .row-->
        </div>
        <!--/ .container-->
        <div class="bg bg-color-neutral opacity-20"></div><!--/ .bg-->
    </div>
    <!--/ .block-->


<br>

                @endsection