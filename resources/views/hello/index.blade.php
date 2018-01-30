@extends('layouts.main')
@section('page_title', 'Hello Page')
@section('content')
    <h1>{!! $title !!}</h1>
    <p>
      {{ $subtitle }}
    </p>


<div class="container">
  <div class="row">
  <div class="col-md-4">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos hic quisquam, officiis recusandae facilis in maiores atque repudiandae beatae omnis sed, fugit quasi iste reiciendis? Sunt omnis eum dolore sequi!
    </div>
  <div class="col-md-4">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos hic quisquam, officiis recusandae facilis in maiores atque repudiandae beatae omnis sed, fugit quasi iste reiciendis? Sunt omnis eum dolore sequi!
  </div>
  <div class="col-md-4">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos hic quisquam, officiis recusandae facilis in maiores atque repudiandae beatae omnis sed, fugit quasi iste reiciendis? Sunt omnis eum dolore sequi!
  </div>
  </div>
</div>


@stop
