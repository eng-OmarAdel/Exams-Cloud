var tablename=document.currentScript.getAttribute("tablename"); //1

var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
      processing: true,
			serverSide: true,

       ajax:{url:tablename, function (data, callback, settings) {
       }
       },
			columns: [

                {data: 'title' ,title: "title"},
                {data: 'auth' ,title: "authority"},
                {data: 'track' ,title: "track"},
                {data: 'count' ,title: "no of tries"},
                {data: 'submited' ,title: "no of tries with submited answers"},
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
                                <a class="dropdown-item" target="_blank" href="?view=ExamSolve&_id=${full.exam_id}"><i class="la la-check-circle"></i> Solve again</a>
                                <a class="dropdown-item" target="_blank" href="?view=SubmittedExams&_id=${full.exam_id}"><i class="la la-check-circle"></i> show submited tries</a>
                                
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
   


      