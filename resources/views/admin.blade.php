<html>
    <head>
        <title>BajuKu Online Store</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    </head>

    <body>
        <div class="container">
            <header>
                <div class="logo">
                    <a href="/" style="text-decoration: none; color: #ffffff;">bajuku.</a>
                </div>
                <div class="logout">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    style="text-decoration: none; color: #ffffff;"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
            </header>

            <main>
                <h1 style="margin: 50px; text-decoration: underline;">Upload File</h1>

                <div class="col-lg-8 mx-auto my-5">	
    
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif

                    <form action="/upload/proses" method="POST" enctype="multipart/form-data"
                    style="margin: 50px;">
                        {{ csrf_field() }}
                       
                        <div class="form-group" style="margin-bottom: 20px;">
                            <b><label for="nama">Nama Barang:</label><br></b>
                            <input type="text" id="nama" name="namabarang"><br>
                        </div>
                          <div class="form-group" style="margin-bottom: 20px;">
                            <b><label for="harga">Harga Barang:</label><br></b>
                            <input type="text" id="harga" name="hargabarang"><br>
                        </div>
       
                        <div class="form-group" style="margin-bottom: 20px;">
                            <b><label for="img">Gambar:</label><br></b>
                            <input type="file" id="img" name="file"><br>
                        </div>
    
                        <div class="form-group" style="margin-bottom: 20px;">
                            <b><label for="ket">Keterangan:</label><br></b>
                            <textarea class="form-control" id="ket" name="keterangan"></textarea>
                        </div>
    
                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>

                    <center><table border=1 cellpadding="10" style="width: 70%;"> 
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th width="1%">Gambar</th>
                                <th>Keterangan</th>
                                <th width="1%">OPSI</th>
                            </tr>
                            @foreach($barang as $g)
                            <tr>
                                <td>{{$g->nama_barang}}</td>
                                <td>{{$g->harga}}</td>
                
                                <td><img width="100px" src="{{ url('/data_file/'.$g->file) }}"></td>
                                <td>{{$g->keterangan}}</td>
                                <td><a class="btn btn-danger" href="/upload/hapus/{{ $g->kode_barang }}">HAPUS</a></td>
                            </tr>
                            @endforeach
                    </table></center>
            </main>
        </div>
    </body>
</html>