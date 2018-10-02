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

            <h2 class="text-center">Your score is {{$points}} out of {{$total}}</h2>
            <h2><?php $ratio = $points / $total; ?></h2>

            @if($ratio>= 0.8)
            <h3 class="text-center">Awesome , you are a genius</h3>
            @elseif($ratio>=0.5 && $ratio <0.8)
            <h3 class="text-center">Good work , but you need some more practice</h3>
            @elseif($ratio<5)
            <h3 class="text-center">You need a lot of hard work</h3>
            @endif
        </div>
@endsection

