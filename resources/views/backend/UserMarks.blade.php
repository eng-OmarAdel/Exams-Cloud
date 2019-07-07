@extends("layouts.index")
@section("title")
@php $tablename="UserMarks" @endphp
{{$_GET['user_name']}} Marks
@endsection
@section("content")						

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											{{$_GET['user_name']}} Marks
											
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">

										</li>
										<li class="m-portlet__nav-item"></li>
									</ul>
								</div>
							</div>
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="" id="m_table_1">

								</table>
								
								<div id="testscroll" class="mt-4">
                                 </div>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<br>
								<!-- questions details -->
								<div id="test" class="">
                                 </div>
							</div>

						<!-- END EXAMPLE TABLE PORTLET-->


						</div>
    <form method="post" id="delete_form">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="delete"/>
    </form>

@endsection
@section("script")
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" tablename="{{$tablename}}" website_url="{{url("")}}" user_id="{{$_GET['user_id']}}"  exam_id="{{$_GET['exam_id']}}" src="{{url("js/backend/".$tablename.".js")}}"></script>
@endsection

