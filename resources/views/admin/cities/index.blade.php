@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
      <h1>
        Cities        
      </h1>
      <ol class="breadcrumb">
          <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
          <li>Cities</li>
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
                  <th>City Name</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $cities as $city )
                <tr>                              
                    <td>{{$city->city_name}}</td>                   
                    <td><a href="#editcoupons{{$city->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit logo font {{$city->city_name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletecoupons{{$city->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Logo font">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editcoupons{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit City</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/cities/update-city')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="city_id" value="{{$city->id}}">
                                <div class="box-body">                                    
                                    <div class="form-group">
                            <label for="exampleInputEmail1">City Name</label>
                            <input type="text" name="city_name" value="{{$city->city_name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter city name" required="required">
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



            <div class="modal fade" id="deletecoupons{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete City</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Coupon Code <b>{{$city->city_name}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/cities/destroy/'.$city->id) }}">
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
                <h4 class="modal-title">Add New City</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/cities/add-city')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">City Name</label>
                            <input type="text" name="city_name" class="form-control" id="exampleInputEmail1" placeholder="Enter city name" required="required">
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

