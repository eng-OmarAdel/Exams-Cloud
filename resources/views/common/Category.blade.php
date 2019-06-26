@extends("layouts.index")
@section("title")
@php $tablename="Category" @endphp
{{$tablename}} 
{{-- {{$view_name}} --}}
@endsection
@section("content")						

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text" id="tree">
											<!-- tree -->
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<div class="dropdown">
												<button onclick="actions()" id="modal_button" data-toggle="modal" data-target="#m_modal_4" href="#" class="btn btn-brand" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														New child category
												</button>
										</div>

										</li>


										<li class="m-portlet__nav-item">
											<div class="dropdown">
												<button class="btn btn-brand dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Train
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
														<a class="dropdown-item" href="{{url('/?view=Question&cat_id='.$_GET['id'].'&cat_type=1')}}">Questions</a>
														<a class="dropdown-item" href="{{url('/?view=Exams&cat_id='.$_GET['id'].'&cat_type=1')}}">Exams</a>
												</div>
										</div>

										</li>
										<li class="m-portlet__nav-item"></li>
									</ul>
								</div>
							</div>
							
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="" id="m_table_1">

								</table>

								
							</div>

						<!-- END EXAMPLE TABLE PORTLET-->

						<!-- Start Category modal form-->
						<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{$tablename}}" method="post" enctype="multipart/form-data" id="form_add2">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="post" fillable="never"/>

										<div id="test">

											{{csrf_field()}}
											<input type="hidden" name="_method" value="post" fillable="never"/>
											<div class="m-portlet__body">
											    <div id="test">
														<input style="display: none" type="text" id="parentCategory" name="parentCategory" value="{{$_GET['id']}}">
														<input style="display: none" type="text" id="type" name="type" value="category">


													{{-- <div class="form-group m-form__group"> --}}
															{{-- <label for="exampleInputEmail1" id="question_label">Parent category</label> --}}
															{{-- <input class="ignoreField form-control m-input qbank" name="name" id="name"
																				placeholder="Name"> --}}

															{{-- <select class="form-control" id="parentCategory" name="parentCategory">
															</select> --}}
													{{-- </div> --}}
											        <div class="form-group m-form__group">
											            <label for="exampleInputEmail1" id="question_label">Category Name</label>
											            <input class="ignoreField form-control m-input qbank" name="name" id="name"
											                      placeholder="Name">
															</div>	
															
		
											    </div>
											</div>

                                        </div>

						        <input style="display: none" type="reset" id="form_reset" class="btn btn-secondary">
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Add category</button>
						      </div>
						        </form>
						      </div>

						    </div>
						  </div>
						</div>

						<!-- End Category modal form-->


						<!-- question modal deleted -->

						</div>
    <form method="post" id="delete_form">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="delete"/>
    </form>

@endsection
@section("script")
<script type="text/javascript" tablename="Category" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" authid="{{$_GET['id']}}" tablename="{{$tablename}}?id={{$_GET['id']}}" src="{{url("js/common/".$tablename.".js")}}"></script>

@endsection

