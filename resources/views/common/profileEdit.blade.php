@extends("layouts.index")
@section("title")
Edit Profile
@endsection
@section("content")

<div class="row">
    	<div class="col-lg-2"></div>
    <div class="col-lg-8">
		<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
			<div class="m-portlet__head">
				<div class="m-portlet__head-tools">
					<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
								<i class="flaticon-share m--hide"></i>
								Update Profile
							</a>
						</li>
						{{-- <li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
								Messages
							</a>
						</li> --}}

					</ul>
				</div>
			</div>
			<div class="tab-content">
				<div class="tab-pane active" id="m_user_profile_tab_1">
					<form enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right" method="post" action='/profile/edit'>
						{{ csrf_field() }}
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10 m--hide">
								<div class="alert m-alert m-alert--default" role="alert">
									The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
								</div>
							</div>
						
							<div class="form-group m-form__group row">
								<div class="col-10 ml-auto">
									<h3 class="m-form__section">1. Personal Details</h3>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">Full Name</label>
								<div class="col-7">
									<input class="form-control m-input" type="text" value="{{$user->full_name}}" name='full_name'>
								
								</div>



							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">update photo</label>
								<div class="col-7">
									<input data-preview="#preview" name="profile_img" type="file" id="imageInput">
								
								</div>
								


							</div>
							
							<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
							
							<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
							<div class="form-group m-form__group row">
								<div class="col-10 ml-auto">
									<h3 class="m-form__section">2. Social Links</h3>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">Linkedin</label>
								<div class="col-7">
								<input class="form-control m-input" type="text" value="{{$user->linkedin}}" name='linkedin'>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label" >Facebook</label>
								<div class="col-7">
									<input class="form-control m-input" type="text" value="{{$user->facebook}}" name='facebook'>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label for="example-text-input" class="col-2 col-form-label">Twitter</label>
								<div class="col-7">
									<input class="form-control m-input" type="text" value="{{$user->twitter}}" name='twitter'>
								</div>
							</div>
							
						</div>
						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions">
								<div class="row">
									<div class="col-2">
									</div>
									<div class="col-7">
										<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
										</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane " id="m_user_profile_tab_2">
				</div>

			</div>
		</div>
    </div>
</div>

@endsection
