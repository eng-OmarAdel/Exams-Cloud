var tablename=document.currentScript.getAttribute("tablename"); //1
var id=document.currentScript.getAttribute("_id"); //2

var reload;
var exam= {
    init:function() {
          $.ajax({url: "Question/"+id,
            beforeSubmit:function(){
                mApp.block(".m-invoice__wrapper");


          } ,complete: function(jqXHR, textStatus) {
                var item = $.parseJSON(jqXHR.responseText); //question
                console.log(item)
                quiz=""
                back=""
                result="<div class=' m-portlet__body row'><div class='col-md-8 offset-2'><h3>"+item.name+"</h3><br><br><input type=\"hidden\"  name=\"question\" value=\""+item._id+"\">"
                //<input type=\"hidden\"  name=\"type\" value=\""+item.type+"\">
                if(item.is_programming=="Yes"){
                    result+='<div class="form-group m-form__group"><textarea class="form-control m-input" id="exampleTextarea" rows="20"  name=\"answer\" ></textarea></div><div class="form-group m-form__group"></div>';
                }
                else{
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


// ==========================correct ========================
var correct =function(id){
    $("#correct").ajaxSubmit({url: "http://localhost", type: 'post',
        beforeSubmit: function(arr, $form, options) {
        toastr.warning('Please wait!');
        mApp.block(".m-invoice__wrapper");
        },
        success:function(e){
            $.ajax({url: "Correct/"+id, type: 'POST',
                data: {_token: "{{ csrf_token() }}",answer:$("input[name='answer']:checked").val(), e:e,_method: "put"},
                success:function(e){

                    if(e=="success"){
                        toastr.success("ٌRight answer");
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
// ==============================on ready========================= 
jQuery(document).ready(function() {
    exam.init();
});
