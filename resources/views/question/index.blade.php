@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    	@if( count($quest)===0)
    		No Question available.
    	@else
      @foreach($quest as $que)
      <div class="article">
          <h4>{{ link_to_route('question.show',$que->question,array($que->id)) }}</h4>
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
@endsection