@extends("layouts.index")
@php $tablename="Home" @endphp
@section("title")
Home
@endsection
@section("content")

    <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Welcome to exam cloud
                            </h3>
                        </div>
                    </div>
            </div>
    </div>

@endsection
@section("script")
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection
