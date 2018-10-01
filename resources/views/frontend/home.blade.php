@extends('frontend.layouts.app')


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

    @endsection


    