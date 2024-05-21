
<!DOCTYPE html>
<html lang="en">

<head>

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
                    <a href="dataPembelian/create"><button type="button" class="btn btn-primary">Tambah Data pembelian</button></a>
                    <a href="dataPembelian/export_excel" target="_blank"><button type="button" class="btn btn-secondary">Cetak Data Pembelian</button></a>
                    
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Bulan Pembelian</th>
                    <th scope="col">Tahun Pembelian</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($beli as $bel)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $bel->bahanBaku->nama_bahanBaku }}</td>
                      <td width="10%">{{ 'Rp. ' .$bel->harga }}</td>
                      <td>{{ $bel->Bulan }}</td>
                      <td>{{ $bel->tahun }}</td>
                      <td>
                          <a href="dataPembelian/edit/{{ $bel->id }}">Edit</a>
                          <a href="dataPembelian/delete/{{ $bel->id }}">Hapus</a>
                      </td>
                    </tr>
                @endforeach
                </tbody>    
              </table>
              {{$beli->links()}}
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