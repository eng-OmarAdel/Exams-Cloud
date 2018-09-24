@extends('layout.app')


@section('content')



    <div class="block">
        <div class="container">
            <h2 class="center">Question view</h2>
            <hr>
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
           <a class="btn btn-dark" href="/questions">back</a><br><br>
                       
                            <h2 class="no-bottom-margin"><strong>{{ $question->title}}</strong></h2>
            <div > 
                @if($question->kind =='MCQ')
                <div style="margin: 30px" class="row">
                <div class="col-md-3">
                 <h3>1-{!!$question->answer1!!}</h3>   
                </div>
                <div class="col-md-3">
               <h3>  2-{!!$question->answer2!!}</h3>
                  
                </div>
                <div class="col-md-3">

                   <h3> 3-{!!$question->answer3!!}</h3>
                </div> 
                <div class="col-md-3">
                 <h3> 4-{!!$question->answer4!!}</h3>
                   
                </div>
            </div>
                <h3 class="no-bottom-margin"><strong>Right answer:</strong></h3>
                <div style="margin: 30px" class="row">

                    {!!$question->answer!!} 
                </div>
                @endif
                @if($question->kind =='simple' || $question->kind =='tf')
                                <div style="margin: 30px" class="row">

                    {!!$question->answer!!}
                </div>
                @endif
            </div>
            <hr>
      <h6> written on: {{$question->created_at}}</h6>
         <hr>
       

        {!!Form::open(['action' => ['questionsController@destroy', $question->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
{{--         <a class="btn btn-dark" href="/questions/{{$question->id}}/edit">Edit</a>
 --}}        {{--         {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        --}}    {!!Form::close()!!}
        
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