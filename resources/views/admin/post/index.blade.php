<x-app-layout>
    @push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
        .nav-link {
            color: #6c757d;
        }

        .nav-link:hover {
            color: #000;
        }
    </style>
    @endpush
    @section('title')Category List @endsection
    @section('user'){{ Auth::user()->name }}@endsection
    @section('category')active @endsection
    @section('category-list')active @endsection
    @section('category-open')menu-open @endsection

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a href="{{ route('category.create') }}" class="btn btn-sm btn-block btn-success"><i class="fas fa-plus-circle"></i> Create New</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if(Session::has('msg'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! session('msg') !!}
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-secondary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">
                                            <i class="fas fa-check-circle text-success"></i> Published <span class="badge bg-success">{{ $publish_count }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">
                                            <i class="fas fa-exclamation-circle"></i> Draft <span class="badge bg-secondary">{{ $draft_count }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                        <table id="publish" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th style="width: 150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($publish as $p)
                                                <tr>
                                                    <td>
                                                        <span class="font-weight-bold" style="font-size: 23px;">{{ $p->title }}</span>
                                                        @if($p->status == "1")
                                                        <span class="badge badge-success ml-1">Published</span>
                                                        @else
                                                        <span class="badge badge-secondary ml-1">Draft</span>
                                                        @endif
                                                        <br><small class="text-secondary pt-2">Date: {{ date_format($p->created_at,"d M Y H:i:s") }}</small>
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="{{ route('category.edit', [$p->id]) }}" class="btn btn-warning btn-sm text-white btn-block">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#deleteModal{{ $p->id }}"><i class="fas fa-trash"></i> Delete</button>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="deleteModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $p->id }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content rounded-0">
                                                                    <div class="modal-header bg-danger rounded-0">
                                                                        <h5 class="modal-title text-white m-0" id="deleteModalLabel{{ $p->id }}"><i class="fas fa-exclamation-circle"></i> Warning</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure want to delete "<span class="font-weight-bold">{{ $p->title }}</span>" ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('category.destroy', [$p->id])}}" method="POST" class="d-inline">
                                                                            @csrf
                                                                            <input type="hidden" value="DELETE" name="_method">
                                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i> Delete</button>
                                                                        </form>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>TITLE</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                        <table id="draft" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th style="width: 150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($draft as $d)
                                                <tr>
                                                    <td>
                                                        <span class="font-weight-bold" style="font-size: 23px;">{{ $d->title }}</span>
                                                        @if($d->status == "1")
                                                        <span class="badge badge-success ml-1">Published</span>
                                                        @else
                                                        <span class="badge badge-secondary ml-1">Draft</span>
                                                        @endif
                                                        <br><small class="text-secondary pt-2">Date: {{ date_format($d->created_at,"d M Y H:i:s") }}</small>
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="{{ route('category.edit', [$d->id]) }}" class="btn btn-warning btn-sm text-white btn-block">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#deleteModal{{ $d->id }}"><i class="fas fa-trash"></i> Delete</button>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $d->id }}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content rounded-0">
                                                                    <div class="modal-header bg-danger rounded-0">
                                                                        <h5 class="modal-title text-white m-0" id="deleteModalLabel{{ $d->id }}"><i class="fas fa-exclamation-circle"></i> Warning</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure want to delete "<span class="font-weight-bold">{{ $d->title }}</span>" ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{route('category.destroy', [$d->id])}}" method="POST" class="d-inline">
                                                                            @csrf
                                                                            <input type="hidden" value="DELETE" name="_method">
                                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i> Delete</button>
                                                                        </form>
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times mr-1"></i> Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>TITLE</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('vendors/adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#publish").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            });
        });
    </script>
    <script>
        $(function() {
            $("#draft").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
    @endpush
</x-app-layout>