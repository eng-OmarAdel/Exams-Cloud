@extends('layout.app')

@section('content')

<h2 class="text-center">Create a Question <h2><br>

 <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="box text-color-white equal-height">
                <div class="card-body">
     
<br>
                        {!! Form::open(['action' => 'questionsController@storetf', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Question'])}}
                        </div>
                        <div class="form-group">
                                <h3>{{Form::radio('answer', 'true')}}  True</h3>
                                <h3>{{Form::radio('answer', 'false')}}  False</h3>
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