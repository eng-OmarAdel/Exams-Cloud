var tablename=document.currentScript.getAttribute("tablename");
var website_url=document.currentScript.getAttribute("website_url"); 
var user_id=document.currentScript.getAttribute("user_id");
var exam_id=document.currentScript.getAttribute("exam_id");

var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
      processing: true,
			serverSide: true,

       ajax:{url:website_url+"/"+tablename+"/"+exam_id, function (data, callback, settings) {
       }
       },
			columns: [

                {data: 'name' ,title: "Title"},
                {data: 'status' ,title: "Status"},
                {data: 'pending_reports_count' ,title: "Pending reports"},
                {data: 'rejected_reports_count' ,title: "Rejeced reports"},
								{data: 'Actions',title: "Manage Reports"},
				// {data: 'created_at' ,title: "Creation date"},
				// {data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Manage Reports',
					orderable: false,
					render: function(data, type, full  , meta) {
              manage_reports = `<a href="${website_url}/?view=ManageReports&exam_id=${exam_id}&question_id=${full._id}" target="_blank"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
              <i class="la la-warning"></i>
            </a>`;

						return  `
            ${manage_reports}
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
                  

});


var custom_after=  function(data){
  alert("welcome to edit")
      $("#tags").val(data.mytags);
     

}
