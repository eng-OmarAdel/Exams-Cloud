@extends("layouts.index")
@section("title")
@php $tablename="Exams" @endphp
{{$tablename}}
@endsection
@section("content")

						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											{{$tablename}}
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="#" onclick="actions()" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" id="modal_button" data-toggle="modal" data-target="#m_modal_4">
												<span>
													<i class="la la-cart-plus"></i>
													<span>New Exam</span>
												</span>
											</a>
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

						<!-- Start::modal form-->
						<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">New exam</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{$tablename}}" method="post" enctype="multipart/form-data" id="form_add">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="post" fillable="never"/>

										<div id="test">

											{{csrf_field()}}
											<input type="hidden" name="_method" value="post" fillable="never"/>
											<div class="m-portlet__body">
											    <div id="test">
											        <div class="form-group m-form__group">
											            <label for="exampleInputEmail1" id="question_label">Title</label>
											            <textarea class="ignoreField form-control m-input" name="title" id="title"
											                      placeholder="Exam title"></textarea>
											            <!--<textarea class="ignoreField form-control m-input qbank" name="name" id="question"
											                      placeholder="Question"></textarea>-->
											        </div>
															<div class="form-group m-form__group">
											            <label for="exampleInputEmail1" id="question_label">Time limit in minutes</label>
											            <textarea class="ignoreField form-control m-input" name="timeLimit" id="timeLimit"
											                      placeholder="Eg. 30"></textarea>
											            <!--<textarea class="ignoreField form-control m-input qbank" name="name" id="question"
											                      placeholder="Question"></textarea>-->
											        </div>
											        <div class="form-group m-form__group">
											            <label for="exampleInputEmail1">tags <small>comma separated</small></label>
											            <textarea class="ignoreField form-control m-input" name="tags" id="tags"
											                      placeholder="tags"></textarea>
															</div>
															<div class="form-group m-form__group">
																<label for="exampleInputEmail1">Authority</label>
																<select class="form-control" id="Authority" name="Authority">
																	<option value="5cb8a6dc76e7492510007032">Faculty of Engineering</option>
																</select>
														  </div>
                              <div class="form-group m-form__group">
																<label for="exampleInputEmail1">Track</label>
																<select class="form-control" id="Track" name="Track">
																	<option value="5cbc7c2c76e7490450007418">Electrical</option>
																</select>
														  </div>
															<div class="form-group m-form__group">
																<label for="exampleInputEmail1">Category</label>
																<select class="form-control" id="Category" name="Category">
																	<option value="5cacb85a9dfef715a06255b4">Maths</option>
																	<option value="5cacb8709dfef715a06255b5">Algebra</option>
																</select>
														  </div>
											    </div>
											</div>

                                        </div>

						        <input style="display: none" type="reset" id="form_reset" class="btn btn-secondary">
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Add exam</button>
						      </div>
						        </form>
						      </div>

						    </div>
						  </div>
						</div>

						<!-- End::modal form-->
						</div>
    <form method="post" id="delete_form">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="delete"/>
    </form>

@endsection
@section("script")
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection
