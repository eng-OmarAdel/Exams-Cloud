var tablename=document.currentScript.getAttribute("tablename"); //1
var _id=document.currentScript.getAttribute("_id"); //1

var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
      processing: true,
			serverSide: true,

       ajax:{url: "/"+tablename+"?_id="+_id , function (data, callback, settings) {
       }
       },
			columns: [

                {data: 'mark' ,title: "mark"},
				{data: 'created_at',title: "submitted at"},
				{data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full  , meta) {
                        return `<span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" target="_blank" href="?view=ViewAnswers&_id=${full._id}&exam_id=${_id}"><i class="la la-check-circle"></i> View my answers</a>  
                            </div>
                        </span>`
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

});
    //////////////////////////////////////////////////////////////////////
   


      