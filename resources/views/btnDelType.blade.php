<button class="btn btn-success" id="id{{$selected->id_produk}}" >
    Edit
</button>

<script>
    $('#id{{ $selected->id_produk }}').click(function (e) {

        $('#tipe').val("{{$selected->tipe_produk}}");
    });
</script>
