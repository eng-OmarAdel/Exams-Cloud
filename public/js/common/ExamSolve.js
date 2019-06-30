var tablename=document.currentScript.getAttribute("tablename"); //1
var _id=document.currentScript.getAttribute('_id'); //1
var website_url=document.currentScript.getAttribute('website_url'); //1
var csrf_token=document.currentScript.getAttribute('csrf_token'); //1
function countdown(minutes) {
    var seconds = 60;
    var mins = minutes
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =
current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            setTimeout(tick, 1000);
        } else {
 
            if(mins > 1){
 
               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
               setTimeout(function () { countdown(mins - 1); }, 1000);
 
            }
        }
    }
    tick();
}


jQuery(document).ready(function() {

    

                 $.ajax({
                  url: website_url+'/'+tablename+'?_id='+_id,
          
                  complete: function(jqXHR){
                  var data = $.parseJSON(jqXHR.responseText);

                  $("#submit").click(function(){
                    countdown(data.duration);
                    setTimeout(function() {
                        //$('#submitExam').click();
                        swal("One minute left");
                    }, (data.duration-1)*60*1000);
                    setTimeout(function() {
                        $('#submitExam').click();
                        //alert("Hello");
                    }, data.duration*60*1000);
                  }); 

                    $('#timer').html(data.duration+':00');
                      $('#title').html(data.title);
                      if (!(typeof  data.category_name == "undefined" ||  data.category_name == null)) {

                      $('#category_name').append(data.category_name.name);
                      $('#category_name').show();
                    }else{
                      $('#track_name').append(data.track_name.name);
                      $('#track_name').show();

                    }

                      if(data.page_type=="wizard"){
                        page_type_div=`<div style="zoom: 75%;" id="smartwizard"><ul>`
                        for(i=1;i<=data.questions.length;i++){
                          page_type_div+=`<li><a href="#step-${i}">Q${i}<br /></a></li>`
                        }
                          page_type_div+=`</ul><div>`
                        page_type_div_close=`</div></div><h2 style="display:none" class="text-center"><input type="submit" id="submitExam" class="btn btn-accent"></h2>`

                      }else{
                        page_type_div="";
                        page_type_div_close=`<h2 class="text-center"><input type="submit" id="submitExam" class="btn btn-accent"></h2>`;

                      }
    
                      var quiz='';
                      var back='';
                      var result=`${page_type_div}`;
                      $.each( data.questions, function( key, item ) {
                          select=""
                          options=[];
                      if(item.type=="complete" && item.is_programming=="no"){
                         $.each(item.answers, function(i, item2) {
                          options[i]=`<option value="${i}">${item2.answer}</option>`
                              })

                          options =shuffle(options);
                              select+=`<select style="display: inline;" name="complete[${item._id.$oid}][]">`

                         $.each(options, function(i, item2) {
                             select+= item2;
                         })
                              select+=`</select>`
                             item.name= item.name.replace(/______/g, select)
                      }

                      result+=`<div id="step-${key+1}" class=' m-portlet__body row'><div class='col-md-8 offset-2'><h3>${item.name}</h3><br><br><input type="hidden"  name="question" value="${item._id.$oid}">`
                      if(item.is_programming=="Yes"){
                          result+=`<div class="form-group m-form__group"><textarea class="form-control m-input" id="code-${item._id.$oid}" rows="20"  name="answer[${item._id.$oid}]" ></textarea></div><div class="form-group m-form__group"></div>`;
                          result+=`<div id="result_code-${item._id.$oid}"></div><button class="btn btn-info" onclick="handle_execute('${item._id.$oid}','${item.programming_language}')"  type="button">
                                        Execute Code
                                    </button>`;
                      }else{
                          result+=`<div class='row'>`
                          result+=`<input type="hidden"  name="answer[${item._id.$oid}]">`
                          $.each(item.answers, function(i, item2) {
                              item2.answer = item2.answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;");

                              if(item.type=="choose")
                              result+=  `<div class="col-md-12"><div class="m-invoice__item"><span class="m-invoice__subtitle " ><div class="m-radio-list"><label style="font-size:20px" class="m-radio m-radio--success"><input type="radio"  name="answer[${item._id.$oid}]"   value="${item2._id.$oid}"> ${item2.answer}<span></span></label></div></span></div></div>`
                          });
                          result+="</div>";

                      }


                      result+=`</div></div>`;


                      });

                      $("#test").html(result+`${page_type_div_close}`);
                      if(data.page_type=="wizard"){
                        $("#test").removeAttr("style");
                        $('#smartwizard').smartWizard({
                          selected: 0,  // Initial selected step, 0 = first step 
                            contentCache:false, 
                            keyNavigation:false,
                          transitionEffect: 'fade',
                          toolbarSettings: {

                      toolbarExtraButtons: [
                $('<button></button>').text('Finish')
                          .addClass('btn btn-info')
                          .on('click', function(){ 
                              $("submitExam").trigger("click");                          
                          })
                      ]
                                  
                        }// Effect on navigation, none/slide/fade

                        });
                        }
                  }});

$('#submit').click(function(e){

                 $("#proceed").ajaxSubmit({url: website_url+'/proceed', type: 'post',      
                      success: function (data) {
                    $("#block-view").show();
                    $("#proceed-view").hide();
                }
               })
e.preventDefault();
})


});

// ==============================execute code=====================
var handle_execute = function(id,lang){
    code = $("#code-"+id).val();
    if($.trim(code) == ""){
        alert("No code provided");
    }
    else{
        extension = lang;
        execute_code(code, extension,id)
    }
}
//======================================================
var execute_code = function(code , extension,id){
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
            $("#result_code-"+id).html(result);
        }
    });
}
function shuffle(a) {
    for (let i = a.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [a[i], a[j]] = [a[j], a[i]];
    }
    return a;
}

