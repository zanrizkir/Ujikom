<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN TRANSAKSI || Electro</title>
</head>
<center>
    {{-- <div clas="text-center">
        <div style="text-align: center; font-size: 14pt; margin-top:10px;">
            KEMENTERIAN AGAMA <br>
            UNIVERSITAS ISLAM NEGERI <br>
            SUNAN GUNUNG DJATI BANDUNG <br>
            PUSAT TEKNOLOGI INFORMASI DAN
            PANGKALAN DATA
        </div>
        <div style="text-align: center; font-size: 11pt;">
            Jl. A.H. Nasution No. 105 Cibiru Bandung 40614 (022) 7800525 <br>
            Fax.(022)7803936 Website: http://ptipd.uinsgd.ac.id
            E-mail: ptipd@uinsgd.ac.id
        </div>
    </div> --}}
    <hr style="background-color: black; margin-bottom: 5px;">
    </div>

    </div>
    <div>
        <div style="text-align: center; font-size: 13pt; margin-top:20px; margin-bottom: 10px;">
            <div class="text-center">
                LAPORAN TRANSAKSI
            </div>
            <div>
                Electro
            </div>
        </div>

        <body>
            <div class="table table-hover table-stiped">
                <table class="table-border" id="Table" border="1" align="center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Pengguna</th>
                            <th>Alamat</th>
                            <th>Produk</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Harga</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($tm as $data)
                            <tr>
                                <td>{{ $no++ }}</td>


                                {{-- <td>{{ $data->nama_peminjam }}</td> --}}
                                {{-- <td>{{ $data->barang->nama_barang }}</td> --}}
                                <td>{{ $data->kode_transaksi }}</td>
                                <td>{{ $data->alamat->nama_lengkap }}</td>
                                <td>{{ $data->alamat->province->title }}</td>
                                <td>{{ $data->keranjang->produk->name }}</td>
                                <td>{{ $data->tanggal_transaksi }}</td>
                                <td>{{ $data->total_harga }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </body>
</center>

</html