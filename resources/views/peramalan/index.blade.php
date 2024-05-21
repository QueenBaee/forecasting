
<!DOCTYPE html>
<html lang="en">

<head>
@include('template.head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <div class="row mb-3">
                  <label for="bahan_id" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                  <div class="col-sm-10">
                  <select name="id" id="id">
                      @if($bhn->count())
                      @foreach($bhn as $item)
                      <option value="" style="display:none;">Pilih bahan baku yang akan di ramal</option>
                        <option value="{{$item->id_bahan}}">{{$item->nama_bahanBaku}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                  <!-- <label for="bulanPrediksi" class="col-sm-2 col-form-label">Prediksi Untuk berapa bulan ke depan</label> -->
<!-- <div class="col-sm-10">
    <select name="bulanPrediksi" id="bulanPrediksi">
        <option value="" style="display:none;">Prediksi Untuk berapa bulan ke depan</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
</div>
                </div> -->
                <!-- <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Simpan</button>
                </div> -->
                  <div class="col-12">
                  <button class="hitung btn btn-primary w-100" id="hitung">Lakukan Perhitungan</button>
                </div> 
        <span class="round small"></span>
        <span class="round big"></span>
        <div class="card-body">
            <!-- <div class="row">
                <div class="col">
                    <div class="avtar avtar-lg">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                </div>
            </div>
            <span id="term_title" class="text-white d-block f-18 f-w-500 my-2" style="color: aqua;">Short Term
                {{-- <i class="fa-solid fa-caret-right px-3"></i> --}}
                <i class="fa-solid fa-turn-down px-3"></i>
                <br><span id="hitung_val">
                </span>
            </span>

            {{-- <p class="mb-0 opacity-50"></p> --}}
        </div> -->
    </div>
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
    <script>

$('.hitung').click(function(event) {
    // var selectedId = $(this).attr('id');
    var selectedBahanId = $('#id').val(); // Mengambil ID barang dari dropdown
    var selectedBulanPrediksi = $('#bulanPrediksi').val();
    event.preventDefault();
    console.log(selectedBahanId, selectedBulanPrediksi);
    if (selectedBahanId == null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Barang harus dipilih!'
                    // timer: 3000
                })
            } else {
                
                window.location.replace('/peramalan/hitung/' + selectedBahanId);
            }

});

    </script>
</body>

</html>