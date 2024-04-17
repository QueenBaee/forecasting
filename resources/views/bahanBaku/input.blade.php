
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
          <li class="breadcrumb-item"><a href="dataPembelian"></a>Data Bahan Baku</li>
          <li class="breadcrumb-item active">Tambah Bahan Baku</li>
        </ol>
      </nav>
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data Bahan Baku</h5>
              
                <!-- General Form Elements -->
                <form action="{{ route('bahanBaku-simpan')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" id="nama" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jenis</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenis" id="jenis" class="form-control">
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