<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Edit Kelas</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('kelas.update',$kelas->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Kelas</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$kelas->nama}}" aria-label="Name" aria-describedby="email-addon">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi Kelas</label>
                <textarea rows="11" name="deskripsi">
                  {{$kelas->deskripsi}}
                </textarea>
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
  @push('scripts')
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>
  @endpush

</x-app-layout>