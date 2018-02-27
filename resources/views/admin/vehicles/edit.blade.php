@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Update Vehicle        
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
        <li><a href="{{ url('/admin/vehicles') }}"><i class="fa fa-dashboard"></i>Vehicles</a></li>
        <li>Update Vehicle       </li>
    </ol>
</section>

<div class="box">
    <div class="box box-info">

        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{url('/admin/vehicles/update')}}" role="form" enctype="multipart/form-data" data-toggle="validator" id="create_author">
            {{ csrf_field() }}
            <input type="hidden" name="vehicle_id" value="{{$vehicle->id}}">
         

            <section class="content">
                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Name</label>
                <input class="form-control input-lg" value="{{$vehicle->v_name}}" name="vehicle_title" type="text" placeholder="Vehicle Title">
                </div>
                <div class="box box-default">
                    <div class="box-header with-border">          
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select City</label>
                                    <select class="form-control" name="city_id" id="city_id" required="required">
                                        <option value="">Select City</option> 
                                        @foreach( $cities as $city )
                                        <option value="{{$city->id}}" @if ($city->id == $vehicle->city_id) selected="selected"  @endif>{{$city->city_name}}</option>                   
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Select Season</label>
                                    <select class="form-control" name="season_id" id="season_id" required="required">
                            <option value="">Select Season</option> 
                            @foreach( $seasons as $season )
                            <option value="{{$season->id}}" @if ($season->id == $vehicle->season_id) selected="selected"  @endif>{{$season->season_name}}</option>                   
                            @endforeach
                        </select>
                                    
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Select Comapny</label>
                                    <select class="form-control" name="company_id" id="company_id" required="required">
                            <option value="">Select Company</option> 
                            @foreach( $companies as $company )
                            <option value="{{$company->id}}" @if ($company->id == $vehicle->company_id) selected="selected"  @endif>{{$company->company_name}}</option>                   
                            @endforeach
                        </select>
                                </div>
                                
                                <!-- /.form-group -->
                                
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vehicles Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Suitable for</label>

                                    <div class="col-sm-9">
                                        <select name="suitable_for" class="form-control">
                                            <option value="1 Person" @if ($vehicle->suitable_for == '1 Person') selected="selected"  @endif>1 Person</option>
                                            <option value="2 Persons" @if ($vehicle->suitable_for == '2 Persons') selected="selected"  @endif>2 Persons</option>
                                            <option value="3 Persons" @if ($vehicle->suitable_for == '3 Persons') selected="selected"  @endif>3 Persons</option>
                                            <option value="4 Persons" @if ($vehicle->suitable_for == '4 Persons') selected="selected"  @endif>4 Persons</option>
                                            <option value="5 Persons" @if ($vehicle->suitable_for == '5 Persons') selected="selected"  @endif>5 Persons</option>
                                            <option value="6 Persons" @if ($vehicle->suitable_for == '6 Persons') selected="selected"  @endif>6 Persons</option>
                                            <option value="7 Persons" @if ($vehicle->suitable_for == '7 Persons') selected="selected"  @endif>7 Persons</option>
                                            <option value="8 Persons" @if ($vehicle->suitable_for == '8 Persons') selected="selected"  @endif>8 Persons</option>
                                            <option value="9 Persons" @if ($vehicle->suitable_for == '9 Persons') selected="selected"  @endif>9 Persons</option>
                                            <option value="10 Persons" @if ($vehicle->suitable_for == '10 Persons') selected="selected"  @endif>10 Persons</option>
                                            

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Vehicle Age</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="vehicle_age" class="form-control" placeholder="Enter Vehicle Age" value="{{$vehicle->v_age}}" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Vehicle Type</label>

                                    <div class="col-sm-9">
                                        <select name="vehicle_type" class="form-control">
                                            <option value="Manual" @if ($vehicle->v_type == 'Manual') selected="selected"  @endif >Manual </option>                    
                                            <option value="Automatic" @if ($vehicle->v_type == 'Automatic') selected="selected"  @endif>Automatic </option>                   

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Engine Size</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="engine_size" class="form-control" id="inputEmail3" placeholder="Enter Engine Size" value="{{$vehicle->v_engine}}">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /.box -->
                        
                    </div>

                    <div class="col-md-6">                    
                    <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Fees</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Currency</label>

                                    <div class="col-sm-10">
                                       <select required="" name="currency_id" class="form-control" style="width: 200px">                            
                            <option value=""> Select Currency </option>
                                @foreach( $currencies as $currency )
                               <option value="{{$currency->id}}" @if ($currency->id == $vehicle->currency_id) selected="selected"  @endif> {{$currency->currency_code}} </option>                               
                           @endforeach
                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Toll fee</label>

                                    <div class="col-sm-10">
                                        <input type="number" name="toll_fee" id="toll_fee"   class="form-control"  min="1" value="{{$vehicle->v_toll_fee}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Contract Fee</label>

                                    <div class="col-sm-10">
                                        <input type="number" name="deployment_fee"  class="form-control"    min="1" value="{{$vehicle->v_dep_fee}}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Image</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">

                                <div class="form-group">

                <input type="file" name="sample_logos[]" id="sample_logos" class="form-control user_picked_files" multiple="multiple"/>
                <input type="hidden" name="sample_file_total" id="sample_file_total" value="">
                <input type="hidden" name="uploadfiles_name" id="uploadfiles_name" value="">
                <ul class = "cvf_uploaded_files"></ul>
                <div class="timeline-body">
                           @foreach( $vehicleimages as $vehicleimage )
                          <img src="{{asset('/public/uploads/vehicles/'.$vehicleimage)}}" alt="{{$vehicle->v_name}}" class="margin" height="70px" width="80px">                        
                           @endforeach
                      </div>
                </div>
                                
                                
                                

                            </div>
                        </div>
                    </div>
