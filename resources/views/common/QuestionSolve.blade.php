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
<script>
    //Table Name Variable



    
var reload;

var exam= {
    init:function() {
          $.ajax({url: "Question/{{$_GET['id']}}",
            beforeSubmit:function(){
                mApp.block(".m-invoice__wrapper");


          } ,complete: function(jqXHR, textStatus) {
                var item = $.parseJSON(jqXHR.responseText);

                    quiz=""
                    back=""


                    result="<div class=' m-portlet__body row'><div class='col-md-8 offset-2'><h3>"+item.name+"</h3><br><br><input type=\"hidden\"  name=\"question\" value=\""+item._id+"\">"
                    //<input type=\"hidden\"  name=\"type\" value=\""+item.type+"\">
                    if(item.is_programming="Yes"){
                    result+='<div class="form-group m-form__group"><textarea class="form-control m-input" id="exampleTextarea" rows="20"  name=\"answer\" ></textarea></div><div class="form-group m-form__group"></div>';

                    }else{
                        result+="<div class='row'>"
                        result+='<input type="hidden"  name=\"answer\">'
                $.each(item.answers, function(i, item2) {
                   item2.answer = item2.answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;");

                      result+=  '<div class="col-md-12"><div class="m-invoice__item"><span class="m-invoice__subtitle " ><div class="m-radio-list"><label class="m-radio m-radio--success"><input type="radio"  name=\"answer\"   value="'+item2._id+'"> '+item2.answer+'<span></span></label></div></span></div></div>'
                        });
                        result+="</div>";

                    }
                        next=""


                    result+='</div>'+next+'</div>';
                    console.log(result)
                $(".m-invoice__items").html(result)

                mApp.unblock(".m-invoice__wrapper");

 


            }});
           }};


//////////////////////////////////////////////////////////////////////
var correct =function(id){

        $("#correct").ajaxSubmit({url: "http://localhost", type: 'post',
                          beforeSubmit: function(arr, $form, options) {
                    toastr.warning('Please wait!');
                                    mApp.block(".m-invoice__wrapper");


                },
                                      success:function(e){

                        $.ajax({url: "Correct/{{$_GET['id']}}", type: 'POST',
                                                data: {_token: "{{ csrf_token() }}",answer:$("input[name='answer']:checked").val(), e:e,_method: "put"},

                                      success:function(e){

                                        if(e=="success"){
                                                toastr.success("write answer");
  
                                        }else{
                                                toastr.error(e,"wrong answer");

                                        }

                                    mApp.unblock(".m-invoice__wrapper");


                                      }
 
                                  });
                                    mApp.unblock(".m-invoice__wrapper");


                                      },
                                      error:function(e){

                                    mApp.unblock(".m-invoice__wrapper");



                                      }
                                  });

}

    jQuery(document).ready(function() {
        exam.init();


        });


</script>
@endsection

