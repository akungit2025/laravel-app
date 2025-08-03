@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
{{-- <div class="row">
  <div class="col-12">
    <div class="page-title-box d-flex align-items-center justify-content-between">
      <h4 class="mb-0 font-size-18">Dashboard</h4>
    </div>
  </div>
</div> --}}

<div class="row">
  <!-- Widget Box 1 -->
  <div class="col-md-6 col-xl-3">
    <div class="card widget-box-two bg-primary">
      <div class="card-body">
        <div class="wigdet-two-content text-white">
          <p class="m-0 text-uppercase font-weight-medium font-secondary text-overflow">Users</p>
          <h2 class="text-white"><span data-plugin="counterup">42</span> <i class="mdi mdi-account-multiple"></i></h2>
          <p class="text-white m-0"><b>5%</b> increase</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Widget Box 2 -->
  <div class="col-md-6 col-xl-3">
    <div class="card widget-box-two bg-success">
      <div class="card-body">
        <div class="wigdet-two-content text-white">
          <p class="m-0 text-uppercase font-weight-medium font-secondary text-overflow">Revenue</p>
          <h2 class="text-white"><span data-plugin="counterup">$12,500</span> <i class="mdi mdi-cash"></i></h2>
          <p class="text-white m-0"><b>8%</b> increase</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Widget Box 3 -->
  <div class="col-md-6 col-xl-3">
    <div class="card widget-box-two bg-info">
      <div class="card-body">
        <div class="wigdet-two-content text-white">
          <p class="m-0 text-uppercase font-weight-medium font-secondary text-overflow">Sales</p>
          <h2 class="text-white"><span data-plugin="counterup">1,200</span> <i class="mdi mdi-cart"></i></h2>
          <p class="text-white m-0"><b>12%</b> increase</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Widget Box 4 -->
  <div class="col-md-6 col-xl-3">
    <div class="card widget-box-two bg-warning">
      <div class="card-body">
        <div class="wigdet-two-content text-white">
          <p class="m-0 text-uppercase font-weight-medium font-secondary text-overflow">Visits</p>
          <h2 class="text-white"><span data-plugin="counterup">25,400</span> <i class="mdi mdi-eye"></i></h2>
          <p class="text-white m-0"><b>3%</b> decrease</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
