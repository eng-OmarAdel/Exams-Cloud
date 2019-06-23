@extends("layouts.index")
@section("title")
@php $tablename="ExamSolve" @endphp
{{$tablename}}
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
                                                        <a style="float: right" href="#">
                                                            <div id="timer" class="text-center" style="font-size:40px;"></div>
                                                        </a>
                                                    </div>
                                                    <span class="m-invoice__desc">
															<span id="authority_name"><b>authority : </b></span>
                                                        <span id="track_name"><b>track : </b></span>
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
                                                            <input type="submit" id="submitExam" class="btn btn-accent">
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
                        <div id="proceed-view"  class="col-lg-12">
                            <div class="m-portlet">
                                <div class="m-portlet__body m-portlet__body--no-padding">
                                    <div class="m-invoice-2">
                                        <div class="m-invoice__wrapper">
                                           
                                            <div class="m-invoice__body m-invoice__body--centered">
                                                <h1>Are you ready to start the exam?</h1><br>
                                                <div >
                                                        <form action="{{url("")}}" method="post"  id="proceed">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="post" fillable="never"/>
                                                            <input name="exam_id" type="hidden" value="{{$_GET['_id']}}"/>

                                                            <div id="test">
                                                            </div>
                                                            <input type="submit" id="submit" value="Proceed" class="btn btn-accent">
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

    <script type="text/javascript" tablename="{{$tablename}}" _id="{{$_GET['_id']}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection

