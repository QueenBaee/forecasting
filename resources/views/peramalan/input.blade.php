
<!DOCTYPE html>
<html lang="en">

<head>
@include('template.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')
        @include('template.topbar')
        <h1>Peramalan</h1>
            <!-- Main Content -->
            <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form peramalan</h5>
              
                <!-- General Form Elements -->
                <form action="{{ route('peramalan.hitung', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                  <div class="col-sm-10">
                  <select name="id_terms" id="id_terms">
                      @if($bhn->count())
                      @foreach($bhn as $item)
                      <option value="" style="display:none;">Pilih bahan baku yang akan di ramal</option>
                        <option value="{{$item->nama_bahanBaku}}">{{$item->nama_bahanBaku}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Simpan</button>
                </div>
              </form>
              <!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('template.logout')

    @include('template.script')
</body>

</html>