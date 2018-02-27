@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Update Season Rate
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
        <li><a href="{{ url('/admin/seasons') }}"><i class="fa fa-dashboard"></i>Seasons</a></li>
        <li>Update Season Rate</li>
    </ol>
</section>

<div class="box">
    <div class="box box-info">

        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{url('/admin/seasons-rates/update')}}" role="form" data-toggle="validator" id="create_author">
            {{ csrf_field() }}
            <input type="hidden" name="season_rate_id" id="season_rate_id" value="{{$seasonrates->id}}">
            <div class="box-body"> 
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Select City</label>

                    <div class="col-sm-10">
                        <select class="form-control" name="city_id" id="city_id" required="required">                           
                            @foreach( $cities as $city )
                            <option value="{{$city->id}}" @if ($city->id == $seasonrates->city_id) selected="selected"  @endif>{{$city->city_name}}</option>                   
                            @endforeach
                        </select>
                    </div>
                </div> 

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Select Comapny</label>

                    <div class="col-sm-10">   
                        
                        <select class="form-control" name="company_id" id="company_id" required="required">
                            <option value="">Select Company</option> 
                            @foreach( $companies as $company )
                            <option value="{{$company->id}}" @if ($company->id == $seasonrates->company_id) selected="selected"  @endif>{{$company->company_name}}</option>                   
                            @endforeach
                        </select>
                        
                        
                    </div>
                </div> 
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Select Season</label>
                    <div class="col-sm-10">                        
                        <select name="season_id" id="season_id" class="form-control" required="required">
                            @foreach( $seasons as $season )
                            <option value="{{$season->id}}" @if ($season->id == $seasonrates->season_id) selected="selected"  @endif>{{$season->season_name}}</option>                   
                            @endforeach
                        </select>                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Season Name</label>

                    <div class="col-sm-10">
                        <input type="text" name="season_name" class="form-control" id="season_name" placeholder="Enter Season Name" required="required" value="{{$seasonrates->season_name}}">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Season Rates</label>

                    <div class="col-sm-10">
                        <input type="text" name="season_rate" class="form-control" id="season_rate" placeholder="Enter Season Rate" required="required" value="{{$seasonrates->season_rate}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Start Date:</label>
                    <div class="col-sm-10">
                        <div class=" input-group date">

                            <input type="text" name="start_date" class="form-control pull-right" id="datepicker" value="{{date("d M Y",strtotime($seasonrates->start_date))}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>                
                <div style="height: 20px"></div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">End Date:</label>
                    <div class="col-sm-10">
                        <div class=" input-group date">                  
                            <input type="text" name="end_date" class="form-control pull-right" id="datepicker1" value="{{date("d M Y",strtotime($seasonrates->start_date))}}">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button  type="submit" class="btn btn-info pull-right" id="createauthor">Submit</button>

                <button type="reset" value="Reset" class="btn btn-info pull-left" style="margin-left: 672px">Reset</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box-body -->
</div>








@extends('admin.layouts.footerinner')




<script type="text/javascript">
    $('#city_id').change(function(){
    var city_id = $(this).val();    
     var _token = $( "input[name*='_token']" ).val();
    if(city_id){
        $.ajax({
           type:"POST",
           url:"../get-season-companies",
           data: {city_id: city_id,_token:_token},
           success:function(res){               
            if(res){
                $("#company_id").empty();
               $("#company_id").append('<option>Select Company</option>');
               $.each(res,function(key,value){
                   $("#company_id").append('<option value="'+value['id']+'">'+value["company_name"]+'</option>');
                });
           
            }else{
               $("#company_id").empty();
            }
           }
        });
    }else{
        $("#company_id").empty();        
    }      
   });
</script>



<script type="text/javascript">
    $('#company_id').change(function(){
    var company_id = $(this).val();    
     var _token = $( "input[name*='_token']" ).val();
    if(company_id){
        $.ajax({
           type:"POST",
           url:"../get-companies-season",
           data: {company_id: company_id,_token:_token},
           success:function(res){               
            if(res){
                $("#season_id").empty();
               $("#season_id").append('<option>Select Company</option>');
               $.each(res,function(key,value){
                   $("#season_id").append('<option value="'+value['id']+'">'+value["season_name"]+'</option>');
                });
           
            }else{
               $("#season_id").empty();
            }
           }
        });
    }else{
        $("#season_id").empty();        
    }      
   });
</script>



<script>
    $(function () {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
        //Date picker
        $('#datepicker1').datepicker({
            autoclose: true
        })


        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection
