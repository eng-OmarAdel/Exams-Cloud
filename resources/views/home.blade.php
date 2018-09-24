@extends('layout.app')


@section('content')
    <div id="slider" class="hero-slider" style="display: none;min-height: 100px">
        <div class="rev-slider">
            <ul>
               <li>
                   <img src="{{url('')}}/assets/img/slide.jpg" alt="">

   
                    <div class="tp-caption"
                         data-x="left" data-hoffset="0"
                         data-y="top" data-voffset="210"
                         data-transform_idle="o:1;"
                         data-transform_in="x:50px;opacity:0;s:700;e:Power3.easeInOut;"
                         data-start="600"><h1 class="text-color-white">Welcome to ExamCloud</h1>
                    </div>
 
               </li>
                <li>
                    <img src="{{url('')}}/assets/img/slide-02.jpg" alt="">

                    <div class="tp-caption"
                         data-x="left" data-hoffset="0"
                         data-y="top" data-voffset="210"
                         data-transform_idle="o:1;"
                         data-transform_in="x:50px;opacity:0;s:700;e:Power3.easeInOut;"
                         data-start="600"><h1 class="text-color-white">Ask & Answer Questions<br>To Be more confident</h1>
                    </div>
   
                </li>
            </ul>
        </div>
    </div>
                                @if (count($questions)>0)

    <div class="block">
        <div class="container">
            <h2 class="center">latest Questions</h2>
            <hr>
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
            @foreach ($questions as $question)
                <div class="card" >
                <h3> <a href="#" >{{ $question->title}} <a></h3>
                <h6> written on: {{$question->created_at}}</h6>
                <button class="btn btn-md btn-success" onclick="location.href='/questions/{{$question->id}}';">View Question</button>&nbsp;
                <button class="btn btn-md btn-info" onclick="location.href='/questions/{{$question->id}}/take';">Answer Question</button>
                <br>
                </div><br>
            @endforeach
        
                </div>
                <!--/ .col-md-10-->
            </div>
            <!--/ .row-->
        </div>
        <!--/ .container-->
        <div class="bg bg-color-neutral opacity-20"></div><!--/ .bg-->
    </div>
    <!--/ .block-->

        
    @endif
    @endsection


    