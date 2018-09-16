<?php

$num=$_POST['questionsNumber'];
//echo $num;

require("vendor/autoload.php");
$m = new MongoDB\Client();
// var_dump($m);

$collection = $m->examcloud->questions;

$result = $collection->find();
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
    <title>Exams Cloud | Exams</title>
  </head>
  <body>
		<!--Navigation Bar-->
		
		<nav class="navbar navbar-expand-lg navbar-dark secondary-navbar">
			<button class="btn mr-2" type="button" ><i class="fas fa-bars"></i></button>
			<a class="navbar-brand" href="#">ExamsCloud</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<input class="form-control" placeholder="Search..." type="text">
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="login.html">Help</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Forums</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Sign up</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container welcome-jumbo mt-3">
			<!--Questions-->
				<!--Questions-->
		<?php 
		$i =0;
		foreach ($result as $question) {
			$i++;
			echo '<div id="question-container" name="question_container" class="container welcome-jumbo p-4">
			<div class="row">
				<div class="col-md-9">
					<h4 name="title">'. $question['title']. '</h4>
					<p name="body">' . $question['body'].'</p>
					<p name="estimated_time"><small>8 mins to solve</small></p>
					<p name="date"><small>9/12/2018 4:11 AM</small></p>
				</div>
				<div class="col-md-3">
					<button class="btn btn-block secondary-navbar" type="submit" style="max-width:150px">Edit</button>
					<button class="mt-2 btn btn-block secondary-navbar" type="submit" style="max-width:150px">Remove</button>
				</div>
			</div>
		</div>';
		if($i>=$num)
			{break;}
		}
		?>
		</div>
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>