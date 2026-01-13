@extends('layouts.app')

@section('page_header')
<h1 class="m-0 text-dark">All Sales</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">All Sales</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All Sales of <strong>{{ Auth::user()->companies[0]->company_name }}</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>No</th>
              <th>Payment ID</th>
              <th>Stripe Token</th>
              <th>Customer</th>
              <th>Seats</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>Trip</th>
              <th>Bus ID</th>
              <th>Fare</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($salesDetails as $key => $value)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->pId }}</td>
                      <td>{{ $value->stripe_token }}</td>
                      <td>{{ $value->first_name . ' ' . $value->last_name }}</td>
                      <td>{{ $value->seat_number }}</td>
                      <td>{{ $value->date }}</td>
                      <td>{{ $value->start_time }}</td>
                      <td>{{ $value->startPoint . ' - '. $value->endPoint}}</td>
                      <td>{{ $value->bus_id }}</td>
                      <td>{{ $value->fare }}</td>
                  </tr>
              @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>No</th>
              <th>Payment ID</th>
              <th>Stripe Token</th>
              <th>Customer</th>
              <th>Seats</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>Trip</th>
              <th>Bus ID</th>
              <th>Fare</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

@endsection


@section('admin_css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/jquery.dataTables.min.css')}}">

@endsection

@section('admin_scripts')
    <!-- DataTables -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": []
    });

  });
</script>
@endsection
