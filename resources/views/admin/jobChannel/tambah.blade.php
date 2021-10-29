<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Tambah Job Channel</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('jobChannel.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Posisi Pekerjaan</label>
                <input type="text" class="form-control" name="posisi_pekerjaan" placeholder="Posisi Pekerjaan" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Gaji</label>
                <input type="number" class="form-control" name="gaji" placeholder="Gaji" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Bidang</label>
                <input type="text" class="form-control" name="bidang" placeholder="Bidang" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Tipe</label>
                <select class="form-control" name="tipe" id="exampleFormControlSelect1" required>
                  <option value="Full Time">Full Time</option>
                  <option value="Intersship">Internship</option>
                  <option value="Part Time">Part Time</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Pengalaman</label>
                <input type="text" class="form-control" name="pengalaman" placeholder="Pengalaman" required>
              </div>        
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Foto</label>
                <input type="file" class="form-control" name="foto" required>
              </div>               
              <div class="text-end">
                      <a href="javascript:history.back()" class="btn bg-gradient-danger"><i class="ni ni-bold-left"></i>&nbsp;&nbsp;Batal</a> 
                <button type="submit" class="btn bg-gradient-dark"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>