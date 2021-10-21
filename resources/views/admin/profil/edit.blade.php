<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Data Pengguna</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('profil.update',$profil->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div class="mb-3">
                  <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{$profil->nama}}" aria-label="nama" aria-describedby="nama" >
                </div>
                <div class="mb-3">
                  <input type="number"  name="no_hp" class="form-control" placeholder="Nomor Handphone" value="{{$profil->no_hp}}" aria-label="no_hp" aria-describedby="no_hp">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Gambar</label><br>
                  <input type="file" name="gambar" placeholder="">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Simpan</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>