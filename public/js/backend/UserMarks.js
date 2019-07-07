var tablename=document.currentScript.getAttribute("tablename"); //1
var user_id=document.currentScript.getAttribute("user_id"); //1
var exam_id=document.currentScript.getAttribute("exam_id"); //1
var website_url=document.currentScript.getAttribute("website_url"); //1
var my_count = 0;
var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
      processing: true,
			serverSide: true,

       ajax:{url: website_url+"/"+tablename+"?user_id="+user_id+"&exam_id="+exam_id , function (data, callback, settings) {
       }
       },
			columns: [

                {data: 'mark' ,title: "mark"},
				{data: 'created_at',title: "submitted at"},
				{data: "_id" , title: "View Detailed answers"}
			] ,
			columnDefs: [
				{
					targets: -1,
					orderable: false,
					render: function(data, type, full  , meta) {
						// manage_ = `<a href="${website_url}/ViewAnswersByUserID?exam_id=${exam_id}&_id=${full._id}&user_id=${full.user_id}" target="_blank"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
            //   <i class="la la-keyboard-o"></i>
						// </a>`;
						my_count = my_count+1
						manage_ = `<button onclick="questionsAns('${full._id}' , '${my_count}')" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View"  >
              <i class="la la-keyboard-o"></i>
            </button>`;
						return manage_;
					}
			 }
			]
			
		});
		return table;
	};

	return {

		//main function to initiate the module
		init: function() {
			return initTable1();
		},

	};

}();


var questionsAns = function(trial_id , count_passed ) {
	$("#test").html("");
	url = website_url+`/ViewAnswersByUserID?_id=${trial_id}&exam_id=${exam_id}&user_id=${user_id}`
	// ==========
		$.ajax({
		url: url,

		complete: function(jqXHR){
		var data = $.parseJSON(jqXHR.responseText);
				console.log(data)
				var quiz='';
				var back='';
				var result=`<h3> Answers of trial ${count_passed}<h3>`;
				$.each( data.data.questions, function( key, item ) {
					if(item.status=="suspended"){
						return true;
					}
					if(data.r[key].is_true=="yes"){
						qstyle="style='display:inline;color:green;'"
						qIs="true"
					}else{
qstyle="style='display:inline;color:red;'"
						qIs="false"

					}
																if(item.is_programming=="no" && item.type=="complete"){
																	answerArr = data.r[key].answer.split("(@)");
																	for (var i =0; i <answerArr.length; i++) {
																			item.name = item.name.toString().replace('______', `<div  style='display:inline;color:black'>${answerArr[i]}</div>`);
																	}
																}
							// console.log(data.r[key].is_true)
				
					reportButton=``;
				result+=`<div class=' m-portlet__body row'><div class='col-md-12'><h3 ${qstyle}>${item.name} (${qIs})${reportButton}</h3><br><br><input type="hidden"  name="question" value="${item._id.$oid}">`
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


				});

				$("#test").html(result);
				$("#block-view").show();
				$('html, body').animate({scrollTop: $("#testscroll").offset().top}, 'slow');
				// mApp.scrollTo("#testscrol1")
				
	}});
	// ==========

}
 

var table_reload;
jQuery(document).ready(function() {
	table_reload=DatatablesDataSourceAjaxServer.init();
});
    //////////////////////////////////////////////////////////////////////
   


      