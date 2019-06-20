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

			ajax: tablename,
			columns: [
				// {data: '_id' ,title: "#"},
				{data: 'email' ,title: "email"},
				{data: 'full_name' ,title: "Full name"},
                {data: 'status' ,title: "Status"},
                {data: 'type' , title:"Type"},
				{data: 'created_at' ,title: "Creation date"},
				{data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
                        if (full.status == "approved") {

                            status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\')" href="javascript:;"><i class="la la-ban"></i> suspend</a>'

                        } else {
                            status = '<a class="dropdown-item" onclick="delete_item(\'' + full._id + '\' )" href="javascript:;"><i class="la la-check-circle"></i> approve</a>'
                        }

						return `
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                `+status+`
                            </div>
                        </span>
                        <a href="#" onclick="fill_portlet('` + full._id + `')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                          <i class="la la-edit"></i>
                        </a>`;
					},
				},{
					targets: -3,
					render: function(data, type, full, meta) {
						var status = {
							"suspended": {'title': 'suspended', 'class': ' m-badge--danger'},
							"approved": {'title': 'approved', 'class': ' m-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="m-badge ' + status[data].class + ' m-badge--wide">' + status[data].title + '</span>';
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
	               validation( {
                    email: {
                        required: true,
                        email: true,
                        maxlength: 255,
                        remote: {
                            url: 'emailcheck',
                            type: 'get',
                            data: {


                                email: function () {
                                    return $('#email').val();
                                },
                                user: function () {
                                    return $('#form_add').attr('action').split("/")[1];
                                },

                            },
                        }
                    },
                    password: {

                        maxlength: 255,
                        minlength: 8,
                    },
                    confirmpassword: {
                        equalTo: "#password",
                        maxlength: 255,
                        minlength: 8,
                    },
                    username: {
                        required: true,
                        maxlength: 255,
                    },
                    full_name: {
                        required: true,
                        maxlength: 255,
                    }

                });
});
