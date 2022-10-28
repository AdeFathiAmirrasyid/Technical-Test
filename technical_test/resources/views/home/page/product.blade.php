@extends('home.main.main')

@section('container')
    <section class="home-section">
        <div class="text-title">
            <div class="row bg-table-white" style="margin-top: 100px">
                @if (session()->has('success'))
                    <div class="mx-5 alert alert-success col-lg-6 fs-6 mt-3" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="mx-5 alert alert-success col-lg-6 fs-6 mt-3" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="table-padding">
                    <div class="row justify-content-start">
                        <div class="col title-slideshow mt-2">
                            <p>Tambah Barang</p>
                        </div>
                        <div class="col-md-4 mt-2">
                            <a href="#addProduct" data-bs-toggle="modal" role="button" class="btn-create"><i
                                    class="bi bi-plus"></i><span>Permintaan Barang</span></a>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped table-hover mt-2">
                        <thead class="bg-table">
                            <tr>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="td-width">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="th-table">
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="addProduct">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #294b9b;">
                    <h1 class="modal-title fs-5" style="color: #fff">Tambah Permintaan Barang</h1>
                </div>
                <form id="addFormBarang" action="/tambah-barang" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nik">NIK Peminta : </label>
                                <select id="filter-departemen" class="form-select" onchange="infoChange()">
                                    <option selected disabled>Pilih NIK..</option>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $user->nik }}">{{ $user->nik }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mt-3" id="demo">
                                <div class="col-md-4">
                                    <label for="nama">Nama : </label>
                                    <input id="namaField" type="text" name="nama" value="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="departemen">Departemen : </label>
                                    <input type="text" name="departemen" value="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="tgl_permintaan">Tanggal Permintaan : </label>
                                    <input type="date" name="tgl_permintaan" value="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="mt-5"><span
                                style="font-family: Merriweather; font-weight: 700; font-size: 20px">Daftar Barang</span>
                        </div>
                        <div class="container mt-3">
                            <div class="row bt-table">
                                <div class="col" style="width: 10%">Barang</div>
                                <div class="col" style="width: 10%">Lokasi</div>
                                <div class="col" style="width: 10%">Tersedia</div>
                                <div class="col" style="width: 10%">Quantity</div>
                                <div class="col" style="width: 10%">Satuan</div>
                                <div class="col" style="width: 10%">Keterangan</div>
                                <div class="col" style="width: 10%">Status</div>
                                <div class="col" style="width: 10%">Action</div>
                            </div>
                            <div class="row" id="add-data">

                            </div>
                        </div>
                        <div id="add-form-data" class="btn-add mt-5"><i class="bi bi-plus"></i><span>Tambah</span></div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="proses-action" class="btn-proses">Proses</button>
                        <button type="button" class="btn-batal" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/html" id="addChild">
        <div  class="d-flex remove-form">
            <div style="width: 17%;" class="mt-3">
                <select class="form-select" id="filter-barang-{0}"  onchange="infoModal({0})">
                    <option selected disabled>Pilih</option>
                    @foreach ($daftarProducts as $daftarProduct)
                        <option value="{{$daftarProduct->id}}">{{$daftarProduct->nama_barang}}</option>                        
                    @endforeach
                </select>
            </div>
            <div class="d-flex mt-3" id="demo-barang{0}">
                <div class="col mx-4" style="width: 15%;">
                    <input type="text" class="form-control" value="" name="location">
                </div>
                <div class="col mx-4" style="width: 15%;">
                    <input type="text" class="form-control" value="" name="stok">
                </div>
                <div class="col mx-4" style="width: 15%;">
                    <input type="text" class="form-control" value="" name="quantity">
                </div>
                <div class="col mx-4" style="width: 15%;">
                    <input type="text" class="form-control" value="" name="satuan">
                </div>
                <div class="col mx-4" style="width: 15%;">
                    <input type="text" class="form-control" value="" name="desc">
                </div>
                <div class="col mx-4" style="width: 10%;">
                    <input type="text" class="form-control" value="" name="status">
                </div>
                <div class="col mx-4">
                    <span class="input-group-text btn-remove-js" id="remove"><i class="bi bi-x-lg"></i></span>
                </div>
            </div>
        </div>
    </script>

    @include('home.partials.script')
    <script>
        function infoModal(counter) {
            const filter = document.getElementById("filter-barang-" + counter).value;
            const currentUrl = window.location.pathname;
            $.ajax({
                url: currentUrl,
                success: function(data) {
                    let dataBarang = data.dataBarang;
                    let result = [];
                    Object.keys(dataBarang).forEach((key) => {
                        if (dataBarang[key].id == filter) {
                            result.push(dataBarang[key]);
                        }
                    });
                    $output = "";
                    $("#demo-barang").html("");
                    if (result.length > 0) {
                        result.forEach((item, value) => {
                            if (item.id) {
                                $output += `
                                <div class="col mx-4">
                                    <input id="locationField" type="text" class="form-control" value="` + item.lokasi + `" name="location">
                                </div>
                                <div class="col mx-4">
                                    <input id="stokField" type="text" class="form-control" value="` + item.tersedia + `" name="stok">
                                </div>
                                <div class="col mx-4">
                                    <input id="qtyField" type="text" class="form-control" name="quantity">
                                </div>
                                <div class="col mx-4">
                                    <input id="satuanField" type="text" class="form-control" value="` + item.satuan + `" name="satuan">
                                </div>
                                <div class="col mx-4">
                                    <input id="descField" type="text" class="form-control" value="" name="decs">
                                </div>
                                <div class="col mx-4">
                                    <input id="statusField" type="text" class="form-control" value="` + item.status + `" name="status">
                                </div>
                                <div class="col mx-4">
                                    <span class="input-group-text btn-remove-js" id="remove"><i class="bi bi-x-lg"></i></span>
                                </div>
                                `;
                            }
                        });
                    }
                    $("#demo-barang" + counter).html($output);
                },
            });
        }
        // GLOBAL SETUP
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // PROSES SIMPAN
        $('#addFormBarang').on('submit', function(e) {
            e.preventDefault();
            var nik = $('#filter-departemen').val();
            var name = $('#namaField').val();
            var departemen = $('#departemenField').val();
            var tgl_permintaan = $('#tgl_permintaanField').val();


            var nama_barang = $('#filter-barang-1').val();
            var location = $('#locationField').val();
            var stok = $('#stokField').val();
            var qty = $('#qtyField').val();
            var satuan = $('#satuanField').val();
            var decs = $('#descField').val();
            var status = $('#statusField').val();
            $('#proses-action').html('Processing...').attr('disabled', 'disabled');
            $.ajax({
                url: '/tambah-barang',
                type: "POST",
                dataType: "json",
                data: {
                    nik,
                    name,
                    departemen,
                    tgl_permintaan,
                    nama_barang,
                    location,
                    stok,
                    qty,
                    satuan,
                    decs,
                    status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.dir(response)
                    $('#proses-action').html('Proces').removeAttr('disabled');
                    window.location.reload(true);
                },
                error: function(response) {
                    $('#proses-action').html('Proces').removeAttr('disabled');
                }
            });
        });

        function infoChange() {
            const filter = document.getElementById("filter-departemen").value;
            const currentUrl = window.location.pathname;
            $.ajax({
                url: currentUrl,
                success: function(data) {
                    let dataUser = data.dataUsers;

                    let result = [];
                    Object.keys(dataUser).forEach((key) => {
                        if (dataUser[key].nik == filter) {
                            result.push(dataUser[key]);
                        }
                    });

                    $output = "";
                    $("#demo").html("");
                    if (result.length > 0) {
                        result.forEach((item, value) => {
                            if (item.nik) {
                                $output += `
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nama">Nama : </label>
                                        <input id="namaField" type="text" name="name" value="` + item.name + `" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="departemen">Departemen : </label>
                                        <input id="departemenField" type="text" name="departemen" value="` + item
                                    .departemen + `" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tgl_permintaan">Tanggal Permintaan : </label>
                                        <input id="tgl_permintaanField" type="date" name="tgl_permintaan" value="" class="form-control">
                                    </div>
                                </div>
                                `;
                            }
                        });
                    }
                    $("#demo").html($output);
                },
            });
        }
    </script>
@endsection
