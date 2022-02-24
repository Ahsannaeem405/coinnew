@php  $i=1;
                                    @endphp
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
                                        @if(count($sub) == 50)
                                        <tr>
                                        <td colspan="7"> 
                                            <center>   
                                                <button class="sbn btn btn-sm btn-outline-primary set1 cap1" last_id="{{$sub[49]->id}}" style="width:40%;margin-right: 0;margin-left: 0;">Show More</button></center>
                                        </td>
                                        </tr>
                                        @endif    
                                        