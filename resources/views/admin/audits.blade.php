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
                        <h4 class="page-title">Desciption</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Desciption</a></li>
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
                            $sub=App\Models\AuditDesc::get();
                           // dd( $sub);
                        @endphp
                  @if(isset($sub) && count($sub) == 0)
                        <div class="card">
                            <div class="card-body">
                                
                                
                                    <form action="{{url('admins/audit_desc')}}" method="post">
                                        @csrf
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" style="font-size: 20px;">Audit Description</label>
                                        <textarea name="audit_desc" class="form-control" id="" cols="5" rows="5"></textarea>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" style="font-size: 20px;">BuyBot Description</label>
                                        <textarea name="buybot_desc" class="form-control" id="" cols="5" rows="5"></textarea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0" style="font-size: 20px;">KYC Description</label>
                                        <textarea name="kyc_desc" class="form-control" id="" cols="5" rows="5"></textarea>
                                    </div>
                                    <button class="btn btn-primary" style="float: right;" type="submit">Save</button>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            @else
                            <div class="card">
                                <div class="card-body">
                                    
                                    
                                    <form action="{{url('admins/update_audit_desc')}}/{{$sub[0]->id}}" method="post">
                                        @csrf

                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0" style="font-size: 20px;">Audit Description</label>
                                            <textarea name="audit_desc" class="form-control" id="" cols="5" rows="5">{{ $sub[0]->audit_desc}}</textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0" style="font-size: 20px;">BuyBot Description</label>
                                            <textarea name="buybot_desc" class="form-control" id="" cols="5" rows="5">{{ $sub[0]->buybot_desc}}</textarea>
                                        </div>
    
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0" style="font-size: 20px;">KYC Description</label>
                                            <textarea name="kyc_desc" class="form-control" id="" cols="5" rows="5">{{ $sub[0]->kyc_desc}}</textarea>
                                        </div>
                                        <button class="btn btn-danger" style="float: right;" type="submit">Update</button>
                                            
                                        </div>
                                        
                                    </form>
                                </div>

                                @endif


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