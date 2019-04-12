@extends("layouts.index")
@section("title")
@php $tablename="AuthProfile" @endphp
{{$authority->name}}
@endsection
@section("content")	
<h2>Add category</h2>
<select class="form-control" name="category" id="category">

</select>

<table class="dataTable no-footer dtr-inline" role="grid" style="width: 1224px;">
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 389px;" aria-label="name: activate to sort column descending" aria-sort="ascending">name</th>
            <th class="sorting_asc" tabindex="0" aria-controls="m_table_1" rowspan="1" colspan="1" style="width: 389px;" aria-label="name: activate to sort column descending" aria-sort="ascending">creation date</th>
        </tr>
        <tbody>
            @foreach ($categories as $category)
            @if ($category->level == -1)
                    @continue
            @endif
            <tr role="row" id="table">
                    <td>
                        @for ($i = 0; $i < $category->level; $i++)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @endfor
                        {{$category->name}}
                    </td>
                    <td>
                        {{$category->created_at}}
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </thead>
</table>

@endsection
@section("script")
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/main.js")}}"></script>
<script type="text/javascript" tablename="{{$tablename}}" src="{{url("js/common/".$tablename.".js")}}"></script>
@endsection