<div class="col-md-6">                    
                    <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Featured</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    

                                    <div class="col-sm-10">
                                        <input type="radio" name="is_featued" value="1" @if ($vehicle->is_featued =1) checked="checked"  @endif>Yes
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="radio" name="is_featued" value="0" @if ($vehicle->is_featued = 0) checked="checked"  @endif>No
                                    </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                    
                  
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Equipment</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                
                                <div class="box-body">
                                <div class="form-group">
                                      
                                       @foreach( $equiments as $equiment )
                                       <div class="input-group">
					<span class="input-group-addon bg-green-gradient">
					    <input name="equipment[]" class="myCheckboxes" value="{{$equiment->id}}" type="checkbox" @foreach($vehicleequipments as $vehicleequipment)    @if ($equiment->id == $vehicleequipment) checked="checked"  @endif @endforeach>
					</span>
					<span class="input-group-addon bg-green-gradient">{{$equiment->name}} </span>
					    <input type="text" name="equipment_fees[]" class="form-control" value="{{$equiment->amount}}" placeholder="Enter Price" {{$equiment->amount}}>
					</div>                                    
                                       @endforeach
                                </div>


                            </div>

                            </div>
                        </div>
                        <!-- /.box -->

                        <!-- Form Element sizes -->

                        <!-- /.box -->


                        <!-- /.box -->

                        <!-- Input addon -->

                        <!-- /.box -->

                    </div>

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Additional Services</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                                                         
                                <div class="box-body">
                                <div class="form-group">
                                      
                                       @foreach( $services as $service )
                                       
                                       <div class="input-group">
					<span class="input-group-addon bg-green-gradient">
					    <input name="service[]" class="myCheckboxes" value="{{$service->id}}" type="checkbox" @foreach($vehicleservices as $vehicleservice)    @if ($service->id == $vehicleservice) checked="checked"  @endif @endforeach>
					</span>
					<span class="input-group-addon bg-green-gradient">{{$service->name}} </span>
					    <input type="text" name="service_fees[]" class="form-control" value="{{$service->amount}}" placeholder="Enter Price">
					</div> 
                                    
                                       @endforeach
                                </div>


                            </div>

                          
                        </div>
                        <!-- /.box -->

                        <!-- Form Element sizes -->

                        <!-- /.box -->


                        <!-- /.box -->

                        <!-- Input addon -->

                        <!-- /.box -->

                    </div>

                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Car Inclusions</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                      
                                       @foreach( $inclusions as $inclusion )
                                       
                                        
                                       
                                       
                                       <div class="checkbox" bg-green-gradient>
                    <label>
                      <input type="checkbox"  name="inclusion[]" value="{{$inclusion->id}}" @foreach($vehicleinclusions as $vehicleinclusion)    @if ($inclusion->id == $vehicleinclusion) checked="checked"  @endif @endforeach>
                     {{$inclusion->name}}
                    </label>
                  </div>
                                    
                                       @endforeach
                                </div>


                            </div>
                        </div>
                        <!-- /.box -->

                        <!-- Form Element sizes -->

                        <!-- /.box -->


                        <!-- /.box -->

                        <!-- Input addon -->

                        <!-- /.box -->

                    </div>
                
          <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Categories</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">                                      
                                       @foreach( $categories as $category )
                                       <div class="checkbox" bg-green-gradient>
                    <label>
                      <input type="checkbox"  name="category[]" value="{{$category->id}}"  @foreach($vehiclecategories as $vehiclecategory)    @if($category->id == $vehiclecategory) checked="checked"  @endif @endforeach>
                     {{$category->category_name}}
                    </label>
                  </div>
                                    
                                       @endforeach
                                </div>


                            </div>
                        </div>
                     

                    </div>
                   
          <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Upload PDF</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">

                                <div class="form-group">

                <input type="file" name="vehicle_pdf" id="vehicle_pdf" class="form-control user_picked_files"/>
                
                </div>
                                
                                
                                

                            </div>
                        </div>
                    </div>
                    <!--/.col (right) -->
                </div>













                

            </section>
            <!-- /.box-body -->
            <div class="box-footer">
                <button  type="submit" name="submit" class="btn btn-info pull-right" id="createauthor">Submit</button>

                <button type="reset" value="Reset" class="btn btn-info pull-left" style="margin-left: 672px">Reset</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box-body -->
