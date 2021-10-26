<x-app-layout>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
          <div class="card card-body mt-4">
            <h6 class="mb-0">Tambah Data Iklan</h6>
            <p class="text-sm mb-0">Data iklan untuk slide tampilan awal</p>
            <hr class="horizontal dark my-3">
            <label class="mt-4 form-label">Iklan</label>
            <form role="form text-left" action="{{route('iklan.store')}}" method="POST" enctype="multipart/form-data" id="dropzone">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1">Gambar</label><br>
                <input type="file" name="gambar" placeholder="">
              </div>

              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Submit</button>
              </div>
            </form>
            
            {{-- <form action="{{route('iklan.store')}}" >
              @csrf --}}
              {{-- <label class="mt-4 form-label">Starting Files</label> --}}
              {{-- <form action="/file-upload" class="form-control dropzone" id="dropzone">
                <div class="fallback">
                  <input name="file" type="file" multiple />
                </div>
              </form>
              <div class="d-flex justify-content-end mt-4">
                <button type="button" name="button" class="btn btn-light m-0">Cancel</button>
                <button type="button" name="button" class="btn bg-gradient-primary m-0 ms-2">Create Project</button>
              </div> --}}
            {{-- </form> --}}
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/plugins/dropzone.min.js')}}"></script>

</x-app-layout>