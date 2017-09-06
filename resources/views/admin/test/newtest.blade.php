@extends('layouts.dashboard')
@section('page_heading','New Test')
@section('section')


<form action="./newtest/save" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="id_test" value="{{$test->id_test}}">
  <div class="container col-lg-12">
    <div id=box>
      <div id="sepaket">
        <div class="row">
          <!-- question -->
          <div class="col-md-6">
            <div class="form-group">
                <label>Question </label>
                <input id="question" name="question[]" class="form-control" type="text" autofocus>
            </div>
          </div>
          <div class="col-md-4">
            <!-- answer 1 -->
            <div class="form-group">
                <label>Answer 1 </label>
                <input id="answer" name="answer1[]" class="form-control" type="text">
            </div>
            <!-- answer 2 -->
            <div class="form-group">
                <label>Answer 2 </label>
                <input id="answer" name="answer2[]" class="form-control" type="text">
            </div>
            <!-- answer 3 -->
            <div class="form-group">
                <label>Answer 3 </label>
                <input id="answer" name="answer3[]" class="form-control" type="text">
            </div>
            <!-- answer 4 -->
            <div class="form-group">
                <label>Answer 4 </label>
                <input id="answer" name="answer4[]" class="form-control" type="text">
            </div>
          </div>
          <!-- <div class="col-lg-2"> -->
            <!-- <div class="form-group"> -->
              <button id="remove" style="margin-top:25px" type="button" name="remove" class="btn btn-danger">Remove</button>
            <!-- </div> -->
          <!-- </div> -->
        </div>
        <hr>
      </div>
    </div>
  </div>

<button id="submit" style="margin-left:15px; margin-bottom:20px" class="btn btn-success" value="submit" type="submit"> Submit </button>
</form>
<button id="add" style="margin-left:15px; margin-bottom:20px" class="btn btn-primary"> Add More Fields </button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
  var i = 1


  $('#add').click(function() {
        var inp = $('#box');
        i++;
        var template = ''+
            '<div id="sepaket">'+
                '<div class="row">'+
                  '<div class="col-md-6">'+
                    '<div class="form-group">'+
                        '<label>Question</label>'+
                        '<input id="question" name="question[]" class="form-control" type="text" autofocus>'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4">'+
                    '<div class="form-group">'+
                      '<label>Answer 1 </label>'+
                        '<input id="answer" name="answer1[]" class="form-control" type="text">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Answer 2 </label>'+
                        '<input id="answer" name="answer2[]" class="form-control" type="text">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Answer 3 </label>'+
                        '<input id="answer" name="answer3[]" class="form-control" type="text">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Answer 4 </label>'+
                        '<input id="answer" name="answer4[]" class="form-control" type="text">'+
                    '</div>'+
                  '</div>'+
                  '<button id="remove" style="margin-top:25px" type="button" name="remove" class="btn btn-danger">Remove</button>'+
                '</div>'+
                '<hr>'+
              '</div>';
        $(template).appendTo(inp);
    });

    $('body').on('click','#remove',function() {
        // $('#sepaket').remove();
        $(this).closest('#sepaket').remove();
        i--;
    });
});
</script>




@stop
