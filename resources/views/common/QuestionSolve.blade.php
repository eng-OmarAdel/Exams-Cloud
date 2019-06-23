@extends("layouts.index")
@section('title')
Question Solving
@endsection('title')
@section('content')
<style type="text/css">
    
            #difficulty0,#thinking_based0,#variant_content0 {
              opacity: 0;
              width: 0;
              float: left;
            }
</style>
<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__body m-portlet__body--no-padding">
                    <div class="m-invoice-2">
                        <div class="m-invoice__wrapper">
                            <div class="m-invoice__head" style="background-image: url(./assets/app/media/img//logos/bg-6.jpg);">
                                <div class="m-invoice__container m-invoice__container--centered">
                                    <div class="row">

                                        <div class="col-md-6">
                                        </div>
                                    
                                        <div class="proceed_exam proceed_exam2 m-section__content">
                                            <blockquote class="blockquote">
                                                <div class="mb-0" id="welcome">
                                                </div>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="lead" id="clock">
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                    <form id="correct"  method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="put"/>
                                        <input name="id" type="hidden" value="{{$_GET['id']}}"/>
                                        <div class="submit_exam m-invoice__items" >
                                            <!--begin::Portlet-->
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="m-invoice__footer">
                                <div class="m-invoice__table m-invoice__table--centered table-responsive">
                                    <button class="submit_exam btn btn-info" id="submit_ex"  onclick="correct('{{$_GET['id']}}')"  type="button">
                                        Submit Answer
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------------------------------------->
@endsection

@section('script')
<script type="text/javascript" tablename="QuestionSolve" _id="{{$_GET['id']}}" src="{{url("js/common/QuestionSolve.js")}}"></script>
@endsection

