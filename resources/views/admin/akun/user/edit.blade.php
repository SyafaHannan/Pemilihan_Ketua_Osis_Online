<div class="row">
    <div class="col-lg-12">
        <form action="{{url('/admin/user/edit',$akun->id_user)}}" method="post">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <div class="input-group"> <input type="text" name="username" class="form-control" value="{{$akun->username}}" >
                    <div class="input-group-text">
                        <i class="bi bi-person"></i>
                    </div>
                </div> <!--begin::Row-->
                @error('username') <small>{{$message}}</small> @enderror
            </div>
            <!-- JavaScript -->
            <div class="form-group">
                <label>Nomor Induk</label>
                <div class="input-group"> <input type="text" name="no_induk" class="form-control" value="{{$akun->no_induk}}">
                    <div class="input-group-text">
                        <i class="bi bi-person-vcard"></i>
                    </div>
                </div> <!--begin::Row-->
                @error('no_induk') <small>{{$message}}</small> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group"> <input type="date" name="tanggal_lahir" class="form-control" value="{{$akun->tanggal_lahir}}">
                </div> <!--begin::Row-->
                @error('tanggal_lahir') <small>{{$message}}</small> @enderror
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <div class="input-group"> <input type="text" name="kelas" class="form-control" value="{{$akun->kelas}}">
                    <div class="input-group-text">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                </div> <!--begin::Row-->
                @error('kelas') <small>{{$message}}</small> @enderror
            </div>

            <br>
            <button type="confirm" class="btn btn-primary">Simpan</button>
        </form>

    </div>
</div>