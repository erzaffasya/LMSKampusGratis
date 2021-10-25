<x-app-layout>
  <div class="col-xl-7">
    <div class="card">
      <div class="card-header d-flex pb-0 p-3">
        <h6 class="my-auto">Nav Tab</h6>
        <div class="nav-wrapper position-relative ms-auto w-50">
          <ul class="nav nav-pills nav-fill p-1" role="tablist">
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1" role="tab" aria-controls="cam1" aria-selected="true">
                Konten Video
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab" aria-controls="cam2" aria-selected="false">
                Konten Dokumen
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="card-body p-3 mt-2">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show position-relative active height-400 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1" style="background-color:yellow">
            <div class="position-absolute d-flex top-0 w-100">
              <p class="text-white p-3 mb-0">Tab</p>
            </div>
          </div>
          <div class="tab-pane fade position-relative height-400 border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2" style="background-color: black">
            <div class="position-absolute d-flex top-0 w-100">
              <p class="text-white p-3 mb-0">Riyanti</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>