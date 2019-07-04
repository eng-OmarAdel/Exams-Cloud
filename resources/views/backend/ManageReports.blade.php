@extends("layouts.index")
@section("title")
@php $tablename="ManageReports" @endphp
Question Reports
@endsection
@section("content")

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Reports
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="" id="m_table_1">

								</table>

								<div id = "accept_reject_div">
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
<script type="text/javascript" exam_id={{$_GET['exam_id']}} question_id={{$_GET['question_id']}} tablename="{{$tablename}}" user_id="{{Auth::id()}}" website_url="{{url("")}}" src="{{url("js/backend/".$tablename.".js")}}"></script>
@endsection
