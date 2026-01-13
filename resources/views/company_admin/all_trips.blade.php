@extends('layouts.app')

@section('page_header')
<h1 class="m-0 text-dark">All trips</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">All trips</li>
@endsection

@section('content')

<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">All Trips of <strong>{{ Auth::user()->companies[0]->company_name }}</strong></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
              <th>Bus ID</th>
              <th>Date</th>
              <th>Time</th>
              <th>Start Point</th>
              <th>End Point</th>
              <th>Fare</th>
              <th>Driver</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody>
              @foreach ($trips as $trip)
                  <tr>
                      <td>{{ $trip->bus_id }}</td>
                      <td>{{ $trip->date }}</td>
                      <td>{{ $trip->start_time }}</td>
                      <td>{{ $trip->start_name }}</td>
                      <td>{{ $trip->end_name }}</td>
                      <td>{{ $trip->fare }}</td>
                      <td>{{ $trip->first_name.' '.$trip->last_name}}</td>
                      <td><a href="#" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-edit{{ $trip->t_id }}"><i class="fas fa-edit"></i></a></td>
                  </tr>

                  <!--edit modal-->
                      <div class="modal fade" id="modal-edit{{ $trip->t_id }}" aria-hidden="true" style="display: none;">
                          <div class="modal-dialog">
                              <form class="" action="{{ url('/company/dashboard/edit/'.$trip->t_id.'/trip') }}" method="post">
                                  @csrf
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">Edit Transport</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="form-group">
                                              <label for="fare">Fare</label>
                                              <input type="text" class="form-control" name="update_fare" value="{{ $trip->fare }}">
                                          </div>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <input type="submit" class="btn btn-primary" name="" value="Update changes">
                                      </div>
                                  </div>
                              <!-- /.modal-content -->
                              </form>
                          </div>
                      <!-- /.modal-dialog -->
                      </div>
                  <!--modal-->


              @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>Bus ID</th>
              <th>Date</th>
              <th>Time</th>
              <th>Start Point</th>
              <th>End Point</th>
              <th>Fare</th>
              <th>Driver</th>
              <th>Action</th>
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
