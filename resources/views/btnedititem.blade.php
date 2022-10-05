<button class="btn btn-success" id="edit{{$selected->id_barang}}" >
    Edit
</button>

<script>
    $('#edit{{$selected->id_barang}}').click(function (e) {
        $('#item').val("{{$selected->nama_barang}}");
        $('#deskripsi').val("{{$selected->deskripsi}}");
        $('#picture').attr('src',"GambarProduk/{{$selected->gambar_barang}}")
        $('#berat').val({{$selected->berat}});
        $('#harga').val({{$selected->harga}});
    });
</script>
