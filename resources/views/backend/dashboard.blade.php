    @can('admin')
@extends('layouts.backend')

@section('content')

<h1 class="page-title" style="margin-left: 41%; margin-bottom: 3% ; margin-top: -6%;">لوحة القيادة

</h1>


<div class="row">
<div class="col-xl-6">
        <!--begin:: Packages-->
<div dir="rtl" class="m-portlet m--bg-warning m-portlet--bordered-semi m-portlet--full-height ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text m--font-light">
                    الاحصائيات
                </h3>
            </div>
        </div>

    </div>
    <div class="m-portlet__body" >
        <!--begin::Widget 29-->
        <div class="m-widget29">             
            <div class="m-widget_content">
                <h3 class="m-widget_content-title">أصحاب الملاعب الذين سجلوا </h3>
                <div class="m-widget_content-items">
                    <div class="m-widget_content-item">
                        <span>اليوم</span>
                        <span id="playground_owners_this_day" class="m--font-accent"></span>
                    </div>  
                    <div class="m-widget_content-item">
                        <span>هذا الاسبوع</span>
                        <span id="playground_owners_this_week" class="m--font-brand"></span>
                    </div>
                    <div class="m-widget_content-item">
                        <span>هذا الشهر</span>
                        <span id="playground_owners_this_month"></span>
                    </div>
                </div>  
            </div>   
            <div class="m-widget_content">
                <h3 class="m-widget_content-title">العملاء الذين سجلوا  </h3>
                <div class="m-widget_content-items">
                    <div class="m-widget_content-item">


                        <span>اليوم</span>
                        <span id="clients_this_day" class="m--font-accent"></span>
                    </div>  
                    <div class="m-widget_content-item">
                        <span>هذا الاسبوع</span>
                        <span id="clients_this_week" class="m--font-brand"></span>
                    </div>
                    <div class="m-widget_content-item">
                        <span>هذا الشهر</span>
                        <span id="clients_this_month"></span>
                    </div>
                </div>  
            </div>    
            <div class="m-widget_content">
                <h3 class="m-widget_content-title">الحجوزات</h3>
                <div class="m-widget_content-items">
                    <div class="m-widget_content-item">
                        <span>اليوم</span>
                        <span id="orders_this_day" class="m--font-accent"></span>
                    </div>  
                    <div class="m-widget_content-item">
                        <span>هذا الاسبوع</span>
                        <span id="orders_this_week" class="m--font-brand"></span>
                    </div>
                    <div class="m-widget_content-item">
                        <span>هذا الشهر</span>
                        <span id="orders_this_month"></span>
                    </div>
                </div>  
            </div>      
        </div>
        <!--end::Widget 29--> 
    </div>
</div>
<!--end:: Packages-->


                    </div>
<div class="col-xl-6">
    <!--begin:: Widgets/Finance Summary-->
<div class="m-portlet m-portlet--full-height ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    ملخص
                </h3>
            </div>
        </div>
      
    </div> 
    <div class="m-portlet__body">
        <div class="m-widget12">
            <div class="m-widget12__item">                       
                <span class="m-widget12__text1">مجموع أصحاب الملاعب<br> <span id="playground_owners"></span></span>                   
                <span class="m-widget12__text2">مجموع العملاء<br> <span id="clients"></span></span>             
            </div>
            <div class="m-widget12__item">                       
                <span class="m-widget12__text1">مجموع الحجوزات<br> <span id="orders"></span></span>                     
                <span class="m-widget12__text2">مجموع مجموعات الملاعب<br> <span id="playground_groups"></span></span>             
            </div>
            <div class="m-widget12__item">
                <span class="m-widget12__text1">مجموع الملاعب<br> <span id="playgrounds"></span></span>
                <span class="m-widget12__text2">مجموع رسائل الدعم<br> <span id="Support"></span></span>             

            </div>
        </div>           
    </div>
</div>
<!--end:: Widgets/Finance Summary-->  </div></div>@endsection



@section('script')

<script>

jQuery(document).ready(function() {


$.ajax('Dashboard', {
            complete: function(jqXHR, textStatus) {
                var dashboard = $.parseJSON(jqXHR.responseText);

                $('#playground_owners').html(dashboard['playground_owners']);
                $('#playground_owners_this_day').html(dashboard['playground_owners_this_day']);
                $('#playground_owners_this_week').html(dashboard['playground_owners_this_week']);
                $('#playground_owners_this_month').html(dashboard['playground_owners_this_month']);


                $('#clients').html(dashboard['clients']);
                $('#clients_this_day').html(dashboard['clients_this_day']);
                $('#clients_this_week').html(dashboard['clients_this_week']);
                $('#clients_this_month').html(dashboard['clients_this_month']);


                $('#orders').html(dashboard['orders']);
                $('#orders_this_day').html(dashboard['orders_this_day']);
                $('#orders_this_week').html(dashboard['orders_this_week']);
                $('#orders_this_month').html(dashboard['orders_this_month']);

                $('#playgrounds').html(dashboard['playgrounds']);
                 $('#playground_groups').html(dashboard['playground_groups']);
                 $('#Support').html(dashboard['Support']);
                // $('#jobsmonth').html(dashboard['jobsmonth']);
                



            }
        });
});
</script>
@endsection

@endcan