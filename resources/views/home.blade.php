@push('css')
<style>
  .blink {
    animation: blink 1s steps(1, end) infinite;
  }

  @keyframes blink {
    0% {
      opacity: 1;
    }

    50% {
      opacity: 0;
    }

    100% {
      opacity: 1;
    }
  }
</style>
@endpush
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Quotes List') }}</div>
        <div class="card-body">
          <div class="container">
            <span id="loading" class="blink">Loading...</span>
            <ul class="list-group" id="list">
            </ul>
            <button class="btn btn-primary m-2" id="refresh">Refresh</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/home.js')}}"></script>
@endpush