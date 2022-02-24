 
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
                                        @if(count($sub2) == 50)
                                         <tr>

                                        <td colspan="7"> 
                                            <center>   
                                                <button class="sbn btn btn-sm btn-outline-primary set2 cap2" last_id="{{$sub2[49]->id}}" style="width:40%;margin-right: 0;margin-left: 0;">Show More/button></center>
                                        </td>
                                        </tr> 
                                        @endif