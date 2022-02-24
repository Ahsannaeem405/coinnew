@extends('../layouts/admin')
@section('title')
Ccontact
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
                        <h4 class="page-title">Contact Us</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Contact Us</a></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
@if(Session::has('success'))
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
                        @php
                            $sub=App\Models\contact::orderBy('id', 'DESC')->paginate(10);
                        @endphp
                        @foreach($sub as $row)
                        <div class="card">
                            <div class="card-body">
                                
                                
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" style="font-size: 20px;">{{$row->name}}</label>

                                        <span style="font-size: 15px;">{{$row->email}}</span>
                                        <div class="col-md-12 border-bottom p-0">
                                          {{$row->msg}}

                                        </div>
                                        <a href="{{url('admins/del_msg', ['id'=>$row->id])}}" style="float: right;">
                                                    <button class="btn btn-danger" type="submit">Delete</button></a>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        @endforeach
                        {{ $sub->links() }}

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