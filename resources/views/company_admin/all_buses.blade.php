@extends('layouts.app')

@section('page_header')
<h1 class="m-0 text-dark">All Buses</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">All buses</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All buses of <strong>{{ Auth::user()->companies[0]->company_name }}</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Bus ID</th>
              <th>Bus Type</th>
              <th>registration no</th>
              <th>Total Seats</th>
              <th>Trip ID</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($bus_details as $value)
                  <tr>
                  <td>{{ $value->transport_id }}</td>
                      <td>
                          @if ($value->ac_type == 1)
                              AC
                          @else
                              NON-AC
                          @endif
                      </td>
                      <td>{{ $value->registration_no }}</td>
                      <td>{{ $value->total_seats }}</td>
                      <td>
                          <a href="#" data-toggle="modal" data-target="#modal-edit{{ $value->id }}">{{ $value->trip_id }}</a>


<!--edit modal-->
<div class="modal fade" id="modal-edit{{ $value->id }}" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Trip Details</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <table class="table table-bordered table-striped">
                      <tr>
                          <td>Date:</td>
                          <td>{{ $value->date }}</td>
                      </tr>
                      <tr>
                          <td>Time:</td>
                          <td>{{ $value->start_time }}</td>
                      </tr>
                      <tr>
                          <td>Start Point:</td>
                          <td>{{ $value->start_name }}</td>
                      </tr>
                      <tr>
                          <td>End Point:</td>
                          <td>{{ $value->end_name }}</td>
                      </tr>
                      <tr>
                          <td>Fare:</td>
                          <td>{{ $value->fare }}</td>
                      </tr>
                  </table>
              </div>
              <div class="modal-footer ">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
              </div>
          </div>
      <!-- /.modal-content -->
  </div>
<!-- /.modal-dialog -->
</div>
<!--modal-->











                      </td>
                  </tr>
              @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>Bus ID</th>
              <th>Bus Type</th>
              <th>registration no</th>
              <th>Total Seats</th>
              <th>Trip ID</th>
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
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
    });

  });
</script>
@endsection
