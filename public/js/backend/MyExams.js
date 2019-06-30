var tablename=document.currentScript.getAttribute("tablename");
var cat_id=document.currentScript.getAttribute("cat_id"); //2
var cat_type=document.currentScript.getAttribute("cat_type"); //3
var website_url=document.currentScript.getAttribute("website_url"); //3
var user_id=document.currentScript.getAttribute("user_id"); //
console.log(tablename);
var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
      processing: true,
			serverSide: true,

       ajax:{url:website_url+"/"+tablename, function (data, callback, settings) {
       }
       },
			columns: [

                {data: 'title' ,title: "Title"},
                {data: 'page_type' ,title: "Page type"},
                {data: 'tags[, ].tag' ,title: "Tags"},
                {data: 'duration' ,title: "Duration"},
								{data: 'Actions',title: "Actions"},
				// {data: 'created_at' ,title: "Creation date"},
				// {data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				{
					targets: 0,
					title: 'Title',
					orderable: false,
					render: function(data, type, full, meta) {

            if (typeof full.category !== 'undefined') {
                    status = `<a id="view" href="?view=Question&cat_id=${full.category}&cat_type=1&exam_id=${full._id}" class="dropdown-item">${full.title}</a>`;
            }else if (typeof full.track !== 'undefined'){
                    status = `<a id="view" href="?view=Question&cat_id=${full.track}&cat_type=2&exam_id=${full._id}" class="dropdown-item">${full.title}</a>`;
            }
						
            return status;

					},
				},
                {
          targets: 1,
          title: 'Page type',
          orderable: false,
          render: function(data, type, full, meta) {
                if(data=="one_page"){
                    return "Exam in one page";

                }else if(data=="wizard"){
                    return "wizard"
                }else{
                  return ""
                }

          },
        },
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full  , meta) {

            if (typeof full.category !== 'undefined') {
                    showQuestions_ok = `<a id="view" href="?view=Question&cat_id=${full.category}&cat_type=1&exam_id=${full._id}" class="dropdown-item">Manage Questions</a>`;
            }else if (typeof full.track !== 'undefined'){
                    showQuestions_ok = `<a id="view" href="?view=Question&cat_id=${full.track}&cat_type=2&exam_id=${full._id}" class="dropdown-item">Manage Questions</a>`;

            }
          showQuestions_not_ok=``;
          Solve_ok = `<a id="view" href="?view=ExamSolve&_id=${full._id}" class="dropdown-item">Solve Exam</a>`
          Solve_not_ok = `<a id="view" href="#" class="dropdown-item">Can't be Solved (under construction)</a>`
          edit_ok= `<a href="#" onclick="fill_portlet('` + full._id + `')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
            <i class="la la-edit"></i>
          </a>`
          edit_not_ok =``;
            
            edit =edit_not_ok;
            showQuestions =showQuestions_not_ok;
            if(user_id==full.ownerID ){
                if(full.hasOwnProperty('is_editable')){
                  if(full.is_editable == 1){
                    edit = edit_ok;
                    showQuestions = showQuestions_ok;
                  }
                }
                else{
                  //owner and exam not yet solved
                  edit = edit_ok;
                  showQuestions = showQuestions_ok;
                }
            }

            Solve = Solve_not_ok;
            if(full.is_published == 1){

              Solve = Solve_ok;
            }
						return  `
            <span class="dropdown">
                <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                  <i class="la la-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    ${showQuestions}${Solve}
                </div>
            </span>${edit}
            `;
					},
				}
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

                 $.ajax({
                  url: website_url+"/Exams",

                  complete: function(jqXHR){
                  var data = $.parseJSON(jqXHR.responseText);
                  console.log(data);
                  $("#Category").html(data);
                  }});
});


var custom_after=  function(data){
  alert("welcome to edit")
      $("#tags").val(data.mytags);
     

}
