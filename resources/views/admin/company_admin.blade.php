@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        EXPORTABLE TABLE
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
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
                                    <td>{{ $value->first_name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->companies[0]->company_name }}</td>
                                    <td>{{ $value->companies[0]->description }}</td>
                                    <td>{{ $value->companies[0]->address }}</td>
                                    <td>{{ $value->companies[0]->reg_no }}</td>
                                    <td>
                                        @if ( $value->companies[0]->pivot->status == 0)
                                              {{ 'Pending' }}
                                          @elseif ( $value->companies[0]->pivot->status == 1)
                                              {{ 'Active' }}
                                          @elseif ( $value->companies[0]->pivot->status == 2)
                                              {{ 'Denied' }}
                                      @endif
                                    </td>
                                </tr>

                                @endforeach

                                {{-- @for ($i=0; $i < count($admin_details->companies); $i++)
                                    <tr>
                                        <td>{{ $admin_details->first_name }}</td>
                                        <td>{{ $admin_details->email }}</td>
                                        <td>{{ $admin_details->companies[$i]->company_name }}</td>
                                        <td>{{ $admin_details->companies[$i]->description }}</td>
                                        <td>{{ $admin_details->companies[$i]->address }}</td>
                                        <td>{{ $admin_details->companies[$i]->reg_no }}</td>
                                        <td>
                                            @if ($admin_details->companies[$i]->pivot->status == 0)
                                                  {{ 'Pending' }}
                                              @elseif ($admin_details->companies[$i]->pivot->status == 1)
                                                  {{ 'Active' }}
                                              @elseif ($admin_details->companies[$i]->pivot->status == 2)
                                                  {{ 'Denied' }}
                                          @endif
                                        </td>
                                    </tr>
                                @endfor --}}
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
    <script src="{{ asset('AdminBSB/js/admin.js') }}"></script>
    <script src="{{ asset('AdminBSB/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection
