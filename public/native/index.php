<?php

/**
 * 
 */
require("vendor/autoload.php");
$m = new MongoDB\Client();
// var_dump($m);

$collection = $m->examcloud->questions;
//$result =$collection->find();

//print_r($result);
// print_r($result);
 //$result = $collection->insertOne( [ "title" => "three", "body" => "male or female?" ] );


$result = $collection->find();
//print($result['title']);
/*
foreach ($result as $entry) {
    echo $entry['_id'], ': ', $entry['name'], "\n" ,$entry['brewery'], "<br>";
}*/
// echo "Inserted with Object ID '{$result->getInsertedId()}'";

class question
{
	public $title;
	public $body;
	public $answer;

	
	 function __construct()
	{
		
	}



}


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
    <title>Exams Cloud | Maths</title>
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
		<nav class="navbar navbar-expand-lg navbar-dark main-color-bg text-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="login.html">Linear algebra</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Algebra</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Geometry</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Calculus</a>
					</li>
				</ul>
			</div>
		</nav>
		<!--Top division-->
		<div class="container welcome-jumbo p-4 mt-5">
			<div class="row">
				<div class="col-md-9">
					<input class="form-control" placeholder="Search..." type="text">
					<p class="mt-4"><small class="font-dark-purple"> 10,000 Questions found</small></p>
				</div>
				<div class="col-md-3">
					<button class="col-md-7 btn btn-block secondary-navbar" type="submit">Filters</button>	
				</div>
			</div>
			<div class="row" id="sort">
					<p class="font-light-purple mr-1"><strong>Sort by:</strong></p>
					<div class="dropdown">
						<button class="btn secondary-navbar dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Difficulty level
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
			</div>
			<button class="btn btn-block secondary-navbar" type="button" data-toggle="modal" data-target="#exampleModal" style="max-width:150px">Create an exam</button>
			<button class="btn btn-block secondary-navbar" type="button" data-toggle="modal" data-target="#exampleModal2" style="max-width:150px">Create a question</button>
		</div>
		<!--Questions-->
		<?php 

		foreach ($result as $question) {
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
					<form method="POST" action="deletequestion.php ">
					<input type="hidden" name="delkey" value="'.$question['title'].'">
					<button class="mt-2 btn btn-block secondary-navbar" type="submit" style="max-width:150px">Remove</button>
					</form>
				</div>
			</div>
		</div>';
		}
		?>
		
		<!--Modals-->
<!--Modals-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Exam</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="exam.php">
					<div class="modal-body">
						<input type="text" name="questionsNumber" placeholder="No. of questions in exam" >
					</div>
					<div class="modal-footer">
						
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
					
						
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Question</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="createquestion.php">
					<div class="modal-body">
						<input type="text" name="title" placeholder="question title" > <br>
						<textarea name="body" placeholder="Question body" > </textarea>
					</div>
					<div class="modal-footer">
						
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
					
						
					</div>
				</form>
				</div>
			</div>
		</div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>