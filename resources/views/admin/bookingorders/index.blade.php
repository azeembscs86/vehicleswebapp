@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Booking Orders        
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
        <li>Booking Orders</li>
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
        
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>                
                    <th>Order No</th>
                    <th>Vehicle Name</th>
                    <th>Full Name</th>      
                     <th>Email</th>      
                    <th>Order Date</th>                              
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $orders as $order )
                <tr>                 
                    <td>camp00{{$order->id}}</td>  
                    <td>{{$order->vehicle->v_name}}</td>   
                     <td>{{$order->f_name}} {{$order->l_name}}</td>  
                    <td>{{$order->email}}</td>
                     <td>{{date("d M Y",strtotime($order->created_at))}}</td>                             
                    <td><a href="{{ url('/admin/booking-orders/view-order/'.$order->id) }}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="View Booking Order  {{$order->f_name}} {{$order->l_name}} ">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deleteseason{{$order->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Booking Order">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>

            <div class="modal fade" id="deleteseason{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Booking Order</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Booking Order <b>{{$order->f_name}} {{$order->l_name}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/booking-orders/destroy/'.$order->id) }}">
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

