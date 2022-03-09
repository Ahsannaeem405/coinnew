@extends('../layouts/main')
@section('title')
Topgainer
@endsection
@section('body_content')
<style type="text/css">
        .nav-tabs .nav-item .active{
            background-color: #696c84 !important;
        }
        .sbn{
            width: 100%;
        }
        body a{
        color: black;
        }
.cap{
     font-size:30px;
 }
 tr td img{
    width:60px;
    height:60px;
    margin-right: 3%;
 }

 @media screen and (max-width: 600px) {
 .som{
    display: none;
 }
 .btn-primary{
    padding: .15rem 0.3rem;
    font-size: 0.775rem;

 }
 
 .table tbody tr td a img{
    width: 10px;
    height: 10px;
 }


}
</style>
   @php

            $check=0;
            $dt=date('Y-m-d');
            $today = new DateTime($dt);
            $dtm=date('m');

           //////////current week/////////
           $monday = strtotime("last monday");
           $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
           $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
           $this_week_sd = date("Y-m-d",$monday);
           $this_week_ed = date("Y-m-d",$sunday);
           $mon_start=date('Y-m-01', strtotime($dt));
           $mon_end=date('Y-m-t', strtotime($dt));
           $today_coin=App\Models\add_coin::whereNotNull('approve')->orderBy('vote', 'DESC')->paginate(10);

            $per_coin=App\Models\add_coin::whereNotNull('approve')->whereNotNull('permote')->orderBy('vote', 'DESC')->paginate(10);
            $per_coin2=App\Models\add_coin::whereNotNull('approve')->whereNotNull('permote')->orderBy('vote', 'DESC')->get();
     
            if(Auth::user())
            {
            $us=Auth::user()->id;
            }
            else{
            $us=0;
            }
            

           if(Session::has('id'))
           {
           $get_ses=Session::get('id');

           }
           else{
            $get_ses=0;

           }

        @endphp
        <div class="container">
            <div class="row mb-5 mt-5 justify-content-center">
                @if(Session::has('success'))
                <div class="alert alert-success" style="width:100%;">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
                @endif

            </div>
        </div>
        
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="w-100 mytable mt-5"  id="myTable1">
                        <tr class="table-heading">
                            <td>Tokenlist</td>
                        </tr>
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th>Name</th>
                                <th >Symbol</th>
                                <th>Price</th>
                                <th>Launch</th>
                     
                               <th>vote</th>
                    
                                <th>more</th>
                            </tr>
                            </thead>
                            <tbody >
                            @php $al_kk=0;
                                $i=1;
                            @endphp
                            @foreach($today_coin as $row_today)
                            @php $al_kk++; @endphp
                            <tr>
                                <td>{{$i++}}</td>
                                    <td ><a href="{{url('coins', ['id'=>$row_today->id])}}" class="name"><img src="{{$row_today->logo_link}}"  ><b>{{$row_today->name}}</b></a></td>
                                    <td>
                                        <a href="{{url('coins', ['id'=>$row_today->id])}}">{{$row_today->sym}}</a>
                                      
                                    </td> 
                                    <td ><a href="{{url('coins', ['id'=>$row_today->id])}}">${{$row_today->mark_cap}}</a></td>
                                    @php
                                        $later_row_today = new DateTime($row_today->launch_date);
                                        $diff_row_today= $today->diff($later_row_today)->format("%a");  @endphp
                                    @if($row_today->launch_date<$dt)
                                        <td ><a href="{{url('coins', ['id'=>$row_today->id])}}">{{$diff_row_today}} days</a></td>
                                    @elseif($row_today->launch_date==$dt)
                                        <td >Launch Today</td>
                                    @else
                                        <td ><a href="{{url('coins', ['id'=>$row_today->id])}}"> {{$diff_row_today}} days</a></td>
    
                                    @endif
                                    @php
                                        if(Auth::user())
                                        {
                                         $check1=DB::select("select * from coin_votes where ((coin_id=$row_today->id) and ((user_id=$us) or (user_id=$get_ses)))");
                                          
                                          $check1=count($check1);
    
                                        }
                                    @endphp
                                   
                                    @if(Auth::user())
                                        @php
    
    
                                            $check=DB::select("select * from coin_votes where ((coin_id=$row_today->id) and ((user_id=$us) or (user_id=$get_ses)))");
    
                                            $check=count($check);
    
                                        @endphp
    
                                        @if($check==0)
                                            <td style="text-align:center;" class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_today->id}}" type="button"><span>{{$row_today->vote}}</span></button></a></td>
                                        @else
                                            <td style="text-align:center;" class="vo1{{$row_today->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_today->id}}" type="button"><span>{{$row_today->vote}}</span></button></td>
                                        @endif
                                         {{--devote start
                                         @if($check==0)
                                            <td style="text-align:center;" class="devote{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  " devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                        @else
                                            <td style="text-align:center;" class="un_devote{{$row_today->id}}"><button class="btn btn-sm sbn btn-danger un_devote" un_devote="{{$row_today->id}}" type="button"><span>{{$row_today->devote}}</span></button></td>
                                        @endif  
                                        --}} 
                                    @else
                                        @php
    
    
                                            $ses_check=App\Models\coin_vote::where('coin_id',$row_today->id)->where('user_id',$get_ses)->count();
    
    
                                        @endphp
                                        @if($ses_check==0)
    
                                            <td style="text-align: center;" class="vo1{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-primary vo1 col-12 col-lg-6" abc="{{$row_today->id}}">{{$row_today->vote}}</button></td>
                                        @else
                                            <td style="text-align: center;" class="vo1{{$row_today->id}}"><button class="btn btn-sm sbn btn-primary un_vo1 col-12 col-lg-6" abc="{{$row_today->id}}">{{$row_today->vote}}</button></td>
    
                                        @endif
                                         {{--devote start
                                         @if($ses_check==0)
                                            <td style="text-align:center;" class="devote{{$row_today->id}}"><button class="sbn btn btn-sm btn-outline-danger devote  col-12 col-lg-6" devote="{{$row_today->id}}">{{$row_today->devote}}</button></td>
                                        @else
                                            <td style="text-align:center;" class="un_devote{{$row_today->id}}"><button class="btn btn-sm sbn btn-danger un_devote col-12 col-lg-6" un_devote="{{$row_today->id}}">{{$row_today->devote}}</button></td>
                                        @endif   
                                        --}} 
                                    @endif
                                   
                                    <td><a href="{{url('coins', ['id'=>$row_today->id])}}">Info</a></td>
                                </tr>
                            @endforeach
                           
                            </tbody>
                    </table>
                </div>
          </div>
          <script type="text/javascript">
            $(document).on("click" ,'.set5', function(){
                $("#promoted_1").hide();
                $(".set5").hide();
                document.getElementById("promoted_2").style.display = "inline-table";


            });
          </script>

