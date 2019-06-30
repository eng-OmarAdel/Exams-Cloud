@extends("layouts.index")
@section("title")
@php $tablename="ViewAnswers" @endphp
My answer
@endsection
@section("content")						
 <!-- begin::Body -->

            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                <div class="m-content">
                    <div class="row">
                        <div id="block-view" style="display: none;" class="col-lg-12">
                            <div class="m-portlet">
                                <div class="m-portlet__body m-portlet__body--no-padding">
                                    <div class="m-invoice-2">
                                        <div class="m-invoice__wrapper">
                                            <div class="m-invoice__head">
                                                <div class="m-invoice__container m-invoice__container--centered">
                                                    <div class="m-invoice__logo">
                                                        <a style="float: left" href="#">
                                                            <h1 id="title"></h1>
                                                        </a>
                                                    </div>
                                                    <span class="m-invoice__desc">
                                                        <h6 style="display: none" id="track_name"><b>track : </b></h6>
                                                        <h6 style="display: none" id="category_name"><b>category : </b></h6>
														</span>
                                                </div>
                                            </div>
                                            <div class="m-invoice__body m-invoice__body--centered">
                                                <div >
                                                        <form action="{{$tablename}}" method="post"  id="form_add">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="post" fillable="never"/>
                                                            <input name="exam_id" type="hidden" value="{{$_GET['_id']}}"/>

                                                            <div id="test">
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                            <div class="m-invoice__footer">
                                                <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                                    <table  id="table" class="table">
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <!-- end:: Body -->



@endsection
@section("script")
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" tablename="{{$tablename}}"  website_url="{{url("")}}"  _id="{{$_GET['_id']}}"  exam_id="{{$_GET['exam_id']}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection

