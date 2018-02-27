@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Companies        
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
          <li>Companies</li>
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
                data-toggle="modal" data-target="#modal-default" title="Add City">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>                
                  <th>Comapny Name</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $companies as $company )
                <tr>                              
                    <td>{{$company->company_name}}</td>                   
                    <td><a href="#editcoupons{{$company->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit logo font {{$company->company_name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletecoupons{{$company->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Logo font">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editcoupons{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Company</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/companies/update-company')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="company_id" value="{{$company->id}}">
                                <div class="box-body">                                    
                                    <div class="form-group">
                            <label for="exampleInputEmail1">City Name</label>
                            <input type="text" name="company_name" value="{{$company->company_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter company name" required="required">
                        </div> 
                                    
                                    <div class="form-group">
                            <label for="exampleInputEmail1">Insurance</label>
                            <input value="{{$company->company_insurance}}" type="text" name="company_insurance" class="form-control" id="exampleInputEmail1" placeholder="Enter company insurance">
                        </div>
                                   
                                    
                                    <div class="form-group">
                                       <label for="exampleInputFile">Upload Image</label>
                                       <input type="file" name="img_path" id="exampleInputFile">
                                       <input type="hidden" name="logo_image" value="{{$company->img_path}}">
                                       <img style="float:right;" src="{{asset('public/'.$company->img_path)}}"> 
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



            <div class="modal fade" id="deletecoupons{{$company->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Comapny</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this company <b>{{$company->company_name}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/companies/destroy/'.$company->id) }}">
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
                <h4 class="modal-title">Add New Company</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/companies/add-company')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                                              
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Comapny Name</label>
                            <input type="text" name="company_name" class="form-control" id="exampleInputEmail1" placeholder="Enter company name" required="required">
                        </div>   
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Insurance</label>
                            <input type="text" name="company_insurance" class="form-control" id="exampleInputEmail1" placeholder="Enter company insurance">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Upload Image</label>
                            <input type="file" name="img_path" id="exampleInputFile">
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

