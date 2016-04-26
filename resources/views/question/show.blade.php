@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="article">
        <h4>{{ $question->question }}</h4>
        <div class="body">
          {{ $question->answer }}
        </div>
      </div>
    </div>
  </div>
@endsection