<script type="text/javascript">
    
    $(document).ready(function(){
        var set=30;

            setInterval(function(){
                set+=1;
                console.log(set);

               
            }, 1000);

        $(document).on("click",'.vo1' , function(){
            
            
            if(set>=30)
            {
            var ids=$(this).attr('abc');
            //alert(ids1)

            $.ajax({
                type: 'get',
                url:"{{ url('/vote') }}",

                data: {'id':ids},

                success: function (data) {
                    $('.vo1'+ids).empty();
                    var op =" ";
             
                    op+='<button class="btn btn-sm sbn btn-primary un_vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
                    $('.vo1'+ids).append(op);
                    if(data.dat > 0)
                    {
                        $('.devote'+ids).empty();

                    var d =" ";
                    d+='<button class="btn btn-sm sbn btn-outline-danger devote col-12 col-lg-6" type="button" devote='+data.id+'>'+data.devote+'</button>';
                    $('.devote'+ids).append(d);
                    //alert('vote ='+data.devote);
                    }

                },
            });
            set=0;
        }
        else{
            alert('You Have To wait for 30s for next vote');
        }
        });
   
        $(document).on("click" ,'.un_vo1', function(){
            

        if(set>=1)
        {
            var ids=$(this).attr('abc');
            //alert(ids1)

            $.ajax({
                type: 'get',
                url:"{{ url('/un_vote') }}",

                data: {'id':ids},

                success: function (data) {
                    
                    $('.vo1'+ids).empty();
                    var op =" ";
                    op+='<button class="btn btn-sm sbn btn-outline-primary vo1" type="button" abc='+data.id+'>'+data.dat+'</button>';
                    $('.vo1'+ids).append(op);
                    // $('.devote'+ids).empty();
                    // var d =" ";
                    // d+='<button class="btn btn-sm sbn btn-danger un_devote col-6" type="button" un_devote='+data.id+'>'+data.devote+'</button>';
                    // $('.devote'+ids).append(d);
                    // $('.vo1'+ids).text(data.devote);
                    // alert(data.devote);

                },
            });
            set=0;
        }
        else{
            alert('You Have To wait for 30s for next vote');
        }
        });

        $(document).on("click",'.devote' , function(){
            
        

            if(set>=30)
            {
            var ids=$(this).attr('devote');
        
            $.ajax({
                type: 'get',
                url:"{{ url('/devote') }}",

                data: {'id':ids},

                success: function (data) {
                 

                    $('.devote'+ids).empty();
                    var op =" ";
                    op+='<button class="btn btn-sm sbn btn-danger un_devote col-12 col-lg-6" type="button" un_devote='+data.id+'>'+data.dat+'</button>';
                    $('.devote'+ids).append(op);
                    if(data.dat > 0)
                    {
                    $('.vo1'+ids).empty();
                    var v =" ";
                    v+='<button class="btn btn-sm sbn btn-outline-primary vo1 col-12 col-lg-6" type="button" abc='+data.id+'>'+data.vote+'</button>';
                    $('.vo1'+ids).append(v);
                    //alert('devote ='+data.vote);

                //     $('.devote'+ids).text(data.vote);
                //    alert(data.vote);
                    }

                },
            });
            set=0;
        }
        else{
            alert('You Have To wait for 30s for next vote');
        }
        });

        $(document).on("click",'.un_devote' , function(){
            
            
            if(set>=30)
            {
            var ids=$(this).attr('un_devote');
          

            $.ajax({
                type: 'get',
                url:"{{ url('/un_devote') }}",

                data: {'id':ids},

                success: function (data) {
                    $('.devote'+ids).empty();
                    var op1 =" ";
                    op1+='<button class="btn btn-sm sbn btn-outline-danger devote col-12 col-lg-6" type="button" devote='+data.id+'>'+data.dat+'</button>';
                    $('.devote'+ids).append(op1);



                },
            });
            set=0;
        }
        else{
            alert('You Have To wait for 30s for next vote');
        }
        });
        
        $(document).on("click" ,'.set1', function(){

       
            var ids=$(this).attr('last_id');
            var no_time=$(this).attr('no_time');
           

            $.ajax({
                type: 'get',
                url:"{{ url('/user/get_see_all') }}",

                data: {'id':no_time},

                success: function (data) {
                $('.cap1').empty();
                $(".t1").append(data);


                },
              });
            
          });
        $(document).on("click" ,'.set2', function(){
            $("#myTable4").hide();
            $(".set2").hide();
            document.getElementById("myTable41").style.display = "inline-table";


        });
        $(document).on("click" ,'.set3', function(){
           var ids=$(this).attr('last_id');
            

            $.ajax({
                type: 'get',
                url:"{{ url('/user/get_see_all_new') }}",

                data: {'id':ids},

                success: function (data) {
                $('.cap_new1').remove();
                $(".t_new1").append(data);


                },
              });


        });
        
           $(document).on("click" ,'.set5', function(){
            $("#promoted_1").hide();
            $(".set5").hide();
            document.getElementById("promoted_2").style.display = "inline-table";


        });
          $(document).on("click" ,'.set15', function(){
            $("#myTable1").hide();
            $("#myInput1").hide();

            
            $(".set15").hide();
            document.getElementById("myTable11").style.display = "inline-table";
            document.getElementById("myInput11").style.display = "inline-table";



        });
        
        $(document).on("click" ,'.blue', function(){
            $("#myInput1").hide();
            $("#myInput11").hide();
            $("#myInput4").hide();
             $("#myInput3").hide();
            
            
            document.getElementById("myInput2").style.display = "inline-table";
          
        });
         $(document).on("click" ,'.new', function(){
            $("#myInput1").hide();
            $("#myInput11").hide();
            $("#myInput2").hide();
            $("#myInput4").hide();
            
            document.getElementById("myInput3").style.display = "inline-table";
          
        });
        $(document).on("click" ,'.pre', function(){
            $("#myInput1").hide();
            $("#myInput11").hide();
            $("#myInput2").hide();
            $("#myInput3").hide();
            document.getElementById("myInput4").style.display = "inline-table";
        });
    });
</script>
<script>
    function myFunction_s1() {
        var x = document.getElementById("mydiv1");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function myFunction_s2() {
        var x = document.getElementById("mydiv2");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function myFunction_s3() {
        var x = document.getElementById("mydiv3");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function myFunction_s4() {
        var x = document.getElementById("mydiv4");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        
        

     
        


        $("#myInput1").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".myTable1 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#myInput11").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".myTable2 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#myInput2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".myTable3 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#myInput3").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".myTable4 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
         $("#myInput4").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".myTable5 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
            return true;
        }).catch(function(e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }
</script>
<!--scripts loaded here-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{asset('carousel.js')}}"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>


<script src="https://www.google.com/recaptcha/api.js"></script>

@endsection