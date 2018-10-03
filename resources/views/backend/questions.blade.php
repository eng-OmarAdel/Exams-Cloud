@can('admin')
@extends('layouts.backend')
@section('title')
Questions
@endsection('title')
@section('content')
<div class="row">
    <div class="col-lg-6">  
        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Questions
                        </h3>
                    </div>          
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">                     
                        <li class="m-portlet__nav-item">
                            <a href="#"  m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-angle-down"></i></a> 
                        </li>
                        <li class="m-portlet__nav-item">
                            <a href="#"  m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-expand"></i></a> 
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                              <div class="col-xl-12 order-2 order-xl-1">
                                            <div class="form-group m-form__group row align-items-center">
                                                
  
                                                <div class="col-md-12">
              
                                            <div class="m-input m-input-icon--left">
                                                        <select class="form-control m-input m-input--air" id="difficulty">
                                                            <option value="">Difficulty</option>
                                                            <option value="easy">Easy</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="hard">Hard</option>
                                                        </select>
                                                  
                                                    </div>  
                                        

                                                                                                  </div>


                                                
                                                    <div class="col-md-12">
                    <div class="input-group" >
                        <input type="text" name="title2" id="title2" class="form-control m-input" placeholder="question title">
         
                    </div>
    

  

                         </div>  
                         <div class="col-md-12">
                                                  
                    <div class="form-group m-form__group">
                                    <select class="form-control m-input m-input--air" id="mark1" name="city_id">
                                        <option value="">choose a category</option>
                                @foreach($categories as $category)
                                        <option value="{{$category->_id}}">{{$category->title}}</option>

                                    @endforeach

                                    </select>

                    </div>
                    <div class="form-group m-form__group">
                        <select required class="form-control m-input m-input--air" id="series1" name="location_id">
                            <option value="">choose a sub-category</option>
                                    @foreach ($subcategories as $subcategory)

                                    <option value="{{$subcategory->_id}}" data-chained="{{$subcategory->category_id}}">{{$subcategory->title}}</option>
                                                        
                                    @endforeach   
                        </select>

                    </div>                      


                                              </div>
                                                



                                            </div>
                                        </div>
               <div class="m_datatable" id="m_datatable"></div>

            </div>
        </div>  
        <!--end::Portlet-->



       
    </div>
    <div class="col-lg-6">  

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_form">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon">
                            <i class="flaticon-placeholder-2"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Add/Edit <b>Questions</b>
                        </h3>
                    </div>          
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="#"  m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-expand"></i></a> 
                        </li>
                        <li class="m-portlet__nav-item">
                            <a href=""  m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-angle-down"></i></a>  
                        </li>
                    </ul>
                </div>
            </div>
            <!--begin::Form-->
            <form action="Question" id="form_add" method="post" class="m-form m-form--fit m-form--label-align-right">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="post" fillable="never" />
             
                <div class="m-portlet__body">

                    <div id="test">





             

                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Question</label>
                            <textarea class="ignoreField form-control m-input" name="title"  id="title"  placeholder="Question"></textarea>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleInputPassword1">Category</label>
                                    <select class="form-control m-input m-input--air" id="mark" name="category_id">
                                        <option value="">Choose category</option>
                                @foreach($categories as $Category)
                                        <option value="{{$Category->_id}}">{{$Category->title}}</option>

                                @endforeach

                                    </select>
                        </div>

                        <div class="form-group m-form__group">
                            <label for="exampleInputPassword1">Sub-category</label>
                        <select required class="form-control m-input m-input--air" id="series" name="sub_category_id">
                            <option value="">Choose sub category</option>
                                    @foreach ($subcategories as $subcategory)

                                    <option value="{{$subcategory->_id}}" data-chained="{{$subcategory->category_id}}">{{$subcategory->title}}</option>
                                                        
                                    @endforeach   
                        </select>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleInputPassword1">Difficulty</label>
                                    <select class="form-control m-input m-input--air" id="difficulty" name="difficulty">
                                        <option value="">Choose difficulty</option>
                                        <option value="easy">Easy</option>
                                        <option value="medium">Medium</option>
                                        <option value="hard">Hard</option>


                                    </select>
                        </div>
                        <div id="answers1"> 

                            <div class="form-group m-form__group">
                            <label for="exampleInputPassword1"> answers </label>
                                <a href="#" id="addanswer" class="btn btn-success "> add answer </a>

                             </div>               

                            <div id="answer" style="margin-top:10px;">
                                    <div class="form-group m-form__group row"><div class="col-lg-12 col-md-12 col-sm-12"> <div class="input-group pull-right " > 


                                    <div class="col-md-8">

                                    <input class="form-control m-input m-input--air answer" type="text" required placeholder="answer"  name="answer[0]">
                                    </div>
                                    <div class="col-md-2">
                                    <label for="true_answer">true</label>
                                    <input class="form-control m-input m-input--air" value="1"  type="checkbox" id="true_answer" name="true_answer[0]">
                                    </div>
                
                                       </div> </div></div>   
                                        <div class="form-group m-form__group row"><div class="col-lg-12 col-md-12 col-sm-12"> <div class="input-group pull-right " > 


                                        <div class="col-md-8">

                                        <input class="form-control m-input m-input--air answer" required type="text"  placeholder="answer"  name="answer[1]">
                                        </div>
                                        <div class="col-md-2">
                                        <label for="true_answer">true</label>
                                        <input class="form-control m-input m-input--air" value="1" type="checkbox" id="true_answer" name="true_answer[1]">
                                        </div>

                                           </div> </div></div>                                                                </div>
                        </div>

                    </div>

               
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">save</button>
                        <button type="reset"  id="reset" m-portlet-tool="toggle" onClick="actions('#form_add')"   class="btn btn-secondary">cancel</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->    
        </div>  
        <!--end::Portlet-->

    </div>
