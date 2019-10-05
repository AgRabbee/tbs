@extends('layouts.admin')

@section('page_header')
<h1 class="m-0 text-dark">All Users</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">All users</li>
@endsection

@section('content')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Admin</th>
                <th>Email</th>
                <th>Company Name</th>
                <th>Company Description</th>
                <th>Company Address</th>
                <th>Company Registration No.</th>
                <th>TIN No.</th>
                <th>Company Image</th>
                <th>Trade</th>
                <th>VAT</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($admin_details as $value)
                    <tr>
                        <td>{{ $value->first_name . ' ' . $value->last_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->company_name }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->reg_no }}</td>
                        <td>{{ $value->tin_no }}</td>
                        <td>
                            <a href="{{asset('storage/company_image/'.$value->company_image)}}" target="_blank">{{ $value->company_image }}</a>
                        </td>
                        <td>
                            <a href="{{asset('storage/company_image/'.$value->trade)}}" target="_blank">{{ $value->trade }}</a>
                        </td>
                        <td>
                            <a href="{{asset('storage/company_image/'.$value->vat)}}" target="_blank">{{ $value->vat }}</a>
                        </td>
                        <td>
                            @if($value->status == '0')
                             <div class="d-flex justify-content-between">
                                  <form action="{{ url('/dashboard/new/admins/active') }}" method="POST">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="user_id" value="{{ $value->id }}">
                                      <input type="hidden" name="company_id" value="{{ $value->company_id }}">
                                        <button type="submit" class="btn btn-success btn-sm swalDefaultSuccess">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                  </form>
                                  <form action="{{ url('/dashboard/new/admins/deny') }}" method="POST">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="user_id" value="{{ $value->id }}">
                                        <input type="hidden" name="company_id" value="{{ $value->company_id }}">
                                        <button type="submit" class="btn btn-danger btn-sm swalDefaultError">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                  </form>
                              </div>
                              @elseif( $value->status == '1')
                                  <div class="d-flex justify-content-between">
                                      <form action="{{ url('/dashboard/new/admins/pause') }}" method="POST" class="mr-1">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="company_id" value="{{ $value->company_id }}">
                                          <button type="submit" class="btn btn-warning btn-sm swalDefaultWarning">
                                              <i class="far fa-pause-circle"></i>
                                          </button>


                                      </form>
                                      <form action="{{ url('/dashboard/new/admins/deny') }}" method="POST">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="user_id" value="{{ $value->id }}">
                                            <input type="hidden" name="company_id" value="{{ $value->company_id }}">
                                            <button type="submit" class="btn btn-danger btn-sm swalDefaultError">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                      </form>
                                  </div>


                              @elseif( $value->status == '2')
                                  <div class="d-flex justify-content-between">
                                      <form action="{{ url('/dashboard/new/admins/active') }}" method="POST"  class="mr-1">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="user_id" value="{{ $value->id }}">
                                          <input type="hidden" name="company_id" value="{{ $value->company_id }}">
                                            <button type="submit" class="btn btn-success btn-sm swalDefaultSuccess">
                                                <i class="fas fa-check-circle"></i>
                                            </button>
                                      </form>

                                      <button type="button" disabled class="btn btn-danger btn-sm">
                                          <i class="fas fa-times-circle"></i>
                                      </button>
                                  </div>
                          @endif
                        </td>
                    </tr>
                @endforeach
            <tfoot>
            <tr>
                <th>Admin</th>
                <th>Email</th>
                <th>Company Name</th>
                <th>Company Description</th>
                <th>Company Address</th>
                <th>Company Registration No.</th>
                <th>TIN No.</th>
                <th>Company Image</th>
                <th>Trade</th>
                <th>VAT</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
@endsection



@section('admin_css')

<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

@endsection

@section('admin_scripts')

<!-- DataTables -->
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>


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
    });

  });
</script>

@endsection