</div>








@extends('admin.layouts.footerinner')




<script type="text/javascript">
    $('#city_id').change(function () {
        var city_id = $(this).val();
        var _token = $("input[name*='_token']").val();
        if(city_id==4)
        {
            $("#toll_fee").removeAttr("disabled"); 
        }else
        {
            $("#toll_fee").attr("disabled", "disabled"); 
        }
        if (city_id) {
            $.ajax({
                type: "POST",
                url: "../../seasons/get-companies",
                data: {city_id: city_id, _token: _token},
                success: function (res) {
                    if (res) {                        
                        $("#company_id").empty();
                        $("#company_id").append('<option>Select Company</option>');
                        $.each(res, function (key, value) {
                            $("#company_id").append('<option value="' + value['id'] + '">' + value["company_name"] + '</option>').attr("disabled", false);
                        });

                    } else {
                        $("#company_id").empty();
                    }
                }
            });
        } else {
            $("#company_id").empty();
        }
    });
</script>

<script type="text/javascript">
    $('#company_id').change(function () {
        var company_id = $(this).val();
        var _token = $("input[name*='_token']").val();
        if (company_id) {
            $.ajax({
                type: "POST",
                url: "../get-seasons",
                data: {company_id: company_id, _token: _token},
                success: function (res) {
                    if (res) {
                        $("#season_id").empty();
                        $("#season_id").append('<option>Select Seasons</option>');
                        $.each(res, function (key, value) {
                            $("#season_id").append('<option value="' + value['id'] + '">' + value["season_name"] + '</option>');
                        });

                    } else {
                        $("#season_id").empty();
                    }
                }
            });
        } else {
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
