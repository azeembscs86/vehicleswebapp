@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Pages    
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>     
        <li>Pages</li>
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
        <a href="{{url('admin/camper-pages/add-new')}}"><button rel="" type="button" 
                class="btn btn-info make-modal-large iframe-form-open" 
                data-toggle="modal"  title="Add Page">
            <span class="glyphicon glyphicon-plus"></span>Add
        </button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>                
                    <th>Title</th>
                    <th>Meta Title</th>                    
                    <th>Page Url</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $campages as $campage )
                <tr>                 
                    <td>{{$campage->title}}</td>  
                    <td>{{$campage->meta_title}}</td>  
                    <td>{{$campage->page_url}}</td>                   
                    <td><a href="{{ url('/admin/camper-pages/edit-page/'.$campage->id) }}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Edit Page {{$campage->title}}">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="#deleteseason{{$campage->id}}" rel="" type="button" 
                           class="btn btn-info make-modal-large iframe-form-open" 
                           data-toggle="modal"  title="Delete Page">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a></td>
                </tr>

            <div class="modal fade" id="deleteseason{{$campage->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete Page</h4>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to Delete this Page <b>{{$campage->title}}</b>?</p>  

                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                <a href="{{ url('/admin/camper-pages/destroy/'.$campage->id) }}">
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

