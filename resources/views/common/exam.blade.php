@extends("layouts.index")
<div class="container">
@section("title")
Exam 
@endsection
@section("content")
<form method="POST" action="Exam/result">
    <?php  $i=0;?>
    
@foreach ($questions as $question)


	<div class="form-group"> <!-- Radio group !-->
    <label class="control-label">{{$question['name']}}</label>
    <input type="hidden" name="questions{{++$i}}" value='{{$question['_id']}}'>
    <fieldset id="{{$question['_id']}}    ">
		<div class="row">
            <div class="radio col">
                <label>
                  <input type="radio" name="{{$question['_id']}}" value="{{$question['answers'][0]['answer']}}">
                 {{$question['answers'][0]['answer']}}
                </label>
              </div>
               <div class="radio col">
                <label>
                  <input type="radio"  name="{{$question['_id']}}" value="{{$question['answers'][1]['answer']}}">
                  {{$question['answers'][1]['answer']}}
                </label>
              </div>
              <div class="w-100"></div>
            <div class="radio col">
                <label>
                  <input type="radio" name="{{$question['_id']}}" value="{{$question['answers'][2]['answer']}}">
                  {{$question['answers'][2]['answer']}}
                </label>
              </div>
              <div class="radio col">
                <label>
                  <input type="radio"  name="{{$question['_id']}}" value="{{$question['answers'][3]['answer']}}">
                  {{$question['answers'][3]['answer']}}
                </label>
             </div>
        </div>
    </fieldset>
	</div>		
    @endforeach
    {{ csrf_field() }}
	<div class="form-group"> <!-- Submit button !-->
		<button class="btn btn-primary " name="submit" type="submit">Submit</button>
	</div>
	
</form>
</div>
@endsection

