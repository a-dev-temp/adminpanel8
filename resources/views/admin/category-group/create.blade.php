<x-app-layout>
    @section('title')Create New - Category Group @endsection
    @section('user'){{ Auth::user()->name }}@endsection
    @section('category')active @endsection
    @section('category-group')active @endsection
    @section('category-open')menu-open @endsection
    @push('css')
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>
    @endpush
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
                            <a href="{{ route('category-group.index') }}" class="btn btn-sm btn-block btn-danger"><i class="fas fa-chevron-circle-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form class="row" action="{{ route('category-group.store') }}" method="POST">@csrf
                    <div class="col-md-9">
                        <div class="card card-primary card-outline shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control form-control-border" name="title" placeholder="Type something">
                                </div>
                                <div class="form-group">
                                    <label>Subtitle</label>
                                    <input type="text" class="form-control form-control-border" name="subtitle" placeholder="Type something">
                                </div>
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control form-control-border" name="short_description" placeholder="Type something"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control form-control-border editor" name="description" placeholder="Type something" rows="7"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-3">
                        <div class="card card-secondary shadow-sm">
                            <div class="card-header">
                                <h3 class="card-title">Actions</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Order</label>
                                    <input type="number" class="form-control form-control-border" name="order" placeholder="Type something">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control form-control-border" name="status">
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success w-100"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('category-group.index') }}" class="btn btn-danger w-100"><i class="fas fa-ban"></i> Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @push('js')
    <script src="{{ asset('vendors/ckeditor') }}/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'), {

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'outdent',
                        'indent',
                        '|',
                        // 'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        '-',
                        'alignment',
                        'fontColor',
                        'fontFamily',
                        'fontSize',
                        'imageInsert',
                        'removeFormat',
                        'sourceEditing',
                        'strikethrough',
                        'subscript',
                        'superscript',
                        'underline'
                    ],
                    shouldNotGroupWhenFull: true
                },
                language: 'en',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:inline',
                        'imageStyle:block',
                        'imageStyle:side',
                        'linkImage'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                licenseKey: '',



            })
            .then(editor => {
                window.editor = editor;




            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                console.warn('Build id: q5nhkhwo1kpz-27xplxxcw2j5');
                console.error(error);
            });
    </script>
    @endpush
</x-app-layout>