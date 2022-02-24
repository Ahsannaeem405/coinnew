@extends('../layouts/admin')
@section('title')
Add Coin
@endsection   
@section('body_content')

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js
"></script>


<style type="text/css">
    #example_info{
        display: none;

    }
     #example_paginate{
        display: none;
        
    }
     #example_length{
        display: none;
        
    }
</style>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
 @if(Session::has('success'))
  <div class="alert alert-success">
    {{ Session::get('success') }}
      @php
        Session::forget('success');
      @endphp
  </div>
@endif
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Coins</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Coins</a></li>
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
                 <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Waiting For Approval</h3>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap"  id="example1" >
                                    <thead>
                                        <tr>
                                            
                                            <th>Logo</th>
                                            <th class="border-top-0">Name</th> 
                                            <th class="border-top-0">launch Date</th>
                                            <th class="border-top-0">Price</th>
                                            <th>Approve</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    @php
                                     $sub2=App\Models\add_coin::whereNull('approve')->take(50)->get();


                                    $k=1;
                                    @endphp
                                    <tbody class="t2">
                                        @foreach($sub2 as $row2)
                                        <tr>
                                            
                                            <td><img src="{{$row2->logo_link}}" style="height: 40px; width: 40px;"></td>
                                            <td class="txt-oflo">{{$row2->name}}</td>
                                            
                                            <td class="txt-oflo">{{$row2->launch_date}}</td>
                                            <td><span class="text-success">${{$row2->mark_cap}}</span></td>
                                            <td><a  href="{{url('admins/approve', ['id'=>$row2->id])}}" class="btn btn-info" style="color: white; width: 100%;">Approve</a></td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn-sm btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                 
                                                  <a class="dropdown-item" href="{{url('coin_edit', ['id'=>$row2->id])}}">Edit</a>
                                                  
                                                  <a class="dropdown-item" href="{{url('coin_del', ['id'=>$row2->id])}}">Delete</a>
                                                </div>
                                              </div>
                                            </td>
                                            
                                        </tr>
                                        
                                        @endforeach
                                         <tr>
                                        <td colspan="7"> 
                                            <center>   
                                                <button class="sbn btn btn-sm btn-outline-primary set2 cap2" last_id="{{$sub2[49]->id}}" style="width:40%;margin-right: 0;margin-left: 0;">Show More</button></center>
                                        </td>
                                        </tr> 

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Promote Coins</h3>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap"  id="example2" >
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                           <th>Logo</th>
                                            <th class="border-top-0">Name</th>
                                            
                                            <th class="border-top-0">launch Date</th>
                                            <th class="border-top-0">Price</th>
                                            <th>vote</th>
                                            <th>Un Promote</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    @php
                                     $sub1=App\Models\add_coin::whereNotNull('permote')->whereNotNull('approve')->take(100)->get();


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
                                            <td><a href="{{url('admins/un_permote', ['id'=>$row1->id])}}" class="btn btn-danger" style="color: white;">Un Promote</a></td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn-sm btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                 
                                                  <a class="dropdown-item" href="{{url('coin_edit', ['id'=>$row1->id])}}">Edit</a>
                                                  
                                                  <a class="dropdown-item" href="{{url('coin_del', ['id'=>$row1->id])}}">Delete</a>
                                                </div>
                                              </div>
                                            </td> 
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
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">All Coins</h3>
                                
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap"  id="example" >
                                    <thead>
                                        <tr>
                                            
                                            <th>Logo</th>
                                            <th class="border-top-0">Name</th>
                                            
                                            <th class="border-top-0">launch Date</th>
                                            <th class="border-top-0">Price</th>
                                            <th>vote</th>
                                            <th>Promote</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     @php
                                     $sub=App\Models\add_coin::whereNull('permote')->whereNotNull('approve')->take('50')->get();


                                    $i=1;
                                    @endphp
                                    <tbody class="t1">
                                        @foreach($sub as $row)
                                        <tr>
                                            
                                            <td><img src="{{$row->logo_link}}" style="height: 40px; width: 40px;"></td>
                                            <td class="txt-oflo">{{$row->name}}</td>
                                            
                                            <td class="txt-oflo">{{$row->launch_date}}</td>
                                            <td><span class="text-success">${{$row->mark_cap}}</span></td>
                                            <td><a type="button"  data-toggle="modal" data-target="#exampleModal{{$i}}" class="btn btn-info" style="color: white; width: 100%;">{{$row->vote}}</a></td>
                                            <td><a href="{{url('admins/permote', ['id'=>$row->id])}}" class="btn btn-success" style="color: white;">Promote</a></td>
                                            <td>
                                                <div class="dropdown">
                                                <button class="btn-sm btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                 
                                                  <a class="dropdown-item" href="{{url('coin_edit', ['id'=>$row->id])}}">Edit</a>
                                                  
                                                  <a class="dropdown-item" href="{{url('coin_del', ['id'=>$row->id])}}">Delete</a>
                                                </div>
                                              </div>
                                            </td>
                                           
                                        </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Edit Vote</h5>
                                                    <i class="fas fa-times" data-dismiss="modal"></i>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-material" method="post" action="{{url('admins/update_vote')}}">
                                                     @csrf
                                          
                                                    <input type="hidden" placeholder="Johnathan Doe" class="form-control p-0 border-0" name="id" value="{{$row->id}}">
                                                    <div class="form-group mb-4">
                                                        <label for="example-email" class="col-md-12 p-0">Vote</label>
                                                        <div class="col-md-12 border-bottom p-0">
                                                            <input type="text"  class="form-control p-0 border-0" name="vote" value="{{$row->vote}}" id="example-email">
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
                                        <caption style="caption-side:bottom">
                                            <center>   
                                                <button class="sbn btn btn-sm btn-outline-primary set1 cap1" last_id="{{$sub[49]->id}}" style="width:40%;margin-right: 0;margin-left: 0;">Show More</button></center>
                                        </caption>        
                                          
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
              
            </div>
           
        </div>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
    $('#example1').DataTable();
    $('#example2').DataTable();
   
});


            $(document).on("click" ,'.set1', function(){

           
                var ids=$(this).attr('last_id');
                

                $.ajax({
                    type: 'get',
                    url:"{{ url('/admins/get_see_all') }}",

                    data: {'id':ids},

                    success: function (data) {
                        $('.cap1').remove();
                    $(".t1").append(data);


                    },
                  });
                
              });
            $(document).on("click" ,'.set2', function(){

           
                var ids=$(this).attr('last_id');
                

                $.ajax({
                    type: 'get',
                    url:"{{ url('/admins/get_see_all2') }}",

                    data: {'id':ids},

                    success: function (data) {
                        $('.cap2').remove();
                    $(".t2").append(data);


                    },
                  });
                
              });
</script> 

@endsection