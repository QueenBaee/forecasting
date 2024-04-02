
<!DOCTYPE html>
<html lang="en">

<head>
<title>SB Admin 2 - Blank</title>
@include('template.head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('template.sidebar')
        
            <!-- Main Content -->
            <div id="content">
            @include('template.topbar')
                        
                        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="pagetitle">
<h1>Data Pembelian</h1>
</div>
<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Bahan</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <div class="card-body">
                    <a href="/home/bahan/tambah"><button type="button" class="btn btn-primary">Tambah Data pembelian</button></a>
                    <a href="/home/bahan/cetak" target="_blank"><button type="button" class="btn btn-secondary">Cetak Data Pembelian</button></a>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($bahan as $bhn)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $bhn->nama }}</td>
                      <td width="10%">{{ 'Rp. ' .$bhn->harga }}</td>
                      <td>{{ $bhn->tanggal_beli }}</td>
                      <td>{{ $bhn->Vendor }}</td>
                      <td width="25%">
                        <img src="{{ url('/img_bahan/'.$bhn->gambar) }}" width="40%" alt="">
                      </td>
                      <td>
                          <a href="#">Edit</a>
                          <a href="#">Hapus</a>
                      </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

                </div>
                <!-- /.container-fluid -->

            </div>
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