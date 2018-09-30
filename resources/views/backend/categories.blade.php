@can('admin')
@extends('layouts.backend')
@section('title')
Categories
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
                            Categories
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
                            Add/Edit <b>Categories</b>
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
            <form action="Category" id="form_add" method="post" class="m-form m-form--fit m-form--label-align-right">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="post" fillable="never" />
             
                <div class="m-portlet__body">

                    <div id="test">





             

                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="ignoreField form-control m-input" name="title"  id="title"  placeholder="title">
                        </div>


                  

                    </div>

               
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">save</button>
                        <button type="reset"  m-portlet-tool="toggle" onClick="actions('#form_add')"   class="btn btn-secondary">cancel</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->    
        </div>  
        <!--end::Portlet-->

    </div>
</div>
<!------------------------------------------------------------------------------>
<div id="sub_tables" style="display:none">

    <div class="row">
        <div class="col-lg-6">  
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--accent m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_1">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                <div id="sub_name"></div>
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

                    <div id="subtable_body">
       <div  id="sub_datatable"></div>
            </div>
                </div>
            </div>  
            <!--end::Portlet-->



           
        </div>
        <div class="col-lg-6">  

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--head-sm" m-portlet="true" id="m_portlet_subform">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-placeholder-2"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Add/edit <b>Sub category</b>
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
                <form action="SubCategories" id="form_subadd" method="post" class="m-form m-form--fit m-form--label-align-right">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="post" fillable="never" />
                     <div class="m-portlet__body">

                <div id="test2">
                    

                      <div class="form-group m-form__group">
                            <label for="exampleInputPassword1"> name</label>
                            <input type="text"  id="title" class="form-control m-input" name="title" placeholder="title">
                        </div>

                        


                </div>

               
                                         
                        <input type="hidden" id="category_id" name="category_id" >
                        
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <button type="submit" class="btn btn-primary">save</button>
                            <button type="reset" id="subreset"  onClick="subactions('#form_subadd')" m-portlet-tool="toggle"  class="btn btn-secondary">cancel</button>
                        </div>
                    </div>
                </form>
                <!--end::Form-->    
            </div>  
            <!--end::Portlet-->

        </div>
    </div>
</div>


<form method="post" id="delete_form">
    {{csrf_field()}}
    <input type="hidden" name="returl" value="{{app('request')->input('table')}}" />
    <input type="hidden" name="_method" value="delete" />
</form>
<form method="post" id="delete_subform">
    {{csrf_field()}}
    <input type="hidden" name="returl" value="{{app('request')->input('table')}}" />
    <input type="hidden" name="_method" value="delete" />
</form>
@endsection

@section('script')

<script>
//Table Name Variable
tablename="Category";
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

        $("#delete_form").ajaxSubmit({url:'Categorydelete/' + id, type: 'post',
                                      success:function(){

                                     toastr.success("Success");
                                                    reload.reload();




                                      },
                                      error:function(e){
                                            error=$.parseJSON(e.responseText);

                                     toastr.error(error,"failed!");
                                                    reload.reload();




                                      },
                                  });
        $("#delete_form").submit();
}

