@extends("layouts.index")
@section("title")
@php echo "Exam Cloud"; @endphp
@endsection
@section("css")
<link href="{{url('css/Home-page.css')}}" rel="stylesheet">
@endsection
@section("fonts")
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">
                                       
@endsection
@section("content")
<section class="home-banner-area relative">
    <div class="container">
                <div class="row fullscreen d-flex align-items-center justify-content-center" id="home_search_area">
                    <div class="banner-content col-lg-8 col-md-12">
                        <h1 class="wow fadeIn" data-wow-duration="4s">
                            the Best Questions
                            <br>
                                to Measure your Knowledge
                            </br>
                        </h1>
                        <p class="text-white">
                            Success is no accident. It is hard work, perseverance, learning, studying, sacrifice and most of all, love of what you are doing or learning to do.
                        </p>
                        {{--<div class="input-wrap">
                            <form action="" class="form-box d-flex justify-content-between">
                                <input class="form-control" name="username" placeholder="Search Questions" type="text">
                                    <button class="btn search-btn" type="submit">
                                        Search
                                    </button>
                                
                            </form>
                        </div> --}}
                        <div></br></br></br></div>
                         
                        <h4 class="text-white">
                            Make your Choice
                        </h4>
                        <div class="courses pt-20">

                            <a class="genric-btn primary-border e-large mr-10 mb-10 wow fadeInDown" data-wow-delay=".3s" data-wow-duration="1s" href="{{url('')}}/?view=Category&id=5cacb5fcf34cdb15b5657de9">
                                Test Your knowledge or Create Your Exams
                            </a>
            
                            <!-- <a class="genric-btn primary-border e-large mr-10 mb-10 wow fadeInDown" data-wow-delay=".3s" data-wow-duration="1s" href="#">
                                Create an Exam
                            </a> -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->
        <!-- Start Faculty Area -->
        <section class="faculty-area section-gap">
            <div  class="ml-20 mr-20">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <h1>
                                Top Categories
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center d-flex align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 single-faculty">
                        <div class="meta-text text-center">
                            <h3>
                                @php $cat=$categories[0]; @endphp
                                <a href="{{url('')}}/?view=Category&id={{$cat->_id}}" style="color:black;font-size:22px">{{$cat->name}}</a>
                            </h3>
                            <div class="info wow fadeIn" data-wow-delay=".1s" data-wow-duration="1s">
                                <ul>
                                @foreach ($cat->questions as $question)
                                    <li>
                                            <a href="{{url('')}}/?view=QuestionSolve&id={{$question->_id}}"><h6>{{$question->name}}</h6></a>
                                            <br>
                                            @foreach($question->tags as $tag)
                                                <button  class="genric-btn primary-border small circle m-1" href="#">
                                                    {{$tag->tag}}
                                                </button>
                                            @endforeach
                                            </br>
                                    </li>
                                @endforeach  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 single-faculty">
                        <div class="meta-text text-center">
                        <h3>
                                @php $cat=$categories[1]; @endphp
                                <a href="{{url('')}}/?view=Category&id={{$cat->_id}}" style="color:black;font-size:22px">{{$cat->name}}</a>
                            </h3>
                            <div class="info wow fadeIn" data-wow-delay=".1s" data-wow-duration="1s">
                                <ul>
                                @foreach ($cat->questions as $question)
                                    <li>
                                            <a href="{{url('')}}/?view=QuestionSolve&id={{$question->_id}}"><h6>{{$question->name}}</h6></a>
                                            <br>
                                            @foreach($question->tags as $tag)
                                                <button  class="genric-btn primary-border small circle m-1" href="#">
                                                    {{$tag->tag}}
                                                </button>
                                            @endforeach
                                            </br>
                                    </li>
                                @endforeach  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-lg-6 col-md-6 col-sm-12 single-faculty">
                        <div class="meta-text text-center">
                        <h3>
                                @php $cat=$categories[2]; @endphp
                                <a href="{{url('')}}/?view=Category&id={{$cat->_id}}" style="color:black;font-size:22px">{{$cat->name}}</a>
                            </h3>
                            <div class="info wow fadeIn" data-wow-delay=".1s" data-wow-duration="1s">
                                <ul>
                                @foreach ($cat->questions as $question)
                                    <li>
                                            <a href="{{url('')}}/?view=QuestionSolve&id={{$question->_id}}"><h6>{{$question->name}}</h6></a>
                                            <br>
                                            @foreach($question->tags as $tag)
                                                <button  class="genric-btn primary-border small circle m-1" href="#">
                                                    {{$tag->tag}}
                                                </button>
                                            @endforeach
                                            </br>
                                    </li>
                                @endforeach  
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-lg-6 col-md-6 col-sm-12 single-faculty">
                        <div class="meta-text text-center">
                        <h3>
                                @php $cat=$categories[3]; @endphp
                                <a href="{{url('')}}/?view=Category&id={{$cat->_id}}" style="color:black;font-size:22px">{{$cat->name}}</a>
                            </h3>
                            <div class="info wow fadeIn" data-wow-delay=".1s" data-wow-duration="1s">
                                <ul>
                                @foreach ($cat->questions as $question)
                                    <li>
                                            <a href="{{url('')}}/?view=QuestionSolve&id={{$question->_id}}"><h6>{{$question->name}}</h6></a>
                                            <br>
                                            @foreach($question->tags as $tag)
                                                <button  class="genric-btn primary-border small circle m-1" href="#">
                                                    {{$tag->tag}}
                                                </button>
                                            @endforeach
                                            </br>
                                    </li>
                                @endforeach  
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Faculty Area -->
        <!-- Start About Area -->
        <section class="about-area section-gap">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 col-md-6 about-left">
                        <img alt="" class="img-fluid" src="{{url('')}}/img/about.jpg">
                        </img>
                    </div>
                    <div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12 about-right">
                        <h1>
                            Over 2500 Question
                            <br>
                        </h1>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                By nature, we’re creatures of habit. If it’s a challenge for you to get motivated to study, you can put this principle to work for you.
                            </p>
                        </div>
                        <a class="primary-btn"  href="{{url('')}}/?view=Category&id=5cacb5fcf34cdb15b5657de9">
                            Explore Questions
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->			
@endsection
@section("script")

@endsection

