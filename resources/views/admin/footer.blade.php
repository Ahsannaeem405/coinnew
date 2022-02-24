@extends('../layouts/admin')
@section('title')
    Footer
@endsection
@section('body_content')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Footer</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="d-md-flex">
                        <ol class="breadcrumb ms-auto">
                            <li><a href="#" class="fw-normal">Footer</a></li>
                        </ol>

                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->

                <div class="col-lg-12 col-xlg-9 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Footer Section</h5>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal form-material" method="post" action="{{ route('update.footer') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group mb-4">
                                    <div class="row text-center">
                                        <img src="{{ asset('upload/images/'.$footer->logo) }}" width="100" height="200" alt="">
                                        <label class="col-md-2 p-0">Logo:</label>
                                        <div class="col-md-8 border-bottom p-0">
                                            <input type="file" name="logo" class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mb-4">
                                    <div class="row text-center">
                                    <label class="col-md-2 p-0">Slogan:</label>
                                    <div class="col-md-8 border-bottom p-0">
                                        <input type="text" name="slogan" class="form-control p-0 border-0" value="{{ $footer->slogan }}">
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="row text-center">
                                    <label class="col-md-2 p-0">Copyright:</label>
                                    <div class="col-md-8 border-bottom p-0">
                                        <input type="text" name="copyright" class="form-control p-0 border-0" value="{{ $footer->copyright }}">
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <div class="col-md-2 offset-10">
                                        <button class="btn btn-success btn-lg" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->

        </div>


    </div>


@endsection
