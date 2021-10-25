<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Data Job Channel</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <form role="form text-left" action="{{route('jobChannel.store')}}" method="POST"  enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Posisi Pekerjaan</label>
                <input type="text" class="form-control" name="posisi_pekerjaan" placeholder="Posisi Pekerjaan" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Gaji</label>
                <input type="text" class="form-control" name="gaji" placeholder="Gaji" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Bidang</label>
                <input type="text" class="form-control" name="bidang" placeholder="Bidang" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Tipe</label>
                <select class="form-control" name="tipe" id="exampleFormControlSelect1">
                 

                  <option value="Full Time">Full Time</option>
                  <option value="Intership">Intership</option>
                  <option value="Part Time">Part Time</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Pengalaman</label>
                <input type="text" class="form-control" name="pengalaman" placeholder="Pengalaman" >
              </div>        
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Foto</label>
                <input type="file" class="form-control" name="foto">
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