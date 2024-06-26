
<!DOCTYPE html>
<html lang="en">

<head>
@include('template.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')
        
            <!-- Main Content -->
            @include('template.topbar')
      <h1>Tambah Bahan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="dataPembelian"></a>Data Pembelian</li>
          <li class="breadcrumb-item active">Tambah Pembelian</li>
        </ol>
      </nav>
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Pembelian</h5>
              
                <!-- General Form Elements -->
                <form action="{{ route('dataPembelian-simpan')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                  <div class="col-sm-10">
                  <select name="nama" id="nama">
                  <option value="" style="display:none;">Pilih bahan baku</option>
                      @if($bhn->count())
                      @foreach($bhn as $item)
                        <option value="{{$item->id_bahan}}">{{$item->nama_bahanBaku}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Harga Bahan</label>
                  <div class="col-sm-10">
                    <input type="text" name="harga" id="harga" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Bulan  Pembelian</label>
                  <div class="col-sm-10">
                  <select placeholder="MM" name="bulan" id="bulan">
                    <option name="bulan" value="" style="display:none;">Pilih Bulan Pembelian</option>
                    <option name="January" value="1">January</option>
                    <option name="February" value="2">February</option>
                    <option name="March" value="3">March</option>
                    <option name="April" value="4">April</option>
                    <option name="May" value="5">May</option>
                    <option name="June" value="6">June</option>
                    <option name="July" value="7">July</option>
                    <option name="August" value="8">August</option>
                    <option name="September" value="9">September</option>
                    <option name="October" value="10">October</option>
                    <option name="November" value="11">November</option>
                    <option name="December" value="12">December</option>
                  </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tahun Pembelian</label>
                  <div class="col-sm-10">
                    <select name="tahun" id="tahun">
                    <option value="" style="display:none;">Pilih tahun Pembelian</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Simpan</button>
                </div>
              </form><!-- End General Form Elements -->

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