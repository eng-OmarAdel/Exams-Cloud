@extends("layouts.index")
@section("title")
@php $tablename="Users" @endphp
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
													<span>New User</span>
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
						        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form action="{{$tablename}}" method="post" enctype="multipart/form-data" id="form_add">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="post" fillable="never"/>

										<div id="test">


                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">Full name</label>
                                                <input type="text" class="ignoreField form-control m-input"
                                                       name="full_name" id="full_name" placeholder="Enter full name">
                                            </div>
                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="ignoreField form-control m-input"
                                                       name="username" id="username" placeholder="Enter  username">
                                            </div>
                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">Login Email</label>
                                                <input type="email" class="ignoreField form-control m-input"
                                                       name="email" id="email" placeholder="Enter Login Email">
                                            </div>
                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">password</label>
                                                <input type="password" class="ignoreField form-control m-input"
                                                       name="password" id="password" placeholder="Enter password">
                                            </div>
                                            <div class="form-group m-form__group">
                                                <label for="exampleInputEmail1">Confirm password</label>
                                                <input type="password" class="ignoreField form-control m-input"
                                                       name="confirmpassword" id="confirmpassword"
                                                       placeholder="Enter password">
                                            </div>


                                        </div>

						        <input style="display: none" type="reset" id="form_reset" class="btn btn-secondary">
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Add user</button>
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
<script type="text/javascript" tablename="{{$tablename}}" is_admin={{auth()->user()->type}} src="{{url("js/backend/".$tablename.".js")}}"></script>
@endsection

