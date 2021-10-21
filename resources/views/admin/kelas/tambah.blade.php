<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Data Kelas</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('kelas.store')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Kelas</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" aria-label="Name" aria-describedby="email-addon">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Deskripsi Kelas</label>
                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" aria-label="Name" aria-describedby="email-addon">
              </div>


              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>