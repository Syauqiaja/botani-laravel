@extends('layouts.master')
@section('style')
<script src="{{asset('js/vendor/tinymce/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
@endsection
@section('content')
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="{{url('blogs/create')}}">Create Blog</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
                <h2 class="text-center mb-5">Kreasikan <span style="color: #1CD449">Blogtani</span>mu Semenarik Mungkin</h2>
                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="blog_title">Judul Blog</label>
                      <input type="text" name="blog_title" id="blog_title" class="form-control">
                      @error('blog_title')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Utama Blog</label>
                        <div class="row mx-auto">
                            <div class="custom-file col-12">
                                <input type="file" class="custom-file-input" id="customFile" name="blog_image">
                                <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                            </div>
                            @error('blog_image')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group mt-3">
                      <label for="">Isi blog</label>
                      <textarea name="blogcontent" id="blogcontent" class="tinymce" cols="30" rows="10"></textarea>
                      @error('blogcontent')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                        @enderror
                    </div>
                    <button type="reset" class="btn bs btn-danger rounded-0" onclick="return confirm_reset();">Hapus <i class="fas fa-times"></i></button>
                    <button type="submit" class="btn bs btn-success rounded-0">Selesai <i class="fa fa-check"></i></button>
                </form>
			</div>
		</section>
		<!--/ End Blog Single -->
@endsection
@section('script')
<script>
function confirm_reset() {
    return confirm("Apa kamu yakin ingin menghapus semuanya?");
}

var editor_config = {
    path_absolute : "/",
    selector: 'textarea.tinymce',
    relative_urls: false,
    height: 500,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
$(document).ready(function(){
    $('#customFile').on('change',function(){
        // get the file name
        var fileName = $(this).val();
        var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(cleanFileName);
        if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function () {
                    profilePath = reader.result;
                };

                reader.readAsDataURL(this.files[0]);
            }

    });
});
  </script>
@endsection
