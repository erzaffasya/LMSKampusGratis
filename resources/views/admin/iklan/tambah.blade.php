<x-app-layout>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
          <div class="card card-body mt-4">
            <h6 class="mb-0">Tambah Data Iklan</h6>
            <hr class="horizontal dark my-3">
            <form role="form text-left" action="{{route('iklan.store')}}" method="POST" enctype="multipart/form-data" id="dropzone">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Iklan</label>
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
  </main>
</x-app-layout>