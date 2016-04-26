@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3>Edit Article</h3>
      <hr/>
      {!! Form::model($question,array('route'=>array('question.update',$question->id),'method'=>'put')) !!}
        
        <div class="form-group">
          <!-- {!! Form::label('content','Write Article') !!} -->
         {!! Form::text('question',null,array('class'=>'form-control','placeholder'=>'Question')) !!}
        </div>
        <div class="form-group">
          <!-- {!! Form::label('slug') !!} -->
         {!! Form::textarea('answer',null,array('class'=>'form-control','placeholder'=>'Answer!','rows'=>'5')) !!}
        </div>
        <div class="form-group">
           {!! Form::token() !!}
          {!! Form::submit('Save',array('class'=>'form-control btn btn-success')) !!}
        </div>
      {!! Form::close() !!}

       <script>
        $('#class').on('change',function(e){
          //console.log(e);
          var class_id = e.target.value;
          $.get('/ajax-subcat?class_name='+class_id,function(data){
            $('#subject').empty();
            $.each(data,function(index,subjectObj){
              $('#subject').append('<option value="'+subjectObj.subject+'">'+subjectObj.subject+'</option>');
              //console.log(data);
            });
          });
        });
        </script>
@endsection
