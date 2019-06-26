var tablename=document.currentScript.getAttribute("tablename");
var cat_id=document.currentScript.getAttribute("cat_id"); //2
var cat_type=document.currentScript.getAttribute("cat_type"); //3
 //1
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

       ajax:{url:"/"+tablename+"?cat_id="+cat_id+"&cat_type="+cat_type, function (data, callback, settings) {
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

												status = `<a id="view" href="?view=Question&cat_id=${cat_id}&cat_type=${cat_type}&exam_id=${full._id}" class="dropdown-item">`+full.title+`</a>`
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

          showQuestions = `<a id="view" href="?view=Question&cat_id=${cat_id}&cat_type=${cat_type}&exam_id=${full._id}" class="dropdown-item">Manage Questions</a>`
          Solve = `<a id="view" href="?view=ExamSolve&_id=${full._id}" class="dropdown-item">Solve Exam</a>`

						return `
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                ${showQuestions}${Solve}
                            </div>
                        </span>
                        <a href="#" onclick="fill_portlet('` + full._id + `')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                          <i class="la la-edit"></i>
                        </a>`;
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
                  url: "/Exams",

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
