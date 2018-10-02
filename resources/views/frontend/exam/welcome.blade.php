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
            <form method="POST" action="/generateExam">
                {{csrf_field()}}
                <select id="category" name="category" class="form-control">
                    <option selected disabled>Choose the exam main category</option>
                    <option value="Maths">Maths</option>
                    <option>Physics</option>
                    <option>Languages</option>
                </select>
                <br>

                <div id="maths" style="display:none">
                    <select name="subcategory" class="form-control" required>
                        <option selected disabled>Choose the exam sub-category</option>
                        <option>Discrete maths</option>
                        <option>Linear algebra</option>
                        <option>Geometry</option>
                        <option>Calculus</option>
                    </select>
                    <br>
                </div>

                <div id="physics" style="display:none">
                    <select name="subcategory" class="form-control" required>
                        <option selected disabled>Choose the exam sub-category</option>
                        <option>Nuclear physics</option>
                        <option>Electronics</option>
                    </select>
                    <br>
                </div>

                <div id="languages" style="display:none">
                    <select name="subcategory" class="form-control" required>                        <option selected disabled>Choose the exam sub-category</option>
                        <option>English</option>
                        <option>Arabic</option>
                        <option>French</option>
                    </select>
                    <br>
                </div>

                <select id="difficulty" name="difficulty" class="form-control">
                    <option selected disabled>Choose the exam difficulty</option>
                    <option>Easy</option>
                    <option>Moderate</option>
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

        $('#category').on('change',function(){
            if( $(this).val()==="Maths"){
            $("#maths").css("display", "block");
            }
            else{
            $("#maths").css("display", "none");
            }

            if( $(this).val()==="Physics"){
            $("#physics").css("display", "block");
            }
            else{
            $("#physics").css("display", "none");
            }

            if( $(this).val()==="Languages"){
            $("#languages").css("display", "block");
            }
            else{
            $("#languages").css("display", "none");
            }
        });
    </script>
@endpush
        