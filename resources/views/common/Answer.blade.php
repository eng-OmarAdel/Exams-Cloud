@extends("layouts.index")
@section("title")
@php $tablename="Answer" @endphp
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
    </div>
</div>

<div class="m-portlet__body">

    <!--begin: Datatable -->
    <table class="" id="m_table_1">

    </table>
</div>

@endsection
@section("script")
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" src="{{url("js/backend/".$tablename.".js")}}"></script>
@endsection
