@extends('frontend.layouts.app')
@section('title') Create exam @endsection
@push('customCSS')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
@endpush
@section('content')
        <div class="container">
            <br>
            <h2 class="text-center">Choose the exam properties</h2><br>
            <form method="POST" action="/exam/generate">
                {{csrf_field()}}

                <select id="category" name="category_id" class="form-control">
                    <option value="" selected disabled>Choose the exam main category</option>
                    @foreach ($cats as $cat)
                        <option value="{{$cat->_id}}">{{$cat->title}}</option>
                    @endforeach
                </select>
                <br>

                <div id="subCategory" name="sub_category_id" style="display:none">
                    <select name="sub_category_id" id="subs" class="form-control" required>
                    <option selected disabled>Choose the exam sub category</option>

                    </select>
                    <br>
                </div>
               

                <select id="difficulty" name="difficulty" class="form-control">
                    <option selected disabled>Choose the exam difficulty</option>
                    <option>Easy</option>
                    <option>Medium</option>
                    <option>Hard</option>
                </select>

                <h2 class="text-center">
                    <input type="submit" value="Create exam" class="btn btn-md btn-primary">
                </h2>
            </form>
        </div>
@endsection

@push('customJS')
    <script>
    $(document).ready(function(){
        $('#category').val('')
        //----------------------------------AJAX code -------------------------//
        // (-2) because of current route has 2 segments over base url
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        var path_array =  window.location.pathname.split('/')
        var base_url=''
        for(var i =0; i<path_array.length-2;i++) base_url=base_url+path_array[i]+'/'

        $('#category').on('change',function(){
            $("#subCategory").css("display", "block");
            var options = ''
            var url =  base_url+'SubCategories2/'+this.value //don't put a fucking '/' in beginning
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                //data: {university: this.value},
                success:
                function (data) {
                    var subs = data
                    options += '<option selected disabled>Choose the exam sub category</option>'

                    $.each(subs, function (index, value) {
                        //console.log(value)
                    var option = '<option value="' + value._id + '">' + value.title +'</option>'
                    options += option
                    })
                    $("#subs").html(options)
                }
                ,
            })

        });
    });
    </script>
@endpush
        