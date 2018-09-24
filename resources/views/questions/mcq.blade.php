@extends('layout.app')


@section('content')

<h2 class="text-center">Create a Question <h2><br>

 <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="box text-color-white equal-height">
                <div class="card-body">
     
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
                            {{Form::text('rightanswer', '', ['id' => '', 'class' => 'form-control', 'placeholder' => 'Right Answer'])}}<br>

                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
          
                </div>
                                        <div class="bg bg-color-default"></div>

                    </div>
                </div>
 
            </div>
        </div>
        <!--/ .container-->
        <div class="bg"></div><!--/ .bg-->
    </div>
<br>

                @endsection