//Add/Edit
function fill_portlet(id) {
        mApp.block("#form_add")

        mApp.scrollTo("#form_add")

        ZiForm.clear($("#form_add"));
        $("#form_add").attr('action', tablename+'/' + id);

        $("[name='_method']", $("#form_add")).val('PUT');
        $.ajax(tablename+'/' + id, {
            complete: function(jqXHR, textStatus) {
                var Categorye = $.parseJSON(jqXHR.responseText);
                mApp.unblock("#form_add")

                ZiForm.populate($("#test"), Categorye[0]);
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
                    type: "remote", source: { read: {
                url: geturl,
                method: 'GET' },
                map: function(raw) {
                    // sample data mapping
                    var dataSet = raw;
                    if (typeof raw.data !== 'undefined') {
                         dataSet = raw.data;
                    }
                    return dataSet;
                }, }, pageSize: 10
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

                    }else{status='<a class="dropdown-item" onclick="delete_item(\'' + row._id + '\')" href="javascript:;"><i class="la la-check-circle"></i> approve</a>'}
                    delete1 ='<a class="dropdown-item" onclick="delete_item2(\'' + row._id + '\')" href="javascript:;"><i class="la la-check-circle"></i> delete</a>'

                    return'\t\t\t\t\t\t<a href="javascript:;" class="portlet-opener m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" onclick="fill_portlet(\'' + row._id + '\')" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<div class="dropdown">\t\t\t\t\t\t<a href="javascript:;" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">\t\t\t\t\t\t<i class="la la-ellipsis-h"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-132px, 33px, 0px); top: 0px; left: 0px; will-change: transform;"><a class="dropdown-item" onclick="sub_table(`SubCategories2/' + row._id + '`,`#sub_datatable`,`' + row.title + '`,\'' + row._id + '\')" href="javascript:;"><i class="la la-briefcase"></i> Sub-Categories</a>\t\t\t\t\t\t'+status+'\t\t\t\t\t\t'+delete1+'</div>\t\t\t\t\t\t</div>'
                    
                                   }
                }
                ]
            }
            ),
            e=t.getDataSourceQuery();

             $('#delete_form').on('submit', function (e) {



                    return false;

            });
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
                $('#amenities').val(null).trigger('change');
    
        $(id).attr('action', tablename);
        $("[name='_method']", $("#form_add")).val('POST');
        $("#image").prop('required', true);
        $("#cover").prop('required', true);
        $('#password').prop("required",true)
        $('#confirmpassword').prop("required",true)

}
///////////////////////////////////////////////////////////////////////////////////
////////////////////////////////sub table 1////////////////////////////////////////
//Sub Table draw
subtablename='SubCategories';
var reload2;
function sub_table(geturl,datatableselector,title,id){
    $("#subtable_body").html('<div  id="sub_datatable"></div>');
    $('#category_id').val(id);
    showdiv("#sub_tables");
    $("#sub_name").html(title);
    $("#subreset").trigger("click");
    var t=$(datatableselector).mDatatable( {
                data: {
                    type: "remote", source: { read: {
                url: geturl,
                method: 'GET' },
                map: function(raw) {
                    // sample data mapping
                    var dataSet = raw;
                    if (typeof raw.data !== 'undefined') {
                         dataSet = raw.data;
                    }
                    return dataSet;
                }, }, pageSize: 10
                }
                , layout: {
                    theme: "default", class: "", scroll: !1, footer: !1
                }
                ,        rows: {
                // auto hide columns, if rows overflow
                autoHide: true,
              },sortable:!0, pagination:!0, search: {
                    input: $("#generalSearch")
                }     
                , columns:[ {
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
            },  {
                field:"Actions", width:110, title:"Actions", sortable:!1, overflow:"visible", 
                template:function(row) {
                                        if(row.status ==1){

                        status='<a class="dropdown-item" onclick="delete_subitem(\'' + row._id + '\')" href="javascript:;"><i class="la la-ban"></i> suspend</a>'

                    }else{status='<a class="dropdown-item" onclick="delete_subitem(\'' + row._id + '\')" href="javascript:;"><i class="la la-check-circle"></i> approve</a>'}
                        delete2 ='<a class="dropdown-item" onclick="delete_subitem2(\'' + row._id + '\')" href="javascript:;"><i class="la la-check-circle"></i> delete</a>'

                    return'\t\t\t\t\t\t<a href="javascript:;" class="portlet-opener m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" onclick="fill_subportlet(\'' + row._id + '\')" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<div class="dropdown">\t\t\t\t\t\t<a href="javascript:;" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="false">\t\t\t\t\t\t<i class="la la-ellipsis-h"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-132px, 33px, 0px); top: 0px; left: 0px; will-change: transform;">\t\t\t\t\t\t'+status+'\t\t\t\t\t\t'+delete2+'</div>\t\t\t\t\t\t</div>';

                                   }
                }
                ]
            }
            ),
            e=t.getDataSourceQuery();

         $('#delete_subform').on('submit', function (e) {


                    t.reload();

                    return false;

            });

         reload2=t;
}
//Delete
function delete_subitem(id){

        $("#delete_subform").ajaxSubmit({url: subtablename+'/' + id, type: 'post'           , success:function(){

                toastr.success("Success");

                    reload2.reload();

            }})

        $("#delete_subform").submit();
}

function delete_subitem2(id){

        $("#delete_subform").ajaxSubmit({url: 'SubCategoriesdelete/' + id, type: 'post'           , success:function(){

                toastr.success("Success");

                    reload2.reload();

            },
                                      error:function(e){
                                            error=$.parseJSON(e.responseText);

                                     toastr.error(error,"failed!");
                                                    reload.reload();




                                      }})

        $("#delete_subform").submit();
}

//Add/Edit
function fill_subportlet(id) {

 
        mApp.block("#form_subadd")
        mApp.scrollTo("#form_subadd")
         $("#image2").prop('required', false);
        subactions("#form_subadd")
        $("#form_subadd").attr('action', subtablename+'/' + id);
        $("[name='_method']", $("#form_subadd")).val('PUT');

        $.ajax(subtablename+'/' + id, {
            complete: function(jqXHR, textStatus) {
                var Categorye = $.parseJSON(jqXHR.responseText);
                mApp.unblock("#form_subadd")
                ZiForm.populate($("#test2"), Categorye);


            }
        });
}
var subForm_submit = function() {
    var o = function() {
        var container = "#m_portlet_subform";
        var e = $("#form_subadd");
        ZiForm.validate(
            e, {

             
                title:{
                    required: true,
                } ,




            }, {                
                beforeSubmit: function(arr, $form, options) {
                    toastr.warning('Please wait!');
                },
                success: function(e) {

                    toastr.success("Success");
                    reload2.reload()
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



////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
function subactions(id){

        $(id).attr('action', subtablename);
        $("[name='_method']", $("#form_subadd")).val('POST');


}


//////////////////////////////////////////////////////////////////////


jQuery(document).ready(function() {
    MyTable.init(tablename,".m_datatable");
    Form_submit.init();
    subForm_submit.init();

    });

</script>
@endsection

@endcan