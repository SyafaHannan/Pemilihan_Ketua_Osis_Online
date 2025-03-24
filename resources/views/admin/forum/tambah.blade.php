<div class="row">
    <div class="col-lg-12">
        <form action="{{route('forum.tambah')}}" method="post">
            @csrf
            <input type="hidden" name="id" >
            <div class="form-group">
                <label>Judul</label>
                <div class="input-group"> <input type="text" name="judul" class="form-control" placeholder="" >
                    <div class="input-group-text">
                        <i class="bi bi-person"></i>
                    </div>
                </div> <!--begin::Row-->
                @error('judul') <small>{{$message}}</small> @enderror
            </div>
            <!-- JavaScript -->
            <div class="form-group">
                <label>Akses</label>
                <div class="input-group"> <input type="text" name="akses" class="form-control" placeholder="">
                    <div class="input-group-text">
                        <i class="bi bi-person-vcard"></i>
                    </div>
                </div> <!--begin::Row-->
                @error('akses') <small>{{$message}}</small> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <div class="input-group"> <input type="date" name="tanggal_mulai" class="form-control" placeholder="">
                </div> <!--begin::Row-->
                @error('tanggal_mulai') <small>{{$message}}</small> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Akhir</label>
                <div class="input-group"> <input type="date" name="tanggal_akhir" class="form-control" placeholder="">
                </div> <!--begin::Row-->
                @error('tanggal_akhir') <small>{{$message}}</small> @enderror

            <br>
            <button type="confirm" class="btn btn-success">Tambah</button>
        </form>

    </div>
</div>