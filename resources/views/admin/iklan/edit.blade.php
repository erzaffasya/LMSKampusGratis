<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-6 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Edit Iklan</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('iklan.update',$iklan->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Iklan</label>
                <input type="file" class="form-control" name="gambar">
              </div>
              <div class="text-end">
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Simpan</button>
                <a href="{{route('iklan.index')}}" class="btn bg-gradient-danger"><i class="ni ni-curved-next"></i>&nbsp;&nbsp;Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>