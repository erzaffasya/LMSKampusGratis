<x-app-layout>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Data Konten Video</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn bg-gradient-dark mb-0" href="{{route('kontenVideo.create')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          {{-- <div class="table-responsive p-0"> --}}
            <table id="datatable-search" class="table align-items-center mb-0">

              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Judul</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bab</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kelas</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>

              <tbody>
                @foreach ($kontenVideo as $item)
                  <tr>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-xs font-weight-bold mb-0">{{ $item->judul }}</p>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{!! $item->deskripsi !!}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $item->link }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $item->bab }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $item->kelas->nama }}</span>
                    </td>
                    <td>
                      <div class="ms-auto text-center">
                        <form action="{{route('kontenVideo.destroy', $item->id)}}" method="POST" style="display: inline">
                          @csrf
                          @method("DELETE")
                          <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="fas fa-trash text-secondary"></i></button>
                        </form>
                        <a class="btn btn-link text-dark px-3 mb-0" href="{{route('kontenVideo.edit', $item->id)}}"><i class="fas fa-user-edit text-secondary"></i></a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>

            </table>
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </div>
  @push('scripts')
  <script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
      searchable: true,
      fixedHeight: true
    });
  </script>
@endpush
</x-app-layout>