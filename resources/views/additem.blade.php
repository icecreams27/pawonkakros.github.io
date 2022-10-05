@extends('mastertemplate')
@section('content')
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Add Item</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="admin/additem" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <select class="form-control" name="jenis" id="jenis" placeholder="Pilih tipe item">
                                                @foreach ($tipe as $item)
                                                    <option value="{{$item->id_produk}}">{{$item->tipe_produk}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Name Item" id="item" class="form-control" name="item" required data-error="Please enter name type">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Description Item" id="deskripsi" class="form-control" name="deskripsi" required data-error="Please enter dekscription item">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Rp.000" id="harga" class="form-control" name="harga" required data-error="Please enter price">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Weight (Gram)" id="berat" class="form-control" name="berat" required data-error="Please enter weight">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" placeholder="Picture Item" id="gambar" class="form-control" name="gambar"  data-error="Please enter file type">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <img src="" style="width: 500px; width: 108px" class="logo" alt="" id="picture">
                                        </div>

                                        @if (Session::has('sukses'))
                                        <strong style="color: green;">{{ Session::get('sukses') }}</strong> </br/>

                                        @elseif(Session::has('error'))
                                            <strong style="color: red;">{{ Session::get('error') }}</strong> </br>
                                        @endif
                                        <div class="submit-button text-center">
                                            <button class="btn hvr-hover" id="submit" type="submit">Add Product</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <table class="table header-border table-hover verticle-middle" id="myTable">
                        <thead>
                            <tr>
                                {{-- <th scope="col">Nama barang</th>
                                <th scope="col">Jumlah</th> --}}
                                <th scope="col">Nama barang</th>
                                <th scope="col">Harga</th>
                                <th>Edit</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script>

// $('#price').keyup(function () {
//     var harga = $('#harga').val();
//     if (harga== null) {
//         $('#price').val();
//     }else {
//         harga=null;
//         harga = $('#harga').val($('#price').val());
//     }
// });

$('#jenis').change(function() {
    var tipe = $(this).val()
    var url = "{{ url('admin/loaditem/') }}";
    var table = $('#myTable').DataTable().ajax.url(url+"/"+tipe);
    $('#myTable').DataTable().ajax.reload();
})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#picture').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$('#gambar').change(function() {
    readURL(this);
})

$(function () {
    var table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/loaditem/TP_000') }}",
        columns: [
            // {data: 'id_barang', name: 'id_barang'},
            // {data: 'id_produk', name: 'id_produk'},
            {data: 'nama_barang', name: 'nama_barang'},
            {data: 'harga', name: 'harga'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
            {
                data: 'edit',
                name: 'edit',
                orderable: true,
                searchable: true
            },
        ]
    });
});
</script>
@endsection
