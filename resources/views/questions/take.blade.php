@extends('layout.app')


@section('content')
<br>
<h1 class="text-center">Answer a question <h1><br>

            <h2>{{$question->title}}</h2>
            @if($question->kind =='MCQ')
                {!! Form::open(['action' =>[ 'questionsController@answer',$question->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{ Form::hidden('id', $question->id) }}
                    {{-- {{Form::text('answer','',['class' => 'form-control', 'placeholder' => 'Answer'])}} --}}
                    <h2>{{Form::radio('answer', $question->answer1)}}  {{$question->answer1}}</h2>
                    <h2>{{Form::radio('answer', $question->answer2)}}  {{$question->answer2}}</h2>
                    <h2>{{Form::radio('answer', $question->answer3)}}  {{$question->answer3}}</h2>
                    <h2>{{Form::radio('answer', $question->answer4)}}  {{$question->answer4}}</h2>

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
                <h2>{{Form::radio('answer', 'true')}}  True</h2>
                <h2>{{Form::radio('answer', 'false')}}  False</h2>

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
                    
         
                @endsection