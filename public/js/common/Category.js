var tablename=document.currentScript.getAttribute("tablename"); //1
var authid=document.currentScript.getAttribute("authid"); //1
//alert(authid)
var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			"ordering": false,
			// "initComplete": function(settings, json) {
			// 	ajaxTracks();

			// },
			ajax: tablename,
			columns: [

				{data: 'name' ,title: "Name"},
				{data: 'type' ,title: "Type"},
				{data: 'created_at' ,title: "Creation date"},
				{data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				{
					targets: 0,
					title : 'Name',
					"render": function(data, type, full, meta){
						if(full.type=="category"){
								data = '<a class="" href="?view=Category&id=' + full._id + '">' + full.name + '</a>';
						}else if(full.type=="question")
						{
							//data = '<a class="" href="?view=Category&id=' + full._id + '">' + full.name + '</a>';
							data = '<h5>' + full.name + '</h5>';
						}
								// data += '<a href="/Category/' + full._id + '">' + full.name + '</a>';
            return data;
         }
				},
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
                        // if (full.status == "approved") {

                        //     status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\')" href="javascript:;"><i class="la la-ban"></i> suspend</a>'

                        // } else {
                        //     status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\' )" href="javascript:;"><i class="la la-check-circle"></i> approve</a>'
                        // }
          status = '<a class="dropdown-item" target="_blank" href="?view=QuestionSolve&id=' + full._id + '"><i class="la la-check-circle"></i> Solve the question</a>'

						return `
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                `+status+`
                            </div>
                        </span>
                        <a href="#" onclick="fill_portlet('` + full._id + `')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                          <i class="la la-edit"></i>
                        </a>
<a href="#" onclick="delete_item('` + full._id + `')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Remove">
                          <i class="la la-remove"></i>
                        </a>`;
					},
				},
			],
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

// var ajaxTracks= function(){
//         $.ajax({
//         url: "/categoryOptions",

//         complete: function(jqXHR){
//         var data = $.parseJSON(jqXHR.responseText);
//         console.log(data);
//         $("#parentCategory").html(data);
//         }});
// }
    //////////////////////////////////////////////////////////////////////

		$(document).on('click', "#addanswer" , function(e) {
			//add a new day
 
 
			 e.preventDefault();
 
 
			$("#answer").append(`
		 <div class="subdays subdays2 form-group m-form__group row"><div class="col-lg-12 col-md-12 col-sm-12"> <div class="input-group pull-right " > 
 
 
		 <div class="col-md-8">
 
		 <input class="form-control m-input m-input--air answer" type="text"  placeholder="answer"  name="answer[`+$(".answer").length+`]">
		 </div>
		 <div class="col-md-2">
		 <label for="is_true">true</label>
		 <input class="checkbox" value="1" type="checkbox"  id="is_true" name="is_true[`+$(".answer").length+`]">
		 </div>
		 <div class="col-md-2">
 
										 <a href="#" class="delete_answer btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"> <i class="fa fa-close"></i> </a>
		 </div>
				</div> </div></div>`);
			// delete_day();
 
 
			 
		 });
 
		 //Delete day
		 $(document).on('click', ".delete_answer" , function(e) {
 
			 e.preventDefault();
				//remove day
			 $(this).parent().parent().parent().parent().remove();
			 
		 });
 
		 $(document).on("change",".checkbox",function() {
				 $(".checkbox").prop('checked', false);
				 $(this).prop('checked', true);
		 });
 var custom_after=  function(data){
	 alert("welcome to edit")
				 $("#is_programming").trigger("change");
				 is_programming=$("#is_programming").val();
				 if(is_programming=="no"){
				 $(".answer").each(function(index, value) {
									$(this).val("")
 
								value.readOnly = false;
 
 
				 })
						 answers=data.answers;
						 var count=0
							
						 $(".subdays2").remove();
						 var numItems = $('.answer').length
 
						 $.each( answers, function( key, value ) {
								 count++;
 
								 if (count>numItems) {
										 $("#addanswer").trigger('click'); 
							 }
						 });
 
						 $(".answer").each(function( key, value ) {
 
								$(this).val(answers[key].answer);
								if(answers[key].is_true==1){
								$(this).parent().parent().find(".checkbox").prop("checked",true)
						}
						else{
 
								$(this).parent().parent().find(".checkbox").prop("checked",false)
						 }
							 });
						 }
 
				 
 }
		 $(document).on("change",".checkbox",function() {
				 $(".checkbox").prop('checked', false);
				 $(this).prop('checked', true);
		 });
				 $(document).on("change","#is_programming",function() {
						 type=$(this).val()
								 if(type=="no"){
				 $("#essay_answer").hide();
 
				 $("#answers1").show();
				 $("#addanswer").show();
								 $("#interactive").hide();
 
				 $(".answer").each(function(index, value) {
									$(this).val("")
 
								value.readOnly = false;
 
 
				 })
 
			}else {
				 $("#answers1").hide();
				 $("#essay_answer").show();
				 $("#interactive").hide();
 
						 if(type=="complete")
								 $("#question_label").html("statment");
 
			}
 
		 });

        

