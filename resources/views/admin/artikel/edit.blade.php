<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Artikel</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('artikel.update',$artikel->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Artikel</label>
                <input type="text" class="form-control" name="judul" placeholder="Nama" value="{{$artikel->judul}}">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Gambar</label><br>
                <input type="file" class="" name="gambar" placeholder="Nama" value="{{$artikel->judul}}">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi artikel</label>
                <input type="text" class="form-control" name="deskripsi" value="{{$artikel->deskripsi}}" placeholder="Deskripsi">
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