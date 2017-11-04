@extends('admin.master')
@section('content')
    @if(!session('non-object'))
    <form action="#" method="post" enctype="multipart/form-data"
          class="form-horizontal" name="capnhattintuc">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thêm tin tức</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($data as $rex)
                            <div class="col-12">
                                <label>Nhập tiêu đề</label>
                                <input type="text" id="texttieude" name="texttieude" class="form-control"
                                       placeholder="Nhập tên tiêu đề bài viết" value="{{ $rex -> tieude }}" required>
                            </div>
                            <div class="col-12">
                                <label>Nhập URL</label>
                                <input type="text" name="textURL" class="form-control"
                                       placeholder="Nhập URL" value="{!! $rex->url !!}" required>
                            </div>
                            <div class="col-12">
                                <label>Search Title</label>
                                <input type="text" id="Search" name="textSTitle" class="form-control"
                                       placeholder="Search Title" value="{!! $rex->searchtitle !!}">
                            </div>
                            <div class="col-12">
                                <label>Search Description</label>
                                <input type="text" id="Description" name="textSURL" class="form-control"
                                       placeholder="Search Description" value="{!! $rex->searchdescription !!}">
                            </div>
                            <div class="col-12">
                                <label>Tag</label>
                                <input type="text" name="texttag" class="form-control" placeholder="Tag" value="{!! $rex->nhan !!}">
                            </div>
                            <div class="col-6">
                                <label>Chọn danh mục bài viết</label>
                                <select id="idmsdanhmucbaiviet" name="msdmbaiviet" class="form-control">
                                    @foreach($danhmuc as $index)
                                        <option value="{{ $index -> msdanhmucbaiviet }}">{{ $index -> tendanhmucbaiviet }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Chọn ảnh đại diện -- </label>
                                <button type="button" class="btn btn-warning" id="url" name="photo" onclick="openPopup()" > Chọn </button>
                                <br>
                                <input type="hidden" value="{!! $rex->anhdaidien !!}" id="luuurl" name="luuanh">
                                <img src="{!! $rex->anhdaidien !!}" alt="" id="anhdaidien" name="anhdaidien" style="height: 40px; width: 50px" >
                            </div>
                            <div class="col-12">
                                <label>Nhập nội dung bài viết </label>
                                <textarea class="editor" name="editor"  required>{!! $rex->noidung !!}</textarea>
                            </div>
                            <div class="col-12 float-right">
                                <br>
                                <button type="button" class="btn btn-warning"> Lưu nháp </button>
                                <button type="submit" class="btn btn-primary" name="submittintuc"> Cập nhật </button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="{!!  asset('citi_admin/ckeditor/ckeditor.js')  !!}"></script>
    <script src="{!!  asset('citi_admin/ckfinder/ckfinder.js')  !!}"></script>
    <script>
        CKEDITOR.replace('editor', {
            height: '400px'
        });
    </script>
    <script type="text/javascript">
        function openPopup() {
            CKFinder.popup( {
                width: 800,
                height: 500,
                chooseFiles: true,
                resourceType: 'Images',
                onInit: function( finder ) {
                    finder.on( 'files:choose', function( evt ) {
                        var file = evt.data.files.first();
                        showUploadedImage( file.getUrl() )
                    } );
                    finder.on( 'file:choose:resizedImage', function( evt ) {
                        showUploadedImage( evt.data.resizedUrl );
                    } );
                }
            } );
        }

        function showUploadedImage( url ) {
            // Update field's value
            jQuery( '#url' ).val( url );
            $('#luuurl').val(url);
            $('#anhdaidien').prop('src', url);
            // Show chosen image
            var img = jQuery( '<img>' ).attr( 'src', url );
            jQuery( '#side-feature-img' ).html( img );
        }
    </script>
    <script src="../lib/jquery.js"></script>
    <script src="../dist/jquery.validate.js"></script>
    @endif
@endsection