var tablename=document.currentScript.getAttribute("tablename"); //1

var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			ajax: tablename,
			columns: [

                {data: 'name' ,title: "name"},
                {data: 'track' ,title: "track"},
                {data: 'category' ,title: "category"},
				{data: 'created_at' ,title: "Creation date"},
				{data: 'Actions',title: "Actions"},
			],
			columnDefs: [
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
                        <a href="#" onclick="fill_portlet('` + full._id + `')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                          <i class="la la-edit"></i>
                        </a>`;
					},
				},{
                    targets: -3,
                    title: 'Type',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        if(data=="no"){
                            return "Choice"
                        }else{
                            return "programming"

                        }
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
    //////////////////////////////////////////////////////////////////////
    

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
  //      }});

