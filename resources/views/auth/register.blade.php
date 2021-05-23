<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('avatar-selector.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Form Registrasi</title>
</head>
<body style="background-color:rgb(7, 148, 26);">

    <div class="container-fluid my-5 row justify-content-center ">
        <div class="card col-6">
            <div class="card-header text-center font-weight-bold">
                Isikan Identitas Anda
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autocomplete="name" autofocus placeholder="ex: Greg Hambali">
                            @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ex: greghambali@gmail.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Kelamin</label> <br>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="laki-laki" name="jenis_kelamin" class="custom-control-input"
                                    value="L" @if(old('jenis_kelamin')=='L') checked @endif>
                                <label class="custom-control-label" for="laki-laki">Laki-laki</label>
                              </div>
                              <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input"
                                    value="P" @if(old('jenis_kelamin')=='P') checked @endif>
                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                              </div>
                              @error('jenis_kelamin')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                            <input id="telepon" type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" placeholder="ex: +6289xxxxxxx" autocomplete="tel">
                            @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                            <textarea id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">Quotes</label>
                            <input id="quote" type="text" class="form-control @error('quote') is-invalid @enderror" name="quote" value="{{ old('quote') }}" placeholder="ex: Hiduplah seperti tumbuhan">
                            @error('quote')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Kata Sandi">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Kata Sandi">
                    </div>
                    <div class="form-group">
                        <label for="role">Daftar Sebagai</label>
                        <div class="row mx-auto">
                            <select name="role" id="role" class="form-control col-9">
                                <option value="1" @if(old('role') != 2) selected @endif>Pembeli</option>
                                <option value="2" @if(old('role') == 2) selected @endif>Penjual</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Foto Profil</label>
                                <div class="row mx-auto">
                                    <div class="custom-file col-12">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto_profil">
                                        <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                    </div>
                                    @error('foto_profil')
                                        <span class="text-danger" role="alert">
                                            <small><strong>{{ $message }}</strong></small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-secondary my-3">atau</div>
                            <div class="row mx-auto">
                                <div class="col-12 p-0">
                                    <div class="mx-0">Pilih Avatar
                                        <small style="opacity: .9;"> (<a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>)</small>
                                    </div>
                                  <div class="avatar-wrapper mt-2">
                                    @if(old('jenis_kelamin')!='L' && old('jenis_kelamin')!='P')
                                        <div id="avatar-container">
                                            <div class="alert alert-primary mt-3 mx-3" role="alert">
                                                Mohon pilih jenis kelamin :)
                                            </div>
                                        </div>
                                    @endif
                                    <div class="cc-selector mt-3 text-center @if(old('jenis_kelamin')!='P') d-none @endif" id="female-avatar">
                                        @for ($i = 1; $i<=10; $i++)
                                            <input id="avatar-{{$i}}" type="radio" name="avatar" value="female-{{$i}}" />
                                            <label class="drinkcard-cc avatar-{{$i}}" for="avatar-{{$i}}"></label>
                                        @endfor
                                    </div>
                                    <div class="cc-selector mt-3 text-center @if(old('jenis_kelamin')!='L') d-none @endif" id="male-avatar">
                                        @for ($i = 1; $i<=10; $i++)
                                            <input id="avatarmale-{{$i}}" type="radio" name="avatar" value="male-{{$i}}" />
                                            <label class="drinkcard-cc avatarmale-{{$i}}" for="avatarmale-{{$i}}"></label>
                                        @endfor
                                    </div>
                                    @error('avatar')
                                        <span class="text-danger" role="alert">
                                            <small><strong>{{ $message }}</strong></small>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 mx-auto my-auto">
                            <div class="rect-img-container">
                                <img src="{{asset('images/profiles/preview.png')}}" alt="Foto" class="img-fluid rect-img h-100 w-100" id="preview" style="background-color: #f5c7cf; border-radius: 50%">
                            </div>
                            <div class=" mb-3 my-1 text-center cc-selector">
                                <input id="preview-profile" type="checkbox" name="useavatar" value="using"/>
                                <label class="h5 avatar-cc" for="preview-profile" id="preview-label">Gunakan Avatar</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary btn-block bs">
                            Registrasi
                        </button>
                    </div>

                    <div class="mt-4 mb-2 text-center">
                        Sudah punya akun? Silakan login <a href="login">disini</a>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Copyright 2021 Botani Marketplace and Education Website
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$(document).ready(function (){
    var avatarPath="{{asset('images/profiles/preview.png')}}";
    var profilePath="{{asset('images/profiles/preview.png')}}";
    function getRadioValue(name) {
        var radios = document.getElementsByName(name);

        for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            return radios[i].value;
        }
        }
    }
    $("input[name='avatar']").click(function(){
        var img = getRadioValue('avatar');
        avatarPath = "{{URL::to('images/profiles/')}}"+"/"+img+".png";
        if(getRadioValue('jenis_kelamin') == 'P'){
            $("#preview").attr("style", "background-color: #f5c7cf; border-radius: 50%");
        }else{
            $("#preview").attr("style", "background-color: #c7ccf5; border-radius: 50%");
        }

        document.getElementById('preview-profile').checked = true;
        document.getElementById("preview-label").innerHTML = "Gunakan Foto";

        $("#preview").attr("src", avatarPath);
    });
    $("input[name='jenis_kelamin']").click(function(){
        document.getElementById("avatar-container").innerHTML = "";
        if(getRadioValue('jenis_kelamin') == 'L'){
            document.getElementById("female-avatar").className += " d-none";

            document.getElementById("male-avatar").className =
            document.getElementById("male-avatar").className.replace(/\bd-none\b/,'');
            document.getElementById("male-avatar").className =
            document.getElementById("male-avatar").className.replace(/\bd-none\b/,'');
        }else{
            document.getElementById("male-avatar").className += " d-none";

            document.getElementById("female-avatar").className =
            document.getElementById("female-avatar").className.replace(/\bd-none\b/,'');
            document.getElementById("female-avatar").className =
            document.getElementById("female-avatar").className.replace(/\bd-none\b/,'');
        }
    });
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
                    $('#preview').attr('src', profilePath);
                };

                reader.readAsDataURL(this.files[0]);
            }
            $("#preview").attr("style", "background-color: white; border-radius: 50%");

            document.getElementById('preview-profile').checked = false;
            document.getElementById("preview-label").innerHTML = "Gunakan Avatar";
    });
    $('#preview-profile').change(function(){
        if(document.getElementById('preview-profile').checked == true){
            $('#preview').attr('src', avatarPath);
            // document.getElementById('preview-profile').click();
            if(getRadioValue('jenis_kelamin') == 'P'){
                $("#preview").attr("style", "background-color: #f5c7cf; border-radius: 50%");
            }else{
                $("#preview").attr("style", "background-color: #c7ccf5; border-radius: 50%");
            }
            document.getElementById("preview-label").innerHTML = "Gunakan Foto";
        }else{
            $('#preview').attr('src', profilePath);
            // document.getElementById('preview-profile').click();
            $("#preview").attr("style", "background-color: white; border-radius: 50%");
            document.getElementById("preview-label").innerHTML = "Gunakan Avatar";
        }
    });
});
</script>
</body>
</html>
