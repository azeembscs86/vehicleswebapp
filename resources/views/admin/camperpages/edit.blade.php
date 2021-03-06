@extends('admin.layouts.header')
@section('contents')
<section class="content-header">
    <h1>
        Update CMS Page
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>            
        <li>Update CMS Page          </li>
    </ol>
</section>

<div class="box">
    <div class="box box-info">

        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{url('/admin/camper-pages/update')}}" role="form" data-toggle="validator" id="create_author">
            {{ csrf_field() }}
            <input type="hidden" name="page_id" value="{{$campages->id}}">
            
            <div class="box-body"> 
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Page Title</label>

                    <div class="col-sm-10">
                        <input type="text" name="page_title" value="{{$campages->title}}" class="form-control" id="page_title" required="required">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Meta Title</label>

                    <div class="col-sm-10">
                        <input type="text" name="meta_title" value="{{$campages->meta_title}}" class="form-control" id="meta_title"  required="required">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Meta Tags</label>

                    <div class="col-sm-10">
                        <input type="text" name="meta_tags" value="{{$campages->meta_tags}}" class="form-control" id="meta_tags"  required="required">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Page Url</label>

                    <div class="col-sm-10">
                        <input type="text" name="page_url" value="{{$campages->page_url}}" class="form-control" id="page_url"  required="required">
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>

                  <div class="col-sm-10">
                      <textarea required="required" name="meta_decription" id="meta_description" rows="10" cols="108">
                                  {{$campages->meta_decription}}
</textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Page Description</label>

                    <div class="col-sm-10">
                        <textarea required="required" id="editor1" name="page_description" rows="10" cols="80">
                                   {{$campages->page_description}}          
                    </textarea
                    </div>
                </div>
                
                
                
                
                
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button  type="submit" class="btn btn-info pull-right" id="createauthor">Submit</button>

                <button type="reset" value="Reset" class="btn btn-info pull-left" style="margin-left: 672px">Reset</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box-body -->
</div>








@extends('admin.layouts.footerinner')
<link rel="stylesheet" href="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<script src="{{asset('public/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>   
    
    $(function () {
         // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
        

        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection
