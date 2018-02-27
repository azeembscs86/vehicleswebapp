@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Inclusions        
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
        <li>Inclusions</li>
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
                    <th>Inclusion Name</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $inclusions as $inclusion )
                <tr>                              
                    <td>{{$inclusion->name}}</td>                   
                    <td><a href="#editcoupons{{$inclusion->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Inclusion {{$inclusion->name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deletecoupons{{$inclusion->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Inclusion">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>


            <div class="modal fade" id="editcoupons{{$inclusion->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Inclusion</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="{{url('/admin/inclusions/update-inclusions')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="inclusion_id" value="{{$inclusion->id}}">
                                <div class="box-body">                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Inclusion Name</label>
                                        <input type="text" name="inclusion_name" value="{{$inclusion->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter inclusion name" required="required">
                                    </div> 

                                                                                                     
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea name="description" class="textarea" placeholder="Inclusion Description"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$inclusion->descp}}</textarea>
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



            <div class="modal fade" id="deletecoupons{{$inclusion->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Inclusion</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Inclusion <b>{{$inclusion->name}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/inclusions/destroy/'.$inclusion->id) }}">
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
                <h4 class="modal-title">Add New Inclusion</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{url('/admin/inclusions/add-inclusions')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Inclusion Name</label>
                            <input type="text" name="inclusion_name" class="form-control" id="exampleInputEmail1" placeholder="Enter inclusion name" required="required">
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description </label>
                            <br>
                            <div class="col-sm-10">
                                <textarea name="description" class="textarea" placeholder="Inclussion Description"
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

