<x-app-layout>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-9 col-12 mx-auto">
        <div class="card card-body mt-4">
          <h6 class="mb-0">Edit Job Channel</h6>
          <hr class="horizontal dark my-3">
          <div class="card-body">
            <form role="form text-left" action="{{route('jobChannel.update',$jobChannel->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Posisi Pekerjaan</label>
                <input type="text" class="form-control" name="posisi_pekerjaan" value="{{$jobChannel->posisi_pekerjaan}}" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama_perusahaan" value="{{$jobChannel->nama_perusahaan}}" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Gaji</label>
                <input type="number" class="form-control" name="gaji" value="{{$jobChannel->gaji}}" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Bidang</label>
                <input type="text" class="form-control" name="bidang" value="{{$jobChannel->bidang}}" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Tipe</label>
                <select class="form-control" name="tipe">
                  <option disabled selected>{{$jobChannel->tipe}}</option>
                  <option value="Full Time">Full Time</option>
                  <option value="Internship">Internship</option>
                  <option value="Part Time">Part Time</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Pengalaman</label>
                <input type="text" class="form-control" name="pengalaman" value="{{$jobChannel->pengalaman}}" >
              </div>        
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Foto</label>
                <input type="file" class="form-control" name="foto" value="{{$jobChannel->foto}}">{{$jobChannel->foto}}
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