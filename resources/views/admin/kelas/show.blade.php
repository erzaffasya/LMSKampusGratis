<x-app-layout>

  <div class="row">
    <div class="col-md-6 mt-4">
      <div class="card h-100 mb-4">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">Detail {{$kelas->nama}}</h6>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
          <div class="card-body">
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Nama Kelas</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$kelas->nama}}" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Deskripsi Kelas</label>
              <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" value="{{$kelas->deskripsi}}" readonly>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fas fa-landmark opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Konten Video</h6>
                    {{-- <span class="text-xs">
                      
                    </span> --}}
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">
                      @foreach ($kontenVideo as $item)
                      <li>{{$item->judul}}</li>
                      @endforeach
                    </h5>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-md-0 mt-4">
                <div class="card">
                  <div class="card-header mx-4 p-3 text-center">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                      <i class="fab fa-paypal opacity-10"></i>
                    </div>
                  </div>
                  <div class="card-body pt-0 p-3 text-center">
                    <h6 class="text-center mb-0">Konten Dokumen</h6>
                    <hr class="horizontal dark my-3">
                    <h5 class="mb-0">
                      @foreach ($kontenDokumen as $item)
                      <li>{{$item->judul}}</li>
                      @endforeach
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          {{-- <h6 class="mb-0">Tambah Data</h6> --}}
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Konten Video</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Konten Dokumen</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body">
              <form role="form text-left" action="{{route('kontenDokumen.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi">
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">File Dokumen</label>
                  <br>
                  <input type="file" class="" name="file">
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">BAB</label>
                  <input type="number" class="form-control" name="bab">
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <select class="form-control" name="kelas_id" id="exampleFormControlSelect1" disabled>
                    @foreach ($kelasselect as $item)
                    <option value="{{$item->id}}" @if ($item->id == $kelas->id)
                        selected
                    @endif>{{$item->nama}}</option>
                    @endforeach
                    
                  </select>
                </div>
  
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card-body">
              <form role="form text-left" action="{{route('kontenVidio.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi">
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Link</label>
                  <input type="text" class="form-control" name="link" placeholder="Masukkan Link">
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">BAB</label>
                  <input type="number" class="form-control" name="bab">
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <select class="form-control" name="kelas_id" id="exampleFormControlSelect1">
                    @foreach ($kelasselect as $item)
                    <option value="{{$item->id}}" @if ($item->id == $kelas->id)
                        selected
                    @endif>{{$item->nama}}</option>
                    @endforeach
                    
                  </select>
                </div>
  
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                </div>
              </form>
            </div>
          </div>

        </div>
        <div class="row px-xl-5 px-sm-4 px-3">
          <div class="card-body">
          
          </div>
        </div>
      </div>
    </div>
    
  </div>
</x-app-layout>