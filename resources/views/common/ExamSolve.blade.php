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
                        <div class="col-lg-1"></div>
                        <div id="block-view" style="display: none;" class="col-lg-10">
                            <div class="m-portlet">
                                <div class="m-portlet__body m-portlet__body--no-padding" style="background-color:rgba(234, 234, 234,0.5)">
                                    <div class="m-invoice-2">
                                        <div class="m-invoice__wrapper">
                                            <div class="m-invoice__head">
                                                <div class="container m-invoice__container--centered">
                                                    <br><br>
                                                    <div class="m-invoice__logo">
                                                        {{--  --}}
                                                        <span style="float:left">
															<h4 id="authority_name"><b>authority : </b></h4>
                                                        <h4 id="track_name"><b>track : </b></h4>
														</span>
                                                        <a style="float: right" href="#">
                                                            <div id="timer" class="text-center" style="font-size:40px;position:fixed;margin-left:-100px;"></div>
                                                        </a>
                                                    </div><br><br><br><br><br><br>
                                                    <a style="" href="#">
                                                        <h1 class="text-center" id="title"></h1>
                                                    </a>
                                                </div>
                                            </div>
                                            {{-- <div class="m-invoice__body m-invoice__body--centered"> --}}
                                                <div >
                                                        <form action="{{$tablename}}" method="post"  id="form_add">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="_method" value="post" fillable="never"/>
                                                            <input name="exam_id" type="hidden" value="{{$_GET['_id']}}"/>

                                                            <div id="test" style="margin-left:-200px">
                                                            </div>
                                                            <h2 class="text-center"><input type="submit" id="submitExam" class="btn btn-accent"></h2>
                                                        </form>
                                                        <br><br>
                                                </div>
                                            {{-- </div> --}}
                                            {{-- <div class="m-invoice__footer">
                                                <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                                    <table  id="table" class="table">
                                                    </table>
                                                </div>
                                            </div> --}}
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
                                                        <br><br>
                                                </div>
                                            </div>
                                            {{-- <div class="m-invoice__footer">
                                                <div class="m-invoice__table  m-invoice__table--centered table-responsive">
                                                    <table  id="table" class="table">
                                                    </table>
                                                </div>
                                            </div> --}}
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

    <script type="text/javascript" tablename="{{$tablename}}" website_url="{{url("")}}" csrf_token="{{ csrf_token() }}" _id="{{$_GET['_id']}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection

