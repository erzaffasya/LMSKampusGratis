<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Tambah Data Profil</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('profil.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="nama" aria-describedby="nama" >
                </div>
                <div class="mb-3">
                  <input type="number"  name="no_hp" class="form-control" placeholder="Nomor Handphone" aria-label="no_hp" aria-describedby="no_hp">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Gambar</label>
                  <input type="file" class="form-control" name="gambar">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Tambah</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>