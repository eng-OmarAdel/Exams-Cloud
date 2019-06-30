var tablename=document.currentScript.getAttribute("tablename"); //1
var cat_id=document.currentScript.getAttribute("cat_id"); //2
var cat_type=document.currentScript.getAttribute("cat_type"); //3
var exam_id=document.currentScript.getAttribute("exam_id"); //4
var exam_obj;
var raw_exam_id = exam_id;

if(exam_id){
  exam_id="&exam_id="+exam_id
}else{
  exam_id="";
}


var DatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
      processing: true,
			serverSide: true,

       ajax:{url:tablename+"?cat_id="+cat_id+"&cat_type="+cat_type+exam_id, function (data, callback, settings) {
       }
       },
			columns: [

                {data: 'name' ,title: "name"},
                {data: 'mytags' ,title: "Tags"},
                {data: 'is_programming' ,title: "type"},
				{data: 'created_at' ,title: "Creation date"},
				{data: 'Actions',title: "Actions"},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full  , meta) {

          status = '<a class="dropdown-item" target="_blank" href="?view=QuestionSolve&id=' + full._id + '"><i class="la la-check-circle"></i> Solve the question</a>'
          if(exam_id==""){
            dropdown = `<span class="dropdown">
                              <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                                <i class="la la-ellipsis-h"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                  `+status+`
                              </div>
                          </span>`
          }else{
            dropdown=``;
          }
						return `${dropdown}<a href="#" onclick="fill_portlet('` + full._id +exam_id+`')"  class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                          <i class="la la-edit"></i>
                        </a>`;
          }
  				},{
                    targets: -3,
                    title: 'Type',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        if(full.is_programming=="no"){
                          if(full.type=="choose"){
                            return "Choice"
                          }else if(full.type=="complete"){
                            return "complete"

                          }
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
  validation({});
  handle_question_type();
  handle_not_prog_type();
  if(exam_id){
    $.get("/Exams/"+raw_exam_id, function(data){
      //add any thing depending on exam object here
      exam_obj = data;
      handle_publish_button();
      fill_existing_questions();
    });
  }
  //we no more need to get options
  // $.ajax({
    //   url: "/categoryOptions",
    //   complete: function(jqXHR){
      //   var data = $.parseJSON(jqXHR.responseText);
      //   console.log(data);
      //   $("#Category").html(data);
      // }});
      
    });

    //////////////////////////////////////////////////////////////////////
    $(document).on('click', "#addanswer" , function(e) {
      //add a new day
      
      
      e.preventDefault();
      type = $("#Question-type").val();
      checkbox_html=``
      if(type=="complete"){
        checkbox_html=`style="display: none;"`
      }
      
      $("#answer").append(`
      <div class="subdays subdays2 form-group m-form__group row"><div class="col-lg-12 col-md-12 col-sm-12"> <div class="input-group pull-right " > 
      
      
      <div class="col-md-8">
      
      <input class="form-control m-input m-input--air answer" type="text"  placeholder="answer"  name="answer[`+$(".answer").length+`]">
      </div><div ${checkbox_html} class="Question-type-checkboxes col-md-2">
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
      $("#Question-type").trigger("change");
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
      $(document).on("change","#is_programming", handle_question_type );
      $(document).on("change","#Question-type", handle_not_prog_type );
      $(document).on("click","#add_space_btn", handle_add_space_btn );
      // ===================== Abdullah =====================
      $(document).on('click', "#generate_tags" , function(e) {
        e.preventDefault();
        var quest_body = $("#question").val();
        if ($.trim(quest_body).length == 0) {
          alert("No question provided, idiot!");
        }
        else{
          $.get( "http://134.209.204.108/tagmaker?target="+quest_body, function( data ) {
            // alert(data);
            if($("#is_programming").val()=="Yes"){ data+=", programming" }
            $("#tags").val(data);
          });
        }
      });
      
      function handle_add_space_btn(){
        var cursorPos = $('#question').prop('selectionStart');
        var v = $('#question').val();
        var textBefore = v.substring(0,  cursorPos);
        var textAfter  = v.substring(cursorPos, v.length);
        
        $('#question').val(textBefore + "______"+ textAfter);
        
      }
      function handle_not_prog_type(){
        
          type = $("#Question-type").val();
          if($("#is_programming").val()=="no"){
            if(type=="choose"){
              
              $(".Question-type-checkboxes").show();
              $("#add_space_btn").hide();
            }else if(type=="complete"){
              $(".Question-type-checkboxes").hide();
            $("#add_space_btn").show();
            
          }}else{
            $("#add_space_btn").hide();
            
          }
        }
        
        function handle_question_type(){
          type=$("#is_programming").val()
          if(type=="no"){
            handle_not_prog_type();
            $("#program_language_div").hide();
            $("#type_div").show();
            $("#essay_answer").hide();
            $("#answers1").show();
            $("#addanswer").show();
            
            $(".answer").each(function(index, value) {
              $(this).val("")
              
              value.readOnly = false;
              
              
            })
            
          }else {
            $("#type_div").hide();
            $("#program_language_div").show();
            $("#answers1").hide();
            $("#essay_answer").show();
            $("#add_space_btn").hide();
            
          }
        }
        // =====================================================
        
        function handle_publish_button(){
          if(exam_obj.is_published == 0){
            button=`
            <a href="#" onclick="go_publish()" class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
            <span>
                <i class="la la-send"></i>
                <span>Publish Exam</span>
            </span>
          </a>
            `
            $("#publish").html(button);
          }
          else{
            $("#publish").html("");
          }
        }


        function go_publish(){
          // can publish and unpublish
          $.get("/Exam_publish_unpublish/"+raw_exam_id, function(response){
            exam_obj.is_published = $.parseJSON(response).is_published;
            handle_publish_button();
          })

        }

        function fill_existing_questions(){
          $.get("/"+tablename+"?cat_id="+cat_id+"&cat_type="+cat_type, function(data){
              qs = data.data;
              options = '';
              $.each(qs , function (key, q){
                if(q.exam_id != raw_exam_id){
                  // console.log(q)
                  options = options + `
                  <option value="`+q._id+`">`+q.name+`</option>
                  `
                }
              });
              $("#existing_questions").html(options);
          })
        }
//================================================
