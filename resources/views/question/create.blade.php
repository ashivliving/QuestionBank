@extends('layouts.master')


@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h3>Create Question</h3>
      <hr/>
      {!! Form::open(array('route'=>'question.store')) !!}
      
        <div class="form-group">
          <label for="">Class</label>
          <select class="form-control input-sm" name="class" id="class"> 
          <option value="">Selece Class</option>
            @foreach($quest as $que )
              <option value="{{$que->class}}">{{$que->class}}</option>
            @endforeach
          </select>
        </div>

         <div class="form-group">
          <label for="">Subject</label>
          <select class="form-control input-sm" name="subject" id="subject">
            <option value="">Selece Subject</option>
          </select>
        </div>

        <div id="addquestion" class="btn btn-sm btn-success">Add Question</div>
        <div id="form">
        <div class="form-group">
          <!-- {!! Form::label('title','Article Title') !!} -->
          {!! Form::text('question',null,array('class'=>'form-control','placeholder'=>'Question')) !!}
        </div>
        <div class="form-group">
          <!-- {!! Form::label('content','Write Article') !!} -->
          {!! Form::textarea('answer',null,array('class'=>'form-control','placeholder'=>'Answer!','rows'=>'5')) !!}
        </div>
        <div class="form-group">
          {!! Form::token() !!}
          {!! Form::submit('Save',array('class'=>'form-control btn btn-success')) !!}
        </div>
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

        $('#form').hide();
        $('#addquestion').hide();
        $('#subject').on('change',function(){
          $('#addquestion').show();
        });
        $('#addquestion').on('click',function(){
          $('#addquestion').hide();
          $('#form').show();
        })

      </script>

@endsection
