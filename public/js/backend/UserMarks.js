var tablename=document.currentScript.getAttribute("tablename"); //1
var user_id=document.currentScript.getAttribute("user_id"); //1
var exam_id=document.currentScript.getAttribute("exam_id"); //1
var website_url=document.currentScript.getAttribute("website_url"); //1

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
   


      