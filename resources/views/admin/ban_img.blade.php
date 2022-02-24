@extends('../layouts/admin')
@section('title')
Slider Image
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
                        <h4 class="page-title">Long Banner Image</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Long Banner Image</a></li>
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
                        <div class="card">
                            <div class="card-body">
                                 <form class="form-horizontal form-material" method="post" action="{{url('ban_save_img')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Add Image</label>
                                        <div class="col-md-12 border-bottom p-0">
                                           <input type="file" name="file">
                                        </div>
                                    </div>
                                     <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Add Url</label>
                                        <div class="col-md-12 border-bottom p-0">
                                           <input type="text" class="form-control p-0 border-0" name="url">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit">Send</button>
                                        </div>
                                    </div>
                                </form>
                                 <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th style="width:5%;">id</th>
                                            <th style="width:30%;">Image</th> 
                                            <th style="width:5%;">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    @php
                                     $sub2=App\Models\ban_slider_img::get();

                                    $k=1;
                                    @endphp
                                    <tbody>
                                        @foreach($sub2 as $row2)
                                        <tr>
                                            <td>{{$k++}}</td>
                                            <td><img src="{{url('upload/images/'.$row2->file)}}" style="width:100%;"></td>
                                            
                                            
                                            
                                            <td>
                                                <button class="btn-sm btn btn-outline-success ">
                                                  
                                                  <a class="dropdown-item" href="{{url('ban_img_del', ['id'=>$row2->id])}}">Delete</a>
                                              </button>
                                                
                                            </td>
                                            
                                        </tr>
                                        
                                        @endforeach
                                </table>
                            </div>
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