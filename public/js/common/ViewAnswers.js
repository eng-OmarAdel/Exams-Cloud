var tablename=document.currentScript.getAttribute("tablename"); //1
var _id=document.currentScript.getAttribute('_id'); //1
var exam_id=document.currentScript.getAttribute('exam_id'); //1


jQuery(document).ready(function() {

                 $.ajax({
                  url: `/${tablename}?_id=${_id}&exam_id=${exam_id}`,
          
                  complete: function(jqXHR){
                  var data = $.parseJSON(jqXHR.responseText);

                      $('#title').html(data.data.title);
                      if (!(typeof  data.data.category_name == "undefined" ||  data.data.category_name == null)) {

                      $('#category_name').append(data.data.category_name.name);
                      $('#category_name').show();
                    }else{
                      $('#track_name').append(data.data.track_name.name);
                      $('#track_name').show();

                    }
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
                                              if(item.is_programming=="no" && item.type=="complete"){
                                                answerArr = data.r[key].answer.split("(@)");
                                                for (var i =0; i <answerArr.length; i++) {
                                                    item.name = item.name.toString().replace('______', `<div  style='display:inline;color:black'>${answerArr[i]}</div>`);
                                                }
                                              }

                      result+=`<div class=' m-portlet__body row'><div class='col-md-8 offset-2'><h3 ${qstyle}>${item.name} (${qIs})</h3><br><br><input type="hidden"  name="question" value="${item._id.$oid}">`
                      if(item.is_programming=="Yes"){
                          result+='<pre><code>'+data.r[key].answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;")+'</code></pre>';

                      }else{
                          $.each(item.answers, function(i, item2) {
                          	style =""
                          	if(data.r[key].answer==item2._id.$oid){

                          		style ="style='border-style: solid;color: red;'"
                          	}
                          	if(item2.is_true==1){
                          		style ="style='border-style: solid;color: green;'"

                          	}
                      		  if(item.type=="choose"){
                          	  result+=`<div ${style} class='row'>`

                              item2.answer = item2.answer.toString().replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/'/g, "&#39;").replace(/"/g, "&#34;");

                              result+=  `${item2.answer}</div>`

                            }
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
