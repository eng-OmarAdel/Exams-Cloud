@extends('layout.app')


@section('content')
                        <h2 class="center">Answer a question</h2>

 <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="box text-color-white equal-height">
                <div class="card-body">
                    
            <h3 style="color:black">{{$question->title}}</h3 style="color:black">
            @if($question->kind =='MCQ')
                {!! Form::open(['action' =>[ 'questionsController@answer',$question->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::hidden('id', $question->id) }}
                    {{-- {{Form::text('answer','',['class' => 'form-control', 'placeholder' => 'Answer'])}} --}}
                    <h3 style="color:black">{{Form::radio('answer', $question->answer1)}}  {{$question->answer1}}</h3 style="color:black">
                    <h3 style="color:black">{{Form::radio('answer', $question->answer2)}}  {{$question->answer2}}</h3 style="color:black">
                    <h3 style="color:black">{{Form::radio('answer', $question->answer3)}}  {{$question->answer3}}</h3 style="color:black">
                    <h3 style="color:black">{{Form::radio('answer', $question->answer4)}}  {{$question->answer4}}</h3 style="color:black">

                </div>
                {{-- {{Form::hidden('_method','PUT')}} --}}
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!!Form::close()!!}
            @endif

            @if($question->kind =='tf')
            {!! Form::open(['action' =>[ 'questionsController@answer',$question->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{ Form::hidden('id', $question->id) }}
                {{-- {{Form::text('answer','',['class' => 'form-control', 'placeholder' => 'Answer'])}} --}}
                <h3 style="color:black">{{Form::radio('answer', 'true')}}  True</h3 style="color:black">
                <h3 style="color:black">{{Form::radio('answer', 'false')}}  False</h3 style="color:black">

            </div>
            {{-- {{Form::hidden('_method','PUT')}} --}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
            @endif

            @if($question->kind =='simple')
            {!! Form::open(['action' =>[ 'questionsController@answer',$question->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{ Form::hidden('id', $question->id) }}
                {{Form::text('answer','',['class' => 'form-control', 'placeholder' => 'Answer'])}}

            </div>
            {{-- {{Form::hidden('_method','PUT')}} --}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
            @endif
                    
                </div>
                    </div>
                </div>
 
            </div>
        </div>
        <!--/ .container-->
        <div class="bg"></div><!--/ .bg-->
    </div>
<br>

         
                @endsection