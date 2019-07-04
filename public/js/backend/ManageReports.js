var tablename=document.currentScript.getAttribute("tablename");
var website_url=document.currentScript.getAttribute("website_url"); 
var user_id=document.currentScript.getAttribute("user_id");
var exam_id=document.currentScript.getAttribute("exam_id");
var question_id=document.currentScript.getAttribute("question_id");
var table = $('#m_table_1');
var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
      processing: true,
			serverSide: true,

       ajax:{url:website_url+"/ExamQuestionReports/"+exam_id+"/"+question_id, function (data, callback, settings) {
				
       }
       },
			columns: [

                {data: 'username' ,title: "User"},
                {data: 'reason' ,title: "Reason"},
                {data: 'status' ,title: "Status"},
				// {data: 'created_at' ,title: "Creation date"},
				// {data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				
			],
			initComplete: function(settings, json) {
					console.log(json)
					handle_buttons(json)
			}
			
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




var table_reload;
jQuery(document).ready(function() {
	table_reload=DatatablesDataSourceAjaxServer.init();
	validation( {});

});


var custom_after=  function(data){
  alert("welcome to edit")
      $("#tags").val(data.mytags);

}
function handle_buttons(json){
	if( json.can_reject_or_accept === 1){
		//   accept or reject buttons ....
		buttons = `
		<button type="button" class="btn btn-warning" style="margin-left:40%" onclick=accept()>Aceept</button>
		<button type="button" class="btn btn-danger" onclick=reject()>Reject</button>
		`
		$("#accept_reject_div").html(buttons)
	}
	else{
		$("#accept_reject_div").html("")
	}
}

function accept(){
	$.get(`${website_url}/accept_report/${exam_id}/${question_id}`,function(data){
		console.log(data);
		$(table).DataTable().ajax.reload(function ( json ) {
			handle_buttons(json)
			swal("Accepted")
		});
	});
}

function reject(){
	$.get(`${website_url}/reject_report/${exam_id}/${question_id}`,function(data){
		console.log(data);
		$(table).DataTable().ajax.reload(function ( json ) {
			handle_buttons(json)
			swal("rejected")
		});
	});
}