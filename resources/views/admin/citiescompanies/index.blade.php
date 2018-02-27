@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Cities Companies        
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
          <li>Cities Companies</li>
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
                data-toggle="modal" data-target="#modal-default" title="Add City Comapny">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>                
                  <th>City Name</th>   
                  <th>Company Name</th>   
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $citycompanys as $citycompany )
                <tr>                              
                    <td>{{$citycompany->city_name}}</td>  
                    <td>{{$citycompany->company_name}}</td>  
                    <td><a href="#editcoupons{{$citycompany->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Company City {{$citycompany->city_name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletecoupons{{$citycompany->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Company City">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editcoupons{{$citycompany->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit City</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/cities-companies//update-citycompany')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="city_company_id" value="{{$citycompany->id}}">
                                <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select City</label>
                            <select class="form-control" name="city_id" id="city_id" required="required">
                                <option value="">Select City</option> 
                                @foreach( $cities as $city )
                                <option value="{{$city->id}}" @if ($city->id == $citycompany->city_id) selected="selected"  @endif>{{$city->city_name}}</option>                   
                                @endforeach
                            </select>          
                        </div> 
                                                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Company</label>
                            <select multiple class="form-control" name="company_id[]" id="company_id" required="required">
                                <option value="">Select Company</option> 
                                @foreach( $companies as $company )
                                <option value="{{$company->id}}" @if ($company->id ==$citycompany->company_id ) selected="selected"   @endif>{{$company->company_name}}</option>                   
                                @endforeach
                            </select>          
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



            <div class="modal fade" id="deletecoupons{{$citycompany->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete City Company</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Company City <b>{{$citycompany->city_name}} {{$citycompany->company_name}} </b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/cities-companies/destroy/'.$citycompany->id) }}">
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
                <h4 class="modal-title">Add New City Company</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/cities-companies/add-citycompany')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select City</label>
                            <select class="form-control" name="city_id" id="city_id" required="required">
                                <option value="">Select City</option> 
                                @foreach( $cities as $city )
                                <option value="{{$city->id}}">{{$city->city_name}}</option>                   
                                @endforeach
                            </select>          
                        </div> 
                                                  
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Company</label>
                            <select multiple class="form-control" name="company_id[]" id="company_id" required="required">
                                <option value="">Select Company</option> 
                                @foreach( $companies as $company )
                                <option value="{{$company->id}}">{{$company->company_name}}</option>                   
                                @endforeach
                            </select>          
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

