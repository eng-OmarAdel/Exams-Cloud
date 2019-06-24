var tablename=document.currentScript.getAttribute("tablename"); //1
var _id=document.currentScript.getAttribute('_id'); //1
var exam_id=document.currentScript.getAttribute('exam_id'); //1


jQuery(document).ready(function() {

                 $.ajax({
                  url: `/${tablename}?_id=${_id}&exam_id=${exam_id}`,

                  complete: function(jqXHR){
                  var data = $.parseJSON(jqXHR.responseText);

                      $('#title').html(data.data.title);
                    //  $('#authority_name').append(data.data.authority_name.name);
                      //$('#track_name').append(data.data.track_name.name);

                      var quiz='';
                      var back='';
                      var result='';
                      $.each( data.data.questions, function( key, item ) {
                      	if(data.r[key].is_true=="yes"){
                      		qstyle="style='color:green;'"
                      		qIs="true"
                      	}else{
							qstyle="style='color:red;'"
                      		qIs="false"

                      	}
                      result+=`<div class=' m-portlet__body row'><div class='col-md-8 offset-2'><h3 ${qstyle}>${item.name} (${qIs})</h3><br><br><input type="hidden"  name="question" value="${item._id.$oid}">`
                      if(item.is_programming=="Yes"){
                          result+='<pre><code>'+data.r[key].answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;")+'</code></pre>';

                      }else{
                          result+=`<input type="hidden"  name="answer[${item._id.$oid}]">`
                          $.each(item.answers, function(i, item2) {
                          	style =""
                          	if(data.r[key].answer==item2._id.$oid){

                          		style ="style='border-style: solid;color: red;'"
                          	}
                          	if(item2.is_true==1){
                          		style ="style='border-style: solid;color: green;'"

                          	}

                          	  result+=`<div ${style} class='row'>`

                              item2.answer = item2.answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;");

                              result+=  `${item2.answer}</div>`
                          });
                          result+="</div>";

                      }
                      next=""


                      result+='</div>'+next+'</div>';
                      console.log(result)


                      });

                      $("#test").html(result);
                      $("#block-view").show();

                                        }});




});
