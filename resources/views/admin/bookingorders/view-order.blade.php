@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        View Order      
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
        <li><a href="{{ url('/admin/booking-orders') }}"><i class="fa fa-first-order" aria-hidden="true"></i>Orders</a></li>
        <li>View Order</li>
    </ol>
</section>

<div class="box">
    <div class="box box-info">

        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{url('/admin/vehicles/create')}}" role="form" enctype="multipart/form-data" data-toggle="validator" id="create_author">
            {{ csrf_field() }}

         

            <section class="content">
                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Name</label>
                <input class="form-control input-lg" value="" name="vehicle_title" type="text" placeholder="Vehicle Title">
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
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>                   
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Select Comapny</label>
                                    <select name="company_id" id="company_id" class="form-control" required="required">
                                    </select> 
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Season</label>
                                    <select name="season_id" id="season_id" class="form-control" required="required">
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Select Season Rates</label>
                                    <select name="season_rate_id" id="season_rate_id" class="form-control" required="required">
                                    </select> 
                                </div>
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
                                            <option value="2 Persons" selected="selected">2 Persons</option>
                                            <option value="4 Persons">4 Persons</option>
                                            <option value="6 Persons">6 Persons</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Vehicle Age</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="vehicle_age" class="form-control" placeholder="Enter Vehicle Age">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Vehicle Type</label>

                                    <div class="col-sm-9">
                                        <select name="vehicle_type" class="form-control">
                                            <option value="Manual" selected="selected">Manual </option>                    
                                            <option value="Automatic">Automatic </option>                   

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Engine Size</label>

                                    <div class="col-sm-9">
                                        <input type="text" name="engine_size" class="form-control" id="inputEmail3" placeholder="Enter Engine Size">
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Toll fee</label>

                                    <div class="col-sm-10">
                                        <input type="number" name="toll_fee" value="" class="form-control" placeholder="Toll Fee">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Deployment fee</label>

                                    <div class="col-sm-10">
                                        <input type="number" name="deployment_fee" value="" class="form-control" placeholder="Deployment Fee">
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
                                        <input type="radio" name="is_featued" value="yes">Yes
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="radio" name="is_featued" value="no" checked="checked">No
                                    </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Currency</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <div class="box-body">
                                <div class="form-group">                  

                                    <div class="col-sm-10">
                                        <select required="" name="currency" class="form-control">
                                            <option value=""> Select Currency </option>
                                            <option value="1"> ZAR </option>
                                            <option value="2"> Euro</option>
                                        </select>
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
					    <input name="equipment[]" class="myCheckboxes" value="{{$equiment->id}}" type="checkbox">
					</span>
					<span class="input-group-addon bg-green-gradient">{{$equiment->name}} </span>
					    <input type="number" name="equipment_fees[]" class="form-control" value="{{$equiment->amount}}" placeholder="Enter Price">
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
					    <input name="service[]" class="myCheckboxes" value="{{$service->id}}" type="checkbox">
					</span>
					<span class="input-group-addon bg-green-gradient">{{$service->name}} </span>
					    <input type="number" name="service_fees[]" class="form-control" value="{{$service->amount}}" placeholder="Enter Price">
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
                      <input type="checkbox"  name="inclusion[]" value="{{$inclusion->id}}">
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
                      <input type="checkbox"  name="category[]" value="{{$category->id}}">
                     {{$category->category_name}}
                    </label>
                  </div>
                                    
                                       @endforeach
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
        if (city_id) {
            $.ajax({
                type: "POST",
                url: "../seasons/get-companies",
                data: {city_id: city_id, _token: _token},
                success: function (res) {
                    if (res) {
                        $("#company_id").empty();
                        $("#company_id").append('<option>Select Company</option>');
                        $.each(res, function (key, value) {
                            $("#company_id").append('<option value="' + value['id'] + '">' + value["company_name"] + '</option>');
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
                url: "get-seasons",
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

<script type="text/javascript">
    $('#season_id').change(function () {
        var season_id = $(this).val();
        var _token = $("input[name*='_token']").val();
        if (company_id) {
            $.ajax({
                type: "POST",
                url: "get-seasons-rates",
                data: {season_id: season_id, _token: _token},
                success: function (res) {
                    if (res) {
                        $("#season_rate_id").empty();
                        $("#season_rate_id").append('<option>Select Seasons Rates</option>');
                        $.each(res, function (key, value) {
                            $("#season_rate_id").append('<option value="' + value['id'] + '">' + value["season_name"] + " " + value["season_rate"] + '</option>');
                        });

                    } else {
                        $("#season_rate_id").empty();
                    }
                }
            });
        } else {
            $("#season_rate_id").empty();
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
