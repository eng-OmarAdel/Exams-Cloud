@extends("layouts.index")
@section("title")
@php $tablename="AuthProfile" @endphp
{{$authority->name}} {{$view_name}}
@endsection
@section("content")

    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Tracks
                        </h3> 
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#" onclick="actions()" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air" id="modal_button" data-toggle="modal" data-target="#m_modal_4">
                                <span>
                                    <i class="la la-cart-plus"></i>
                                    <span>New Track</span>
                                </span>
                            </a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                    </ul>
                </div>
            </div>
    </div>

    <div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">New Track</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">×</span>
						        </button>
						      </div>
						      <div class="modal-body">
                              <form action="" method="post" enctype="multipart/form-data" id="form_add">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="post" fillable="never"/>

										<div id="test">

											{{csrf_field()}}
											<input type="hidden" name="_method" value="post" fillable="never"/>
											<div class="m-portlet__body">
											    <div id="test">
													<div>

														
													</div>

													<div class="form-group m-form__group">
															<label for="exampleInputEmail1" id="question_label">Parent category</label>
															{{-- <input class="ignoreField form-control m-input qbank" name="name" id="name"
																				placeholder="Name"> --}}

															<select class="form-control" id="parentTrack" name="parentTrack">
															</select>
													</div>
											        <div class="form-group m-form__group">
											            <label for="exampleInputEmail1" id="question_label">Name</label>
											            <input class="ignoreField form-control m-input qbank" name="name" id="name"
											                      placeholder="Name">
															</div>	
															
		
											    </div>
											</div>

                                        </div>

						        <input style="display: none" type="reset" id="form_reset" class="btn btn-secondary">
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="submit" class="btn btn-primary">Add track</button>
						      </div>
						        </form>
						      </div>

						    </div>
						  </div>
						</div>
    
{{-- Category addition --}}

<br><br>
<table class="dataTable no-footer dtr-inline" role="grid" style="width: 1224px;">
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 389px;" aria-label="name: activate to sort column descending" aria-sort="ascending">name</th>
            <th class="sorting_asc" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 389px;" aria-label="name: activate to sort column descending" aria-sort="ascending">creation date</th>
        </tr>
        <tbody>
            @foreach ($tracks as $track)
            @if ($track->level == -1)
                    @continue
            @endif
            <tr role="row" id="table">
                    <td>
                        @for ($i = 0; $i < $track->level; $i++)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endfor
                        {{$track->name}}
                    </td>
                    <td>
                        {{$track->created_at}}
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </thead>
</table>
<br><br>
{{-- end category addition --}}


{{-- Track edition --}}

{{--
<h2>Add category</h2>
<select class="form-control" name="category" id="category">

</select>
<br><br>
<table class="dataTable no-footer dtr-inline" role="grid" style="width: 1224px;">
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 389px;" aria-label="name: activate to sort column descending" aria-sort="ascending">name</th>
            <th class="sorting_asc" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 389px;" aria-label="name: activate to sort column descending" aria-sort="ascending">creation date</th>
        </tr>
        <tbody>
            @foreach ($categories as $category)
            @if ($category->level == -1)
                    @continue
            @endif
            <tr role="row" id="table">
                    <td>
                        @for ($i = 0; $i < $category->level; $i++)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endfor
                        {{$category->name}}
                    </td>
                    <td>
                        {{$category->created_at}}
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </thead>
</table>
--}}
{{-- end track addition --}}

@endsection
@section("script")
<script type="text/javascript" tablename="{{url("AuthProfile?id=$authority->_id")}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" authid="{{$authority->_id}}" tablename="{{url("AuthProfile?id=$authority->_id")}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection