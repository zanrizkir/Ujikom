@extends('admin.layouts.admin')

@section('content')

            <div class="mx-auto text-center">
                <div class="row">
                    <div class="col-md-6 col-xl-6 mb-4">
                        <div class="card shadow  text-white border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary-light">
                                            <i class="fe fe-16 fe-users text-white mb-0"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="small text-muted mb-0"><b> Pengguna </b></p>
                                        <span class="h3 mb-0 ">{{ $users }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                    <span class="circle circle-sm bg-primary">
                                        <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                                    </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="small text-muted mb-0">Produk </p>
                                        <span class="h3 mb-0">{{ $produk->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                <div class="row">
                    <div class="col-lg-6 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Data Transaksi</h5>
                                <canvas id="pendapatan_transaksi" style="height:250px;" ></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6 mb-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Data Barang</h5>
                                <canvas id="data_barang" style="height:200px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    const ctx = document.getElementById('pendapatan_transaksi');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                                'oktober', 'November', 'Desember'
                            ],
                            datasets: [{
                                label: 'Bulan',
                                data: [
                                    {{ $pembelian_produk_jan }},
                                    {{ $pembelian_produk_feb }},
                                    {{ $pembelian_produk_mar }},
                                    {{ $pembelian_produk_apr }},
                                    {{ $pembelian_produk_mei }},
                                    {{ $pembelian_produk_jun }},
                                    {{ $pembelian_produk_jul }},
                                    {{ $pembelian_produk_agu }},
                                    {{ $pembelian_produk_sep }},
                                    {{ $pembelian_produk_okt }},
                                    {{ $pembelian_produk_nov }},
                                    {{ $pembelian_produk_des }}

                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                    const ctz = document.getElementById('data_barang');

                    new Chart(ctz, {
                        type: 'doughnut',
                        data: {
                            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                                'oktober', 'November', 'Desember'
                            ],
                            datasets: [{
                                label: 'Bulan',
                                data: [
                                    {{ $data_barangmasuk_jan }},
                                    {{ $data_barangmasuk_feb }},
                                    {{ $data_barangmasuk_mar }},
                                    {{ $data_barangmasuk_apr }},
                                    {{ $data_barangmasuk_mei }},
                                    {{ $data_barangmasuk_jun }},
                                    {{ $data_barangmasuk_jul }},
                                    {{ $data_barangmasuk_agu }},
                                    {{ $data_barangmasuk_sep }},
                                    {{ $data_barangmasuk_okt }},
                                    {{ $data_barangmasuk_nov }},
                                    {{ $data_barangmasuk_des }}

                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
                <script>
                    const ctx = document.getElementById('data_barang');

                    new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                                'oktober', 'November', 'Desember'
                            ],
                            datasets: [{
                                label: 'Bulan',
                                data: [
                                    {{ $data_barangmasuk_jan }},
                                    {{ $data_barangmasuk_feb }},
                                    {{ $data_barangmasuk_mar }},
                                    {{ $data_barangmasuk_apr }},
                                    {{ $data_barangmasuk_mei }},
                                    {{ $data_barangmasuk_jun }},
                                    {{ $data_barangmasuk_jul }},
                                    {{ $data_barangmasuk_agu }},
                                    {{ $data_barangmasuk_sep }},
                                    {{ $data_barangmasuk_okt }},
                                    {{ $data_barangmasuk_nov }},
                                    {{ $data_barangmasuk_des }}

                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>


@endsection