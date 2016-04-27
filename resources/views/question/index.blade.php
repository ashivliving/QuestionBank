@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <label for="">Class</label>
            <select class="form-control input-sm" name="class" id="class"> 
                <option value="">Selece Class</option>
                  @foreach($que as $q )
                <option value="{{$q->class}}">{{$q->class}}</option>
                  @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="">Subject</label>
          <select class="form-control input-sm" name="subject" id="subject">
            <option value="">Selece Subject</option>
          </select>
        </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	@if( count($quest)===0)
    		No Question available.
    	@else
      @foreach($quest as $que)
      <div class="article" id="article">
          <div><h4>{{ link_to_route('question.show',$que->question,array($que->id)) }}</h4></div>
              <div class="action-btns">
                {{ link_to_route('question.edit',"Edit",array($que->id),array('class'=>'edit-btn btn btn-primary btn-sm'))}}
                {{ link_to_route('question.destroy',"Destroy",[$que->id,'del=1'],array('class'=>'edit-btn btn btn-danger btn-sm'))}}
              </div>
          <div class="body">
            {{ $que->answer }}
          </div>
        </div>
      @endforeach
      @endif
    </div>
  </div>

  <script>
      
      $('#class').on('change',function(e){

        var class_name = e.target.value;
        $.get('/ajax-subcat?class_name='+class_name,function(data){
           $('#subject').empty();
            $.each(data,function(index,subjectObj){
              $('#subject').append('<option value="'+subjectObj.subject+'">'+subjectObj.subject+'</option>');
              //console.log(data);
            });
        });
      });

  </script>


@endsection