
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
          <li class="breadcrumb-item active">Tambah Bahan</li>
        </ol>
      </nav>
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Bahan</h5>
              
                <!-- General Form Elements -->
                <form action="{{ route('dataPembelian-simpan')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" id="nama" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Harga Bahan</label>
                  <div class="col-sm-10">
                    <input type="text" name="harga" id="harga" class="form-control">
                  </div>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                  <div class="col-sm-10">
                    <input type="date" name="tanggal_beli" id="tanggal_beli" class="form-control">
                  </div>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Vendor</label>
                  <div class="col-sm-10">
                    <input type="text" name="vendor" id="vendor" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputFile" class="col-sm-2 col-form-label">Bukti Pembelian</label>
                  <div class="col-sm-10">
                    <input type="file" name="gambar" id="gambar" class="form-control">
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