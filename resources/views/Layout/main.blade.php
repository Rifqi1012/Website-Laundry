<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        @switch(Request::route()->getName())
        @case('datautama')
        Dashboard - Laundry
        @break
        @case('datapaket')
        Data Paket - Laundry
        @break
        @case('dataorder')
        Data Order - Laundry
        @break
        @case('dataambil')
        Pengambilan - Laundry
        @break
        @case('datainven')
        Inventaris - Laundry
        @break
        @default
        Laundry
        @endswitch
    </title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/bundles/prism/prism.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/png' href='assets/img/laundry.png' />


</head>


<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="assets/img/admin.png" class="header-logo" style="width: 36px; height: 36px;" />
                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ auth()->user()->username }}</div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand" style="display: flex; align-items: center; padding-left: 15px;">
                        <a href="{{ route('datautama') }}" style="display: flex; align-items: center;">
                        <img alt="image" src="assets/img/logo_edan.png" class="header-logo" style="width: 70px; height: 70px; margin-right: 10px;" />
                            <span class="logo-name">Laundry</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu</li>
                        <li class="dropdown {{ Request::route()->getName() == 'datautama' ? 'active' : '' }}">
                            <a href="{{ route('datautama') }}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown {{ Request::route()->getName() == 'datapaket' ? 'active' : '' }}">
                            <a href="{{ route('datapaket') }}" class="nav-link"><i
                                    data-feather="package"></i><span>DataPaket</span></a>
                        </li>
                        <li class="dropdown {{ Request::route()->getName() == 'dataorder' ? 'active' : '' }}">
                            <a href="{{ route('dataorder') }}" class="nav-link"><i
                                    data-feather="shopping-cart"></i><span>DataOrder</span></a>
                        </li>
                        <li class="dropdown {{ Request::route()->getName() == 'dataambil' ? 'active' : '' }}">
                            <a href="{{ route('dataambil') }}" class="nav-link"><i
                                    data-feather="check-square"></i><span>Pengambilan</span></a>
                        </li>
                        <li class="dropdown {{ Request::route()->getName() == 'datainven' ? 'active' : '' }}">
                            <a href="{{ route('datainven') }}" class="nav-link"><i
                                    data-feather="box"></i><span>Inventaris</span></a>
                        </li>
                    </ul>

                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
                <!--End Main Content -->

                <div class="settingSidebar">
                    <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
                    </a>
                    <div class="settingSidebar-body ps-container ps-theme-default">
                        <div class=" fade show active">
                            <div class="setting-panel-header">Setting Panel
                            </div>
                            <div class="p-15 border-bottom">
                                <h6 class="font-medium m-b-10">Pilih Tema</h6>
                                <div class="selectgroup layout-color w-50">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="1"
                                            class="selectgroup-input-radio select-layout" checked>
                                        <span class="selectgroup-button">Terang</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value" value="2"
                                            class="selectgroup-input-radio select-layout">
                                        <span class="selectgroup-button">Gelap</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="mini_sidebar_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Mini Sidebar</span>
                                    </label>
                                </div>
                            </div>
                            <div class="p-15 border-bottom">
                                <div class="theme-setting-options">
                                    <label class="m-b-0">
                                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                            id="sticky_header_setting">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="control-label p-l-10">Sticky Header</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="#">Copyright &copy; Rifqi</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>

    @if (request()->routeIs('datapaket'))
    <!-- Modal Form Tambah Data Paket -->
    <div class="modal fade" id="tambahDataPaketModal" tabindex="-1" role="dialog"
        aria-labelledby="tambahDataPaketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataPaketModalLabel">Tambah Data Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('tambahDP') }}">
                        @csrf
                        <div class="form-group">
                            <label>Kode Paket</label>
                            <input type="text" class="form-control" placeholder="Kode Paket" name="kode_paket" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" class="form-control" placeholder="Nama Paket" name="nama_paket" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Per Kg</label>
                            <input type="text" class="form-control" placeholder="Harga Per Kg" name="harga_per_kg"
                                pattern="\d*" title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="form-group">
                            <label>Waktu Per Hari</label>
                            <input type="text" class="form-control" placeholder="Waktu Per Hari" name="waktu"
                                pattern="\d*" title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Form Edit Data Paket -->
    @foreach ($dataPakets as $dataPaket)
    <div class="modal fade" id="editDataPaketModal{{ $dataPaket->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editDataPaketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataPaketModalLabel">Edit Data Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updateDP', $dataPaket->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Kode Paket</label>
                            <input type="text" class="form-control" placeholder="Kode Paket" name="kode_paket"
                                value="{{ $dataPaket->kode_paket }}" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Paket</label>
                            <input type="text" class="form-control" placeholder="Nama Paket" name="nama_paket"
                                value="{{ $dataPaket->nama_paket }}" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Per Kg</label>
                            <input type="text" class="form-control" placeholder="Harga Per Kg" name="harga_per_kg"
                                value="{{ $dataPaket->harga_per_kg }}" pattern="\d*"
                                title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="form-group">
                            <label>Waktu Per Hari</label>
                            <input type="text" class="form-control" placeholder="Waktu Per Hari" name="waktu"
                                value="{{ $dataPaket->waktu }}" pattern="\d*" title="Hanya angka yang diperbolehkan"
                                required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    @if (request()->routeIs('dataorder'))
    <!-- Modal Form Tambah Data Order -->
    <div class="modal fade" id="tambahDataOrderModal" tabindex="-1" role="dialog"
        aria-labelledby="tambahDataOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataOrderModalLabel">Tambah Data Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('tambahDO') }}">
                        @csrf
                        <div class="form-group">
                            <label>Kode Paket</label>
                            <select class="form-control" name="kode_paket" required>
                                <option value="" disabled selected>Pilih Kode Paket</option> <!-- Placeholder -->
                                @foreach ($dataPakets as $dataPaket)
                                <option value="{{ $dataPaket->kode_paket }}">{{ $dataPaket->kode_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama_pelanggan"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Berat Per Kg</label>
                            <input type="text" class="form-control" placeholder="Berat Per Kg" name="berat_per_kg"
                                pattern="\d*" title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form Edit Data Order -->
    @foreach ($dataOrders as $dataOrder)
    <div class="modal fade" id="editDataOrderModal{{ $dataOrder->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editDataOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataOrderModalLabel">Edit Data Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updateDO', $dataOrder->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Kode Paket</label>
                            <select class="form-control" name="kode_paket" required>
                                @foreach ($dataPakets as $dataPaket)
                                <option value="{{ $dataPaket->kode_paket }}" {{ $dataPaket->kode_paket ===
                                    $dataOrder->kode_paket ? 'selected' : '' }}>
                                    {{ $dataPaket->kode_paket }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama_pelanggan"
                                value="{{ $dataOrder->nama_pelanggan }}" required>
                        </div>
                        <div class="form-group">
                            <label>Berat Per Kg</label>
                            <input type="text" class="form-control" placeholder="Berat Per Kg" name="berat_per_kg"
                                value="{{ $dataOrder->berat_per_kg }}" pattern="\d*"
                                title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Detail Transaksi -->
    <div class="modal fade" id="detailTransaksiModal" tabindex="-1" role="dialog"
        aria-labelledby="detailTransaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailTransaksiModalLabel" style="font-size: 25px;">Detail Transaksi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body-detail-transaksi">
                    <table style="font-size: 20px;">
                        <tr>
                            <td style="font-weight: bold;">Nomor Order</td>
                            <td>:</td>
                            <td><span id="detail-no-order"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Nama Pelanggan</td>
                            <td>:</td>
                            <td><span id="detail-nama-pelanggan"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Kode Paket</td>
                            <td>:</td>
                            <td><span id="detail-kode-paket"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Harga Per Kg</td>
                            <td>:</td>
                            <td><span id="detail-harga-per-kg"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Berat Per Kg</td>
                            <td>:</td>
                            <td><span id="detail-berat-per-kg"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Total</td>
                            <td>:</td>
                            <td><span id="detail-total"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Tanggal Order</td>
                            <td>:</td>
                            <td><span id="detail-tanggal-order"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Tanggal Diambil</td>
                            <td>:</td>
                            <td><span id="detail-tanggal-ambil"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Status</td>
                            <td>:</td>
                            <td><span id="detail-status"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    @endif
    @if (request()->routeIs('dataambil'))
    <!-- Modal Detail Transaksi -->
    <div class="modal fade" id="detailTransaksiModal" tabindex="-1" role="dialog"
        aria-labelledby="detailTransaksiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailTransaksiModalLabel" style="font-size: 25px;">Detail Transaksi
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body-detail-transaksi">
                    <table style="font-size: 20px;">
                        <tr>
                            <td style="font-weight: bold;">Nomor Order</td>
                            <td>:</td>
                            <td><span id="detail-no-order"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Nama Pelanggan</td>
                            <td>:</td>
                            <td><span id="detail-nama-pelanggan"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Kode Paket</td>
                            <td>:</td>
                            <td><span id="detail-kode-paket"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Harga Per Kg</td>
                            <td>:</td>
                            <td><span id="detail-harga-per-kg"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Berat Per Kg</td>
                            <td>:</td>
                            <td><span id="detail-berat-per-kg"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Total</td>
                            <td>:</td>
                            <td><span id="detail-total"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Tanggal Order</td>
                            <td>:</td>
                            <td><span id="detail-tanggal-order"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Tanggal Diambil</td>
                            <td>:</td>
                            <td><span id="detail-tanggal-diambil"></span></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Status</td>
                            <td>:</td>
                            <td><span id="detail-status"></span></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="print-detail-transaksi">Print</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (request()->routeIs('datainven'))
    <!-- Modal Form Tambah Data Inventaris -->
    <div class="modal fade" id="tambahDataInventarisModal" tabindex="-1" role="dialog"
        aria-labelledby="tambahDataInventarisModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataInventarisModalLabel">Tambah Data Inventaris</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('tambahDI') }}">
                        @csrf
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Harga Barang</label>
                            <input type="text" class="form-control" placeholder="Harga Barang" name="harga_barang"
                                pattern="\d*" title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="text" class="form-control" placeholder="Jumlah Barang" name="jumlah_barang"
                                pattern="\d*" title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form Edit Data Inventaris -->
    @foreach ($dataInvens as $DataInventaris)
    <div class="modal fade" id="editDataInventarisModal{{ $DataInventaris->id }}" tabindex="-1" role="dialog"
        aria-labelledby="editDataPaketModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataInventarisModalLabel">Edit Data Inventaris</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('updateDI', $DataInventaris->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang"
                                value="{{ $DataInventaris->nama_barang }}" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Barang</label>
                            <input type="text" class="form-control" placeholder="Harga Barang" name="harga_barang"
                                value="{{ $DataInventaris->harga_barang }}" pattern="\d*"
                                title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="text" class="form-control" placeholder="Jumlah Barang" name="jumlah_barang"
                                value="{{ $DataInventaris->jumlah_barang }}" pattern="\d*"
                                title="Hanya angka yang diperbolehkan" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif


    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="assets/bundles/prism/prism.js"></script>
    <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
    <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/jszip.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
    <script src="assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
    <script src="assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>
    <script src="assets/js/page/datatables.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>

    <script>
        var printButton = document.getElementById('print-detail-transaksi');
        if (printButton) {
            printButton.addEventListener('click', function () {
                var printWindow = window.open('', '', 'width=800,height=900');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Detail Transaksi</title>');

                // CSS untuk mengatur zoom saat mencetak
                printWindow.document.write('<style>');
                printWindow.document.write(`
                table.center-table {
                    margin: 0 auto;
                    width: 50%;
                    border-collapse: collapse;
                }

                table.center-table td, table.center-table th {
                    border: 1px solid #000;
                    padding: 8px;
                    text-align: left;
                }

                /* Mengatur zoom saat mencetak */
                @media print {
                    table.center-table {
                        width: 100%;
                        font-size: 30px; /* Sesuaikan dengan ukuran teks yang Anda inginkan */
                        /* Isi nilai zoom sesuai kebutuhan Anda, contohnya 75% */
                        transform: scale(0.75);
                        transform-origin: top;
                    }

                    h5 {
                        text-align: center;
                        font-size: 30px; /* Sesuaikan dengan ukuran teks yang Anda inginkan */
                    }
                }
            `);
                printWindow.document.write('</style>');

                printWindow.document.write('</head><body>');
                // Memposisikan judul di tengah
                printWindow.document.write('<center><h5>Data Order</h5></center>');
                printWindow.document.write('<table class="center-table">');
                printWindow.document.write('<tr><td>Nomor Order</td><td><b>' + document.getElementById('detail-no-order').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Nama Pelanggan</td><td><b>' + document.getElementById('detail-nama-pelanggan').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Kode Paket</td><td><b>' + document.getElementById('detail-kode-paket').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Harga Per Kg</td><td><b>' + document.getElementById('detail-harga-per-kg').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Berat Per Kg</td><td><b>' + document.getElementById('detail-berat-per-kg').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Total</td><td><b>' + document.getElementById('detail-total').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Tanggal Order</td><td><b>' + document.getElementById('detail-tanggal-order').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Tanggal Diambil</td><td><b>' + document.getElementById('detail-tanggal-diambil').textContent + '</b></td></tr>');
                printWindow.document.write('<tr><td>Status</td><td><b>' + document.getElementById('detail-status').textContent + '</b></td></tr>');
                printWindow.document.write('</table>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
                printWindow.close();
            });
        }
    </script>


    <script>
        $('.delete-data-paket').click(function () {
            var dataId = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/datapaket/hapus/' + dataId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success').then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        }
                    });
                }
            });
        });

        $('.delete-data-order').click(function () {
            var dataId = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/dataorder/hapus/' + dataId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success').then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        }
                    });
                }
            });
        });

        $('.delete-data-inven').click(function () {
            var dataId = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/datainven/hapus/' + dataId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success').then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        }
                    });
                }
            });
        });

        $('.update-status-order').click(function () {
            var dataId = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin order sudah ready?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/dataorder/update_status/' + dataId,
                        type: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: 'Ready'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire('Berhasil!', 'Status order telah diubah menjadi Ready.', 'success').then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat mengubah status order.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat mengirim permintaan.', 'error');
                        }
                    });
                }
            });
        });

        $('.update-status-ambil').click(function () {
            var dataId = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin order sudah Completed?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/dataambil/update_status/' + dataId,
                        type: 'PUT',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: 'Completed'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire('Berhasil!', 'Status order telah diubah menjadi Completed.', 'success').then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat mengubah status order.', 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error!', 'Terjadi kesalahan saat mengirim permintaan.', 'error');
                        }
                    });
                }
            });
        });

        $('.detail-transaksi-order').click(function () {
            var dataId = $(this).data('id');
            var dataOrders = @json($dataOrders ?? []);
            var dataPakets = @json($dataPakets ?? []);
            var dataOrder = dataOrders.find(order => order.id === dataId);

            if (dataOrder) {
                $('#detail-no-order').text(dataOrder.no_order);
                $('#detail-kode-paket').text(dataOrder.kode_paket);
                $('#detail-nama-pelanggan').text(dataOrder.nama_pelanggan);
                $('#detail-berat-per-kg').text(dataOrder.berat_per_kg);
                $('#detail-tanggal-order').text(formatDate(dataOrder.created_at));
                $('#detail-tanggal-ambil').text(dataOrder.tanggal_ambil);
                $('#detail-status').text(dataOrder.status);

                var dataPaket = dataPakets.find(paket => paket.kode_paket === dataOrder.kode_paket);

                if (dataPaket) {
                    $('#detail-harga-per-kg').text("RP " + dataPaket.harga_per_kg.toLocaleString());
                    // $('#detail-harga-per-kg').text(dataPaket.harga_per_kg);
                    $('#detail-total').text("RP " + (dataOrder.berat_per_kg * dataPaket.harga_per_kg).toLocaleString());
                    $('#detailTransaksiModal').modal('show');
                }
            }
        });

        $('.detail-transaksi-ambil').click(function () {
            var dataId = $(this).data('id');
            var dataOrders = @json($dataOrders ?? []);
            var dataPakets = @json($dataPakets ?? []);
            var dataOrder = dataOrders.find(order => order.id === dataId);

            if (dataOrder) {
                $('#detail-no-order').text(dataOrder.no_order);
                $('#detail-kode-paket').text(dataOrder.kode_paket);
                $('#detail-nama-pelanggan').text(dataOrder.nama_pelanggan);
                $('#detail-berat-per-kg').text(dataOrder.berat_per_kg);
                $('#detail-tanggal-order').text(formatDate(dataOrder.created_at));
                $('#detail-tanggal-diambil').text(dataOrder.Diambil);
                $('#detail-status').text(dataOrder.status);

                var dataPaket = dataPakets.find(paket => paket.kode_paket === dataOrder.kode_paket);

                if (dataPaket) {
                    $('#detail-harga-per-kg').text("RP " + dataPaket.harga_per_kg.toLocaleString());
                    $('#detail-total').text("RP " + (dataOrder.berat_per_kg * dataPaket.harga_per_kg).toLocaleString());
                    $('#detailTransaksiModal').modal('show');
                }
            }
        });

        function formatDate(dateString) {
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
        $('.cetak-order').click(function () {
            var dataId = $(this).data('id');
            var dataOrders = @json($dataOrders ?? []);
            var dataPakets = @json($dataPakets ?? []);
            var dataOrder = dataOrders.find(order => order.id === dataId);

            if (dataOrder) {
                var printWindow = window.open('', '', 'width=800,height=900');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Detail Transaksi</title>');

                // CSS untuk mengatur zoom saat mencetak
                printWindow.document.write('<style>');
                printWindow.document.write(`
            table.center-table {
                margin: 0 auto;
                width: 50%;
                border-collapse: collapse;
            }

            table.center-table td, table.center-table th {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }

            /* Mengatur zoom saat mencetak */
            @media print {
                table.center-table {
                    width: 100%;
                    font-size: 30px; /* Sesuaikan dengan ukuran teks yang Anda inginkan */
                    /* Isi nilai zoom sesuai kebutuhan Anda, contohnya 75% */
                    transform: scale(0.75);
                    transform-origin: top;
                }

                h5 {
                    text-align: center;
                    font-size: 30px; /* Sesuaikan dengan ukuran teks yang Anda inginkan */
                }
            }
        `);
                printWindow.document.write('</style>');

                printWindow.document.write('</head><body>');
                // Memposisikan judul di tengah
                printWindow.document.write('<center><h5>Data Order</h5></center>');
                printWindow.document.write('<table class="center-table">');
                printWindow.document.write('<tr><td>Nomor Order</td><td><b>' + dataOrder.no_order + '</b></td></tr>');
                printWindow.document.write('<tr><td>Nama Pelanggan</td><td><b>' + dataOrder.nama_pelanggan + '</b></td></tr>');
                printWindow.document.write('<tr><td>Kode Paket</td><td><b>' + dataOrder.kode_paket + '</b></td></tr>');

                // Ambil harga per kg dan berat per kg dari dataPakets
                var dataPaket = dataPakets.find(paket => paket.kode_paket === dataOrder.kode_paket);
                if (dataPaket) {
                    var hargaPerKg = dataPaket.harga_per_kg;
                    var beratPerKg = dataOrder.berat_per_kg;
                    var total = hargaPerKg * beratPerKg;

                    printWindow.document.write('<tr><td>Harga Per Kg</td><td><b>RP ' + hargaPerKg.toLocaleString() + '</b></td></tr>');
                    printWindow.document.write('<tr><td>Berat Per Kg</td><td><b>' + beratPerKg + '</b></td></tr>');
                    printWindow.document.write('<tr><td>Total</td><td><b>RP ' + total.toLocaleString() + '</b></td></tr>');
                }

                printWindow.document.write('<tr><td>Tanggal Order</td><td><b>' + formatDate(dataOrder.created_at) + '</b></td></tr>');
                printWindow.document.write('<tr><td>Tanggal Diambil</td><td><b>' + dataOrder.tanggal_ambil + '</b></td></tr>');
                printWindow.document.write('<tr><td>Status</td><td><b>' + dataOrder.status + '</b></td></tr>');
                printWindow.document.write('</table>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
                printWindow.close();
            }
        });
    </script>
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            coext: 'Ok'
        });
    </script>
    @endif
    @if($errors->any())
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ $errors->first() }}',
            icon: 'error',
            confinText: 'Ok'
        });
    </script>
    @endif


</body>

</html>