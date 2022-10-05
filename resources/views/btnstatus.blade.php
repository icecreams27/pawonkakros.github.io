<button
@if ($selected->status_barang==1)class="btn btn-success" id="status{{$selected->id_barang}}" > Active
@else class="btn btn-danger" id="status{{$selected->id_barang}}" > Inactive
@endif
</button>
<script>
    $('#status{{ $selected->id_barang }}').click(function (e) {
        $.post('admin/status/{{$selected->id_barang}}',
            {
                "_token": "{{ csrf_token() }}",
            }
            ,
            function (data) {
                console.log(data);
                data = $.parseJSON(data);
                alert(data.message);
            }
            );
        var tipe = $('#jenis').val()
        var url = "{{ url('admin/loaditem/') }}";
        var table = $('#myTable').DataTable().ajax.url(url+"/"+tipe);
        $('#myTable').DataTable().ajax.reload();
    });
</script>
