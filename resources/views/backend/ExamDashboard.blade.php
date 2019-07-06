@extends("layouts.index")
@section("title")
@php $tablename="ExamDashboard" @endphp
Exam Dashboard
@endsection
@section("content")

				    <div class="m-portlet">
				        <div class="m-portlet__body  m-portlet__body--no-padding">
				            <div class="row m-row--no-padding m-row--col-separator-xl">
				                <div class="col-md-4">
				                    <div class="m-widget15 m-portlet__body">
				                        <div class="">
				                            <div id="piechart"></div>
				                        </div>
				                    </div>
				                </div>
				                <div class="col-md-4">
				                    <!--begin::Section-->
				                    <div class="m-widget15 m-portlet__body">
				                        <div class="">
											<div id="piechart3"></div>
				                        </div>
				                    </div>
				                    <!--end::Section-->
				                </div>
				                <div class="col-md-4">
				                    <!--begin::Section-->
				                    <div class="m-widget15 m-portlet__body">
				                        <div class="">
											<div id="piechart2"></div>
				                        </div>
				                    </div>
				                    <!--end::Section-->
				                </div>

				            </div>
							<div class="row m-row--no-padding m-row--col-separator-xl">
	
				                <div class="col-md-6">
				                    <!--begin::Section-->
				                    <div class="m-widget15 m-portlet__body">
				                        <div class="">
											<div id="chart_div"></div>
											
				                        </div>
				                    </div>
				                    <!--end::Section-->
				                </div>
				                <div class="col-md-6">
				                    <!--begin::Section-->
				                    <div class="m-widget15 m-portlet__body">
				                        <div class="">
											<div id="chart_div2"></div>
											
				                        </div>
				                    </div>
				                    <!--end::Section-->
				                </div>
				            </div>

				        </div>
				    </div>

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
								<!-- accept or reject buttons if there is any report pending -->
								
								
							</div>

						<!-- END EXAMPLE TABLE PORTLET-->
					

						</div>

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Users Examined
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="" id="m_table_2">

								</table>
								<!-- accept or reject buttons if there is any report pending -->
								
								
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
<script type="text/javascript" exam_id={{$_GET['_id']}} tablename="{{$tablename}}" user_id="{{Auth::id()}}" website_url="{{url("")}}" src="{{url("js/backend/".$tablename.".js")}}"></script>
@endsection