</div>
<!------------------------------------------------------------------------------>



<form method="post" id="delete_form">
    {{csrf_field()}}
    <input type="hidden" name="returl" value="{{app('request')->input('table')}}" />
    <input type="hidden" name="_method" value="delete" />
</form>
@endsection

@section('script')

<script>
//Table Name Variable
tablename="Question";
//Delete
function delete_item(id){

        $("#delete_form").ajaxSubmit({url: tablename+'/' + id, type: 'post',
                                      success:function(){

                                     toastr.success("Success");
                                                    reload.reload();




                                      }
                                  });
        $("#delete_form").submit();
}
function delete_item2(id){

        $("#delete_form").ajaxSubmit({url: 'Questiondelete/' + id, type: 'post',
                                      success:function(){

                                     toastr.success("Success");
                                                    reload.reload();




                                      }
                                  });
        $("#delete_form").submit();
}
//Add/Edit
function fill_portlet(id) {
        mApp.block("#form_add");
        mApp.scrollTo("#form_add");
        actions('#form_add');
         $("#reset").trigger("click");

        $("#form_add").attr('action', tablename+'/' + id);
        $("[name='_method']", $("#form_add")).val('PUT');

        $.ajax(tablename+'/' + id, {
            complete: function(jqXHR, textStatus) {
                var Questione = $.parseJSON(jqXHR.responseText);
                mApp.unblock("#form_add")
    console.log(Questione[0]);
                ZiForm.populate($("#test"), Questione[0]);
                    $("#mark").trigger("change");
                ZiForm.populate($("#test"), Questione[0]);

            answers=Questione[0].answers;
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
               if(answers[key].true_answer==1){
               $(this).parent().parent().find(":checkbox").prop("checked",true)
           }
           else{

               $(this).parent().parent().find(":checkbox").prop("checked",false)
}
              });



            }
        });
}
var Form_submit = function() {
    var o = function() {
        var container = "#m_portlet_form";
        var e = $("#form_add");
        ZiForm.validate(
            e, {

         
                title: {
                    required: true,
                    maxlength: 255,
                },

            }, {
               
                beforeSubmit: function(arr, $form, options) {
                    toastr.warning('Please wait!');
                },
                success: function(e) {

                    toastr.success("Success");
                    reload.reload()
                },
                error: function(e) {
                    error=$.parseJSON(e.responseText);
                    var errors="";
                        $.each(error, function (index, value) {

                            errors+=value+"<br>"
                            });

                    toastr.error(errors, "Invalid data!")

                } 
            }
        );
    };
    return {
        init: function() {
            o();
        }
    };
}();
var reload;
var MyTable= {
    init:function(geturl,datatableselector) {
            var t=$(datatableselector).mDatatable( {
                data: {
                type: 'remote',
                source: {
                    read: {
                        url: geturl,
                        params: {

                        _token: '{{ csrf_token() }}', 
                                              }
                    }
                },
                 saveState: {
            cookie: false,
            webstorage: false
        },
                pageSize: 10, // display 20 records per page
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true
            }
                , layout: {
                    theme: "default", class: "", scroll: !1, footer: !1
                }
                , sortable:!0, pagination:!0, search: {
                    input: $("#generalSearch")
                }
                ,       rows: {
                // auto hide columns, if rows overflow
                autoHide: true,
              },columns:[  {
                    field: "title", title: "title"
                },   {
                field: "status",
                title: "status",
                // callback function support for column rendering
                template: function (row) {
                    var status = {
                        0: {'title': 'suspended', 'class': 'm-badge--danger'},
                        1: {'title': 'approved', 'class': 'm-badge--success'},

                    };
                    return '<span class="m-badge ' + status[row.status].class + ' m-badge--wide">' + status[row.status].title + '</span>';
                }
            }, {
                field:"Actions", width:110, title:"actions", sortable:!1, overflow:"visible", 
                template:function(row) {
                    if(row.status ==1){

                        status='<a class="dropdown-item" onclick="delete_item(\'' + row._id + '\')" href="javascript:;"><i class="la la-ban"></i> suspend</a>'

                    }else{ status='<a class="dropdown-item" onclick="delete_item(\'' + row._id + '\')" href="javascript:;"><i class="la la-check-circle"></i> approve</a>'}
                   
                    delete1 ='<a class="dropdown-item" onclick="delete_item2(\'' + row._id + '\')" href="javascript:;"><i class="la la-check-circle"></i> delete</a>'
                    return'\t\t\t\t\t\t<a href="javascript:;" class="portlet-opener m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" onclick="fill_portlet(\'' + row._id + '\')" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<div class="dropdown">\t\t\t\t\t\t<a href="javascript:;" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">\t\t\t\t\t\t<i class="la la-ellipsis-h"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-132px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">\t\t\t'+status+'\t\t\t'+delete1+'</div>\t\t\t\t\t\t</div>'
                    
                                   }
                }
                ]
            }
            ),
            e=t.getDataSourceQuery();

             $('#delete_form').on('submit', function (e) {



                    return false;

            });

            $('#mark').on('change', function (e) {
            search=$('#mark').val();

            t.setDataSourceParam('category_id', search)
             t.search(search) ;

            }); 
            $('#series').on('change', function (e) {
            search=$('#series').val();

            t.setDataSourceParam('sub_category_id', search)
             t.search(search) ;


      

            })  ;  



        $('#title2').on('keyup change', function (e) {
            search=$('#title2').val();

            t.setDataSourceParam('title', search)
             t.search(search) ; })


        $('#difficulty').on('change', function (e) {
            search=$('#difficulty').val();

            t.setDataSourceParam('difficulty', search)
            t.search(search) ; })

             reload=t;
    }
};
//////////////////////////////////////////////////////////////////////
function hidediv(div){

    $(div).hide()

}
function showdiv(div){

    $(div).show()
    mApp.scrollTo(div)

}
function actions(id){
        $(id).attr('action', tablename);
        $("[name='_method']", $("#form_add")).val('POST');
        $("#mark").val("");
        $("#mark").trigger("change");


}
///////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////
$(document).on('click', "#addanswer" , function(e) {
 //add a new day


  e.preventDefault();


 $("#answer").append(`
<div class="subdays subdays2 form-group m-form__group row"><div class="col-lg-12 col-md-12 col-sm-12"> <div class="input-group pull-right " > 


<div class="col-md-8">

<input class="form-control m-input m-input--air answer" type="text" required placeholder="answer"  name="answer[`+$(".answer").length+`]">
</div>
<div class="col-md-2">
<label for="true_answer">true</label>
<input class="form-control m-input m-input--air " value="1" type="checkbox"  id="true_answer" name="true_answer[`+$(".answer").length+`]">
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

$(document).on("change",":checkbox",function() {
    $(":checkbox").prop('checked', false);
    $(this).prop('checked', true);
});

jQuery(document).ready(function() {
    MyTable.init("Questionfilter",".m_datatable");
    $("#series1").chained("#mark1");

    Form_submit.init();

    });

</script>
@endsection

@endcan