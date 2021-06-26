<!DOCTYPE html>
<html>
    <head>
        <title>BajuKu Online Store</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/cart.css') }}">
    </head>
    
    <body>
        <div class="container">
            <header>
                <div class="logo">
                    <a href="/" style="text-decoration: none; color: #ffffff;">bajuku.</a>
                </div>
                <div class="login">
                    <a href="/login"style="text-decoration: none; color: #ffffff;">
                    Login Admin</a>
                </div>
            </header>

            <main>
                <div class="katalog_nav">
                    <h1><a href="/" style="text-decoration: none; color: #000000;">Katalog</a></h1>
                </div>   
            <h1 class="cart_nav">/ Cart</h1>
            @if(empty($cart) || count($cart)==0) 
                <div class="noproduk">
                    <h2 style="text-decoration: underline;">Keranjang Kosong</h2>
                </div>
            @else
            <center><table border="1" cellpadding="10" style="width: 70%;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>&nbsp;</th>
                </tr>
                <?php 
                    $no=1;
                    $subtotal = 0;
                ?>
                @foreach($cart as $ct => $val)
                <?php
                    $subtotal = $subtotal + $val["harga"];
                ?>
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$val["nama_barang"]}}</td>
                    <td>Rp.{{$val["harga"]}}</td>
                    <td>
                        <a href="{{url('/cart/hapus/'.$ct)}}">Batal</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="2">Total</th>
                    <th>Rp.{{$subtotal}}</th>
                    <th id="yellow"><a href="/beli" style="text-decoration: none; color: #ffffff;">Checkout</a></th>
                </tr>
            </table></center>
            
            
        @endif
    
            </main>
        </div>
    </body>
</html>      