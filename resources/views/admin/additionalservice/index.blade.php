@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Additional Service        
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
          <li>Additional Service</li>
      </ol>
    </section>
 <div class="box">
            <div class="box-header">
                @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
        <button rel="{{url('')}}" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal" data-target="#modal-default" title="Add Coupon">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>                
                  <th>Service Name</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $services as $service )
                <tr>                              
                    <td>{{$service->name}}</td>
                    <td>{{$service->amount}} {{$service->currency->currency_symbol}}</td>
                    <td><a href="#editcoupons{{$service->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Server {{$service->name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletecoupons{{$service->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Service">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editcoupons{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Additional Service</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/additional-services/update-services')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="service_id" value="{{$service->id}}">
                                <div class="box-body">                                    
                                    <div class="form-group">
                            <label for="exampleInputEmail1">Service Name</label>
                            <input type="text" name="service_name" value="{{$service->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter additional service name" required="required">
                        </div> 
                        
                        <div class="form-group">
                            <span>   <label for="exampleInputEmail1" >Amount</label></span><br/>
                            <span>  <input style="width:338px;float:left;" type="number" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter additional service amount" required="required" min="0" value="{{$service->amount}}">
                           <select required="" name="currency_id" class="form-control" style="width: 200px">
                         <option value=""> Select Currency </option>
                           @foreach( $currencies as $currency )
                               
                               <option value="{{$currency->id}}" @if ($currency->id == $service->currency_id) selected="selected"  @endif> {{$currency->currency_code}} </option>                               
                           @endforeach
                           </select>
                           
                        </span>
                        </div>               
                                 
                                  <div class="form-group">
                            <label for="exampleInputEmail1">Service Rental Charges</label>
                            <select required="" name="service_charges" class="form-control" style="width: 200px">
                          <option value=""> Select Rental Day </option>
                               <option value="per_day" @if ($service->service_charges =='per_day') selected="selected"  @endif>Per Rental day </option>                               
                               <option value="once" @if ($service->service_charges == 'once') selected="selected"  @endif> One Time </option>                               
                           </select>
                        </div>  
                                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea name="description" class="textarea" placeholder="Additional Service Description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$service->descp}}</textarea>
                            </div>
                            <div style="height: 10px"></div>
                        </div>
                        
                                                                                           

                                    
                                </div>
                                <!-- /.box-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="btn_save">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <div class="modal fade" id="deletecoupons{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Additional Services</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Additional Service <b>{{$service->name}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/additional-services/destroy/'.$service->id) }}">
                                    <button 
                                        class="btn btn-primary">Delete</button>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            @endforeach

            </tbody>  

        </table>
    </div>
    <!-- /.box-body -->
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Additional Services</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/additional-services/add-services')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Service Name</label>
                            <input type="text" name="service_name" class="form-control" id="exampleInputEmail1" placeholder="Enter additional service name" required="required">
                        </div> 
                        
                        <div class="form-group">
                            <span>   <label for="exampleInputEmail1" >Service Amount</label></span><br/>
                            <span>  <input style="width:338px;float:left;" type="number" name="amount" class="form-control" id="exampleInputEmail1" placeholder="Enter additional service amount" required="required" min="0">
                           <select required="" name="currency_id" class="form-control" style="width: 200px">
                          <option value=""> Select Currency </option>
                           @foreach( $currencies as $currency )
                              
                               <option value="{{$currency->id}}"> {{$currency->currency_code}} </option>                               
                           @endforeach
                           </select>
                                
                        
                           </span>
                        </div> 
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Service Rental Charges</label>
                            <select required="" name="service_charges" class="form-control" style="width: 200px">
                          <option value=""> Select Rental Day </option>
                               <option value="per_day">Per Rental day </option>                               
                               <option value="once"> One Time </option>                               
                           </select>
                        </div> 
                        
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea name="description" class="textarea" placeholder="Additional Service Description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <div style="height: 10px"></div>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btn_save">Save</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@extends('admin.layouts.footerinner')
<script>
    $(function () {
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

