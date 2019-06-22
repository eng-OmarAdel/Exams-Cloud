<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- CSRF Token -->
        <meta id="token" name="token" content="{{ csrf_token() }}">   
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CodedThemes">
       	<meta name="keywords" content="All Exam Corner, Conduct your online exam, online exam, exam portal, maths exam, IIT online exam, SSC exam, coaching online exam platform, exam corner, allexamcorner, ">
      	<meta name="author" content="Sunny Singh Yadav">

	      <title>All Exam Corner &mdash; Conduct you Exam with Us</title>

    <!-- Bootstrap core CSS -->
    <link href="landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Custom fonts for this template -->
    <link href="landing/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="landing/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="landing/css/creative.min.css" rel="stylesheet">
 
  </head>

  <body id="page-top">

 
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Exams Cloud</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  @if (Route::has('login'))
                    @auth

                <li class="nav-item">
            <a  class="nav-link js-scroll-trigger" href="{{ url('/category') }}">Categories</a>
               </li>         
                    @else
					<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="{{ route('login') }}" >Login / register</a>
					</li>

                        
                        
                    @endauth
            @endif
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Create Exam</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong>Get Your Exam Ready Now</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">We've got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Exams Cloud has everything you need to start your online Exam and publish in no time! </p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">At Your Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Publish</h3>
              <p class="text-muted mb-0">You can create your Exam and Publish it in no time.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Up to Date</h3>
              <p class="text-muted mb-0">We update Our System According to your Need.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Love</h3>
              <p class="text-muted mb-0">We Assured you will love our services. We are working hard to provide you the best service!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
     <!-- <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="landing/img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="landing/img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="landing/img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="landing/img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="landing/img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="landing/img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="landing/img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="landing/img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="landing/img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="landing/img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="landing/img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="landing/img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div> -->
    </section> 

    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Create Your First Exam Today </h2>
        <a href="{{ route('login') }}" class="btn btn-light btn-xl sr-button btn-xl js-scroll-trigger" href="#contact">Login/Register</a>
      </div>
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="landing/vendor/jquery/jquery.min.js"></script>
    <script src="landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="landing/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="landing/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="landing/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="landing/js/creative.min.js"></script>


  </body>

</html>
