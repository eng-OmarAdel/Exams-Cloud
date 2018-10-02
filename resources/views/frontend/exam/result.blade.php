@extends('frontend.layouts.app')
@section('title') Result @endsection

@push('customCSS')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endpush

@section('content')
        <div class="container">
            <br>

            <h2 class="text-center">Your score is {{$result}}</h2>

            @if($result>=8)
            <h2>Awesome , you are a genius</h2>
            @elseif($result>=5 && $result <8)
            <h2>Good work , but you need some more practice</h2>
            @elseif($result<5)
            <h2>You need a lot of hard work</h2>
            @endif
        </div>
@endsection

