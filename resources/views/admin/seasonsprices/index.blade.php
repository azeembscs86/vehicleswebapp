@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Seasons Rates      
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
        <li class="active"><a href="{{ url('/admin/seasons') }}"><i class="fa fa-dashboard"></i> Seasons</a></li> 
        <li>Seasons Rates</li>
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
        <a href="{{url('admin/seasons-rates/add-season-rate')}}"><button rel="" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal"  title="Add Season Rates">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>                
                    <th>Season Name</th>
                     <th>Season Rate</th>
                    <th>Start Date</th>
                    <th>End Date</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $seasonrates as $season )
                <tr>                 
                    <td>{{$season->season_name}}</td> 
                    <td>{{$season->season_rate}}</td> 
                    <td>{{date("d M Y",strtotime($season->start_date))}}</td>   
                    <td>{{date("d M Y",strtotime($season->end_date))}}</td>      
                    <td><a href="{{ url('/admin/seasons-rates/edit-season-rate/'.$season->id) }}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Season Rates {{$season->season_name}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deleteseason{{$season->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Season Rates">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>

            <div class="modal fade" id="deleteseason{{$season->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Season Rates</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Season Rates <b>{{$season->season_name}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/seasons/destroy/'.$season->id) }}">
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

