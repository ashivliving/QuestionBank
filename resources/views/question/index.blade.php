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
       <div id="allquestion">
      @foreach($quest as $que)
      <div class="article">
         
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
      </div>
      <div id="article">

      </div>
      @endif
    </div>
  </div>

  <script>
    var class_name = "";
      $('#class').on('change',function(e){
        $('#article').empty();
        class_name = e.target.value;
        $.get('/ajax-subcat?class_name='+class_name,function(data){
           $('#subject').empty();
           $('#article').empty();
           $('#article').hide();
            $.each(data,function(index,subjectObj){
              $('#subject').append('<option value="'+subjectObj.subject+'">'+subjectObj.subject+'</option>');
            });
        });

        $.get('/ajax-subcat1?class_name='+class_name,function(data){
          $('#allquestion').hide();
              $('#article').show();
               $.each(data,function(index,subjectObj){
                var question = subjectObj.question;
                var id = subjectObj.id;
               var head = '<div class="article"><h4><a href="/question/'+id+'">'+question+'</a></h4><div class="action-btns"><a href="/question/'+id+'/edit"><div class="edit-btn btn btn-primary btn-sm">Edit</div></a>&nbsp;<a href="/question/'+id+'?del=1"><div class="edit-btn btn btn-danger btn-sm">Delete</div></a></div></div>';
                $('#article').append(head);
              });
            });
      });

      $('#subject').on('change',function(e){
        $('#article').empty();
        var subject_name = e.target.value;
        $.get('/ajax-subcat2?class_name='+class_name+'&subject_name='+subject_name,function(data){
          $.each(data,function(index,subjectObj){
                var question = subjectObj.question;
                var id = subjectObj.id;
               var head = '<div class="article"><h4><a href="/question/'+id+'">'+question+'</a></h4><div class="action-btns"><a href="/question/'+id+'/edit"><div class="edit-btn btn btn-primary btn-sm">Edit</div></a>&nbsp;<a href="/question/'+id+'?del=1"><div class="edit-btn btn btn-danger btn-sm">Delete</div></a></div></div>'; 
               $('#article').append(head);
              });
        });
      });

  </script>


@endsection