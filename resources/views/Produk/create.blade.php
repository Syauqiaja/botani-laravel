@extends('layouts.master')

@section('content')
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - BBBootstrap</title>
                                <script src="{{asset('js/vendor/tinymce/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
                                <style>body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-image: url("https://i.imgur.com/GMmCQHC.png");
    background-repeat: no-repeat;
    background-size: 100% 100%
}

.card {
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
}

.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}

input,
textarea,
button, select {
    padding: 8px 15px;
    border-radius: 5px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    cursor: pointer
}

.btn-block:hover {
    color: #fff !important
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript'>function validate(val) {
v1 = document.getElementById("fname");
v2 = document.getElementById("lname");
v3 = document.getElementById("file");
v4 = document.getElementById("deskripsi");

flag1 = true;
flag2 = true;
flag3 = true;
flag4 = true;
flag5 = true;
flag6 = true;

if(val>=1 || val==0) {
if(v1.value == "") {
v1.style.borderColor = "red";
flag1 = false;
}
else {
v1.style.borderColor = "green";
flag1 = true;
}
}

if(val>=2 || val==0) {
if(v2.value == "") {
v2.style.borderColor = "red";
flag2 = false;
}
else {
v2.style.borderColor = "green";
flag2 = true;
}
}
if(val>=3 || val==0) {
if(v3.value == "") {
v3.style.borderColor = "red";
flag3 = false;
}
else {
v3.style.borderColor = "green";
flag3 = true;
}
}
if(val>=4 || val==0) {
if(v4.value == "") {
v4.style.borderColor = "red";
flag4 = false;
}
else {
v4.style.borderColor = "green";
flag4 = true;
}
}



flag = flag1 && flag2 && flag3 && flag4;

return flag;
}</script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <h5 class="text-center mb-4">Tambahkan Barang</h5>
                <form method="POST" class="form-card" id="formBarang" action="{{route('produk.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nama Barang<span class="text-danger"> *</span></label> <input type="text" id="fname" name="nama" placeholder="Masukkan nama barang" onblur="validate(1)" value="{{old('nama')}}"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Harga Barang<span class="text-danger"> *</span></label> <input type="number" id="lname" name="harga" placeholder="Masukkan harga barang" onblur="validate(2)" value="{{old('harga')}}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Gambar Barang<span class="text-danger"> *</span></label> <input type="file" id="file" name="files[]" multiple placeholder="" onblur="validate(3)">
                            @error('files.*')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tipe Barang<span class="text-danger"> *</span></label>
                             <select type="file" id="tipe" name="tipe" class="custom-select">
                                 <option selected>--Pilih--</option>
                                 <option value="Tanaman" {{(old('tipe') == 'Tanaman') ? "selected" : ""}}>Tanaman</option>
                                 <option value="Peralatan" {{(old('tipe') == 'Peralatan') ? "selected" : ""}}>Peralatan</option>
                                 <option value="Lainnya" {{(old('tipe') == 'Lainnya') ? "selected" : ""}}>Lainnya</option>
                             </select>
                             @error('tipe')
                            <span class="text-danger" role="alert">
                                <small><strong>{{ $message }}</strong></small>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Stok Awal<span class="text-danger"> *</span></label> <input type="number" id="stok" name="stok" placeholder="Masukkan stok awal barang" value="{{old('stok')}}"> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Deksripsi Barang<span class="text-danger"> *</span></label> <textarea name="deskripsi" id="deskripsi" cols="10" rows="5">{{old('deskripsi')}}</textarea> </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="button" class="btn-block btn-primary" id="submitButton">Tambahkan Barang</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

    $("#submitButton").on("click", function() {
    if ($("#file")[0].files.length > 5) {
        alert("You can select only 5 images");
    } else {
        $("#formBarang").submit();
    }
    });
    });
    var editor_config = {
    path_absolute : "/",
    selector: 'textarea#deskripsi',
    height:300,
    menubar:false,
    statusbar:false,
    mobile: {
        theme: 'mobile',
        plugins: 'autosave lists autolink',
        toolbar: 'undo bold italic'
    },
    relative_urls: false,
    plugins: [
      "autolink lists link",
      "searchreplace wordcount ",
      "emoticons template paste"
    ],
    toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist",
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
</script>
</body>
</html>
@endsection
