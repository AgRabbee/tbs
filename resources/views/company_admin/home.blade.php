@extends('layouts.app')

@section('page_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active"></li>
@endsection

@section('content')
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <p>Employees</p>

                    <h3 class="text-center">{{$userCount[0]->userCount}}</h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{ url('company/dashboard/all/drivers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                      <p>Company Transports</p>

                      <h3 class="text-center">{{$transportCount[0]->transportCount}}</h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="{{ url('company/all/buses') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                      <p>Company Trips</p>

                      <h3 class="text-center">{{$tripsCount[0]->tripsCount}}</h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{ url('company/dashboard/all/trips') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                      <p>Complete Reservations</p>

                      <h3 class="text-center">{{$reservationsCount[0]->reservationsCount}}</h3>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="{{ url('company/dashboard/all/sales') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
@endsection



@section('admin_css')
@endsection


@section('admin_scripts')
@endsection
