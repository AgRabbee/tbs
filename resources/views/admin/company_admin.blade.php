@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        All Company Admins
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Company Description</th>
                                    <th>Company Address</th>
                                    <th>Company Registration No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Company Description</th>
                                    <th>Company Address</th>
                                    <th>Company Registration No.</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($admin_details as $value)
                                <tr>
                                    <td>{{ $value->first_name. ' '. $value->last_name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->companies[0]->company_name }}</td>
                                    <td>{{ $value->companies[0]->description }}</td>
                                    <td>{{ $value->companies[0]->address }}</td>
                                    <td>{{ $value->companies[0]->reg_no }}</td>
                                    <td width="13%">
                                        @if($value->companies[0]->pivot->status == '0')
                                              <form action="{{ url('/dashboard/new/admins/active') }}" method="POST">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="user_id" value="{{ $value->id }}">
                                                  <input type="hidden" name="company_id" value="{{ $value->companies[0]->pivot->company_id }}">
                                                    <button type="submit" class="btn btn-success btn-sm waves-effect waves-float">
                                                        <i class="material-icons">done</i>
                                                    </button>
                                                    {{-- <button type="submit" name="button" class="btn btn-sm btn-success waves-effect waves-circle waves-float">
                                                        <i class="glyphicon glyphicon-check"></i>
                                                    </button> --}}

                                              </form>

                                          @elseif( $value->companies[0]->pivot->status == '1')

                                              <form action="{{ url('/dashboard/new/admins/pause') }}" method="POST" class="pull-left">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="company_id" value="{{ $value->companies[0]->pivot->company_id }}">
                                                  <button type="submit" class="btn btn-warning btn-sm waves-effect waves-float">
                                                      <i class="material-icons">pause</i>
                                                  </button>
                                              </form>
                                              <form action="{{ url('/dashboard/new/admins/deny') }}" method="POST" class="pull-right">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="user_id" value="{{ $value->id }}">
                                                    <input type="hidden" name="company_id" value="{{ $value->companies[0]->pivot->company_id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm waves-effect waves-float">
                                                        <i class="material-icons">not_interested</i>
                                                    </button>
                                              </form>

                                          @elseif( $value->companies[0]->pivot->status == '2')
                                              <form action="{{ url('/dashboard/new/admins/active') }}" method="POST"  class="pull-left">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="user_id" value="{{ $value->id }}">
                                                  <input type="hidden" name="company_id" value="{{ $value->companies[0]->pivot->company_id }}">
                                                    <button type="submit" class="btn btn-success btn-sm waves-effect waves-float">
                                                        <i class="material-icons">done</i>
                                                    </button>
                                                    {{-- <button type="submit" name="button" class="btn btn-sm btn-success waves-effect waves-circle waves-float">
                                                        <i class="glyphicon glyphicon-check"></i>
                                                    </button> --}}

                                              </form>
                                              <button type="button" disabled class="btn btn-danger btn-sm waves-effect waves-float pull-right">
                                                  <i class="material-icons">clear</i>
                                              </button>
                                      @endif
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>
@endsection

@section('admin_css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endsection


@section('admin_scripts')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
    <script src="{{ asset('AdminBSB/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection
