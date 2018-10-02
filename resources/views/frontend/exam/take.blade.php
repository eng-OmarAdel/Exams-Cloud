@extends('frontend.layouts.app')
@section('title') Answer @endsection
@push('customCSS')
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
@endpush
@section('content')
        <div class="container">
            <br>
            <h2 class="text-center">{{$exam->category->title}} - {{$exam->sub_category->title}} ({{$exam->difficulty}})</h2>
            <h2 class="text-center"> Question {{$count}} of {{$total}} </h2>
            
            <h3>{{$question->title}}</h3>
            <form method="POST" action="{{route('answer')}}">
                {{csrf_field()}}
                @foreach($question->answers as $answer)
                    <h3><input type="radio" value="{{$answer->_id}}" name="answer_id" required> {{$answer->answer}}</h3>
                @endforeach
                    <input type="hidden" name="count" value="{{$count}}">
                    <input type="hidden" name="e_id" value="{{$exam->_id}}">
                    <input type="hidden" name="q_id" value="{{$question->_id}}">
                    <input type="hidden" name="total" value="{{$total}}">
                    <input type="submit" value="next" class="btn btn-md btn-primary">
            </form>
           
        </div>
@endsection