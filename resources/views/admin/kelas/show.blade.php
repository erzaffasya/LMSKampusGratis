<x-app-layout>
  <div class="row">
    <div class="col-6">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h3 class="text-center">Detail {{$kelas->nama}}</h3>
        </div>
        <div class="row px-xl-5 px-sm-4 px-3">

          <div class="card-body">
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Nama Kelas</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$kelas->nama}}" readonly>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1">Deskripsi Kelas</label>
              <textarea name="deskripsi" class="nonEditableMCE" rows="11">
              {{$kelas->deskripsi}}
              </textarea>
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
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Konten Dokumen</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Konten Video</button>
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
                  <textarea name="deskripsi" class="editableMCE" rows="11"> </textarea>
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
                  <select class="form-control" id="exampleFormControlSelect1" disabled>
                    @foreach ($kelasselect as $item)
                    <option value="{{$item->id}}" @if ($item->id == $kelas->id)
                      selected
                      @endif>{{$item->nama}}</option>
                    @endforeach
                  </select>
                  <input name="kelas_id" value="{{$item->id}}" type="hidden">
                </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card-body">
              <form role="form text-left" action="{{route('kontenVideo.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Judul</label>
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlSelect1">Deskripsi</label>
                  <textarea name="deskripsi" rows="11" class="editableMCE"> </textarea>
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
                  <select class="form-control" id="exampleFormControlSelect1" disabled>
                    @foreach ($kelasselect as $item)
                    <option value="{{$item->id}}" @if ($item->id == $kelas->id)
                      selected
                      @endif>{{$item->nama}}</option>
                    @endforeach
                  </select>
                  <input name="kelas_id" value="{{$item->id}}" type="hidden">
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
  </div>
  


  @push('scripts')
  <script>
    tinymce.init({
      selector: ".nonEditableMCE",
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
      readonly: 1
    });

    tinymce.init({
      selector: ".editableMCE",
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',

    });
  </script>
  @endpush

</x-app-layout>