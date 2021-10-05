<x-app-layout>
    @push('css')
    <style>
        .nav-link {
            color: #6c757d;
        }

        .nav-link:hover {
            color: #000;
        }
    </style>
    @endpush
    @section('title')Settings @endsection
    @section('user'){{ Auth::user()->name }}@endsection

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
                            <!-- <a href="{{ route('category.create') }}" class="btn btn-sm btn-block btn-success"><i class="fas fa-plus-circle"></i> Create New</a> -->
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
                <form class="row" method="POST" action="">
                    <div class="col-md-8">
                        <div class="card card-secondary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">
                                            <i class="far fa-circle nav-icon"></i> Image
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">
                                            <i class="far fa-circle nav-icon"></i> Draft
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                        <!-- image setting -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Upload Method</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="upload_method">
                                                            <option value="0" @if($image_setting->upload_method == '0') selected @else @endif>Auto</option>
                                                            <option value="1" @if($image_setting->upload_method == '1') selected @else @endif>Manual</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <span>
                                                            <strong>Large</strong>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Width</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="lg_width" value="{{ $image_setting->lg_width }}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">px</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Height</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="lg_height" value="{{ $image_setting->lg_height }}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">px</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <span>
                                                            <strong>Medium</strong>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Width</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="md_width" value="{{ $image_setting->md_width }}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">px</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Height</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="md_height" value="{{ $image_setting->md_height }}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">px</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <span>
                                                            <strong>Small</strong>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Width</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="sm_width" value="{{ $image_setting->sm_width }}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">px</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Height</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="sm_height" value="{{ $image_setting->sm_height }}">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">px</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                        <!-- other setting -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-secondary shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Actions</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success w-100"><i class="fas fa-save"></i> Save</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('category.index') }}" class="btn btn-danger w-100"><i class="fas fa-ban"></i> Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
    @endpush
</x-app-layout>