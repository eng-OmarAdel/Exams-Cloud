var tablename=document.currentScript.getAttribute("tablename"); //1
var id=document.currentScript.getAttribute("_id"); //2
var website_url=document.currentScript.getAttribute("website_url"); //2
var question;
var csrf_token = document.currentScript.getAttribute("csrf");

var reload;

// ============== load the question and complete front end ===============
var exam= {
    init:function() {
          $.ajax({url: website_url+"/Question/"+id,
            beforeSubmit:function(){
                mApp.block(".m-invoice__wrapper");


            } ,
            complete: function(jqXHR, textStatus) {
                var item = $.parseJSON(jqXHR.responseText); //question
                question = item;
                //console.log(item)
                quiz=""
                back=""
                //div has the question title
                //input: name = question , value = id
                        select=""
                        options=[];
                    if(item.type=="complete" && item.is_programming=="no"){
                       $.each(item.answers, function(i, item2) {
                        options[i]=`<option value="${i}">${item2.answer}</option>`
                            })

                        options =shuffle(options);
                            select+=`<select style="display: inline;" name="complete[]">`

                       $.each(options, function(i, item2) {
                           select+= item2;
                       })
                            select+=`</select>`
                           item.name= item.name.replace(/______/g, select)
                    }
                result="<div style='display: inline;' class=' m-portlet__body row'><div style='display: inline;'  class='col-md-8'><h3 >"+item.name+"</h3>"
                if(item.is_programming=="Yes"){
                    //code text area -> name = answer
                    result+=`<div class="form-group m-form__group">
                        <textarea class="form-control m-input" id="code" rows="20"  name=\"answer\" ></textarea>
                        </div><div class="form-group m-form__group"></div>
                    `;
                    // button to test code (execute)
                    $("#buttons_area").prepend(`
                                    <button class="btn btn-info" id="execute_code"  onclick="handle_execute()"  type="button">
                                        Execute Code
                                    </button>
                        `
                    )
                }
                else{





                    result+="<div class='row'>"
                    result+='<input type="hidden"  name=\"answer\">'
                    $.each(item.answers, function(i, item2) {
                        item2.answer = item2.answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;");
                        if(item.type=="choose"){
                        result+=  '<div class="col-md-12"><div class="m-invoice__item"><span class="m-invoice__subtitle " ><div class="m-radio-list"><label class="m-radio m-radio--success"><input type="radio"  name=\"answer\"   value="'+item2._id+'"> '+item2.answer+'<span></span></label></div></span></div></div>'
                   }
                    });
                    //input (radio) -> name = answer
                    result+="</div>";
                }
                next=""
                result+='</div>'+next+'</div>';
                console.log(result)
                $(".m-invoice__items").html(result)
                mApp.unblock(".m-invoice__wrapper");
            }});
        }};
//=======================================================

// ==========================correct ========================
var correct =function(id){
    if(question.is_programming=="Yes"){
        if($.trim($("#code").val()) == "") {
            alert("please solve the question");
            return;
        }
    }
    $("#correct").ajaxSubmit({url: website_url+"/Correct/"+id, type: 'post',
        beforeSubmit: function(arr, $form, options) {
        toastr.warning('Please wait!');
        mApp.block(".m-invoice__wrapper");
        },
        data: {_token: csrf_token ,_method: "put"},
        success:function(e){
            e = $.parseJSON(e);
            if(e.is_true==1){
               toastr.success("Excelent!!");
            }
            else{
               toastr.error("Try_again","Wrong answer!!");
            }
            mApp.unblock(".m-invoice__wrapper");
        },
        error:function(e){
            mApp.unblock(".m-invoice__wrapper");
        }
    });
}
// ==============================execute code=====================
var handle_execute = function(){
    code = $("#code").val();
    if($.trim(code) == ""){
        alert("No code provided, idiot!");
    }
    else{
        extension = question.programming_language;
        execute_code(code, extension)
    }
}
//======================================================
var execute_code = function(code , extension){
    $.post({url: website_url+"/ExecuteCode",
        beforeSubmit:function(){
            toastr.warning("please wait");
            mApp.block(".m-invoice__wrapper");
        } ,
        data: {
            extension: extension,
            code: code,
            _token: csrf_token
        },
        complete: function(jqXHR, textStatus) {
            var result = $.parseJSON(jqXHR.responseText).result;
            //alert("result of executed code is:\n"+result);
            mApp.unblock(".m-invoice__wrapper");
            $("#execution_result_container").show();
            $("#execution_result").html(result);
        }
    });
}
//======================================================

function shuffle(a) {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}
//=================================================================

// ==============================on ready========================= 
jQuery(document).ready(function() {
    exam.init();
    //load recommended questions
    $.get("http://134.209.204.108/q_rec/?target="+id,function(data){
        //console.log(data)
        out_div = `
        <div class="m-invoice__container col-md-4 pt-5" style="float:right" >
                                        <h3> recommended questions </h3>
        `
        for(var i=2; i < data.length - 1; i=i+2){
            q_recommended = `<a class="btn rec_q" href="`+website_url+`/?view=QuestionSolve&id=`+data[i]+`">`+data[i+1]+`</a>`
            out_div += q_recommended;
        }
        /*
                                        <a class="btn rec_q" href="#"> what is yor name? aseeg  sdf sfd asd se asrdt </a>
        */

        out_div+=`
         </div>
        `
        $("#head").append(out_div);
    });
});
