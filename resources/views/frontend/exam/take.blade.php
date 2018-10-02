@extends('frontend.layouts.app')
@section('title') Answer @endsection
@push('customCSS')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endpush
@section('content')
        <div class="container">
            <br>

            {{-- <h2 class="text-center">The exam category is {{$exam->category}}</h2>
            <h2 class="text-center">The exam sub-category is {{$exam->subcategory}}</h2>
            <h2 class="text-center">The exam difficulty is {{$exam->difficulty}}</h2> --}}
            {{-- {{count($questions)}} --}}
            {{-- @foreach ($questions as $question) --}}
            <h2>{{$questions[0]['question']}}</h2>
            <form method="POST" action="/answer">
                <h2><input type="radio" name="answer"> {{$questions[0]['answer1']}}</h2>
                <h2><input type="radio" name="answer"> {{$questions[0]['answer2']}}</h2>
                <h2><input type="radio" name="answer"> {{$questions[0]['answer3']}}</h2>
                <h2><input type="radio" name="answer"> {{$questions[0]['answer4']}}</h2>
                <input type="submit" value="next" class="btn btn-md btn-primary">
            </form>
            {{-- @endforeach --}}
        </div>
@endsection