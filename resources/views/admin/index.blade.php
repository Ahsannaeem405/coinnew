@extends('../layouts/admin')
@section('title')
Index
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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- 
                    ============================================================== -->
                @php
                $total_coin=App\Models\add_coin::whereNotNull('approve')->count();
                $per_coin=App\Models\add_coin::whereNotNull('permote')->whereNotNull('approve')->count();
                $tot_sub=App\Models\subscribe::count();
                @endphp
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Coins</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">{{$total_coin}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Permoted Coins</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple">{{$per_coin}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Subscriber</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info">{{$tot_sub}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
             
                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Recent Coins</h3>
                                
                            </div>
                             <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                           <th>Logo</th>
                                            <th class="border-top-0">Name</th>
                                            
                                            <th class="border-top-0">launch Date</th>
                                            <th class="border-top-0">Price</th>
                                            <th>vote</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    @php
                                     $sub1=App\Models\add_coin::whereNotNull('approve')->take('10')->orderBy('id', 'DESC')->get();


                                    $j=1;
                                    @endphp
                                    <tbody>
                                        @foreach($sub1 as $row1)
                                        <tr>
                                            <td>{{$j++}}</td>
                                            <td><img src="{{$row1->logo_link}}" style="height: 40px; width: 40px;"></td>
                                            <td class="txt-oflo">{{$row1->name}}</td>
                                            
                                            <td class="txt-oflo">{{$row1->launch_date}}</td>
                                            <td><span class="text-success">${{$row1->mark_cap}}</span></td>
                                            <td><a type="button"  data-toggle="modal" data-target="#exampleMod{{$j}}" class="btn btn-info" style="color: white; width: 100%;">{{$row1->vote}}</a></td>
                                           
                                        </tr>
                                        <div class="modal fade" id="exampleMod{{$j}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Edit Vote</h5>
                                                    <i class="fas fa-times" data-dismiss="modal"></i>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-material" method="post" action="{{url('admins/update_vote')}}">
                                                     @csrf
                                          
                                                    <input type="hidden" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="id" value="{{$row1->id}}">
                                                    <div class="form-group mb-4">
                                                        <label for="example-email" class="col-md-12 p-0">Vote</label>
                                                        <div class="col-md-12 border-bottom p-0">
                                                            <input type="text"  class="form-control p-0 border-0" name="vote" value="{{$row1->vote}}" id="example-email">
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                    
                                   
                                
                                              
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-success" type="submit">Update Vote</button>
                                                </div>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        </div>
@endsection