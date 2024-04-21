
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
      <h1>Edit Data Pembelian</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="dataPembelian"></a>Data Pembelian</li>
          <li class="breadcrumb-item active">Edit Data Pembelian</li>
        </ol>
      </nav>
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Data Pembelian</h5>
              
                <!-- General Form Elements -->
                <form action="{{  url('dataPembelian/update/'.$beli->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nama Bahan Baku</label>
                  
                  <select name="nama_bahanBaku" id="nama_bahanBaku">
                      @if($bhn->count())
                      @foreach($bhn as $item)
                        <option value="{{$item->nama_bahanBaku}}"{{ $item->nama_bahanBaku == $beli->nama_bahanBaku ? 'selected' : '' }}>
                          {{$item->nama_bahanBaku}}</option>
                      @endforeach
                      @endif
                    </select>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Harga Bahan</label>
                  <div class="col-sm-10">
                    <input type="text" name="harga" id="harga" class="form-control"value="{{ $beli->harga }}">
                  </div>
                </div>
                <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                  <div class="col-sm-10">
                    <input type="month" name="bulan" id="bulan" class="form-control"value="{{ $beli->bulan }}">
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
    <div>
      <div>
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