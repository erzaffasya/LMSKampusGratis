<x-app-layout> 
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Tambah Data Kelas</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('kelas.store')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Kelas</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" aria-label="Name" aria-describedby="email-addon">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi Kelas</label>
                <textarea name="deskripsi" rows="11"></textarea>
              </div>
              <div class="text-end">
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                <a href="{{route('kelas.index')}}" class="btn bg-gradient-danger"><i class="ni ni-curved-next"></i>&nbsp;&nbsp;Batal</a>
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