@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      @foreach($quest as $que)
      <?php 
       echo $que->answer;
      ?>
        
      @endforeach
    </div>
  </div>
@endsection