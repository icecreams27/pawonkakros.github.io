@extends('mastertemplate')
@section('content')
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Add Type</h2>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Name Type" id="tipe" class="form-control" name="tipe" required data-error="Please enter name type">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Add Produk</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <table class="table header-border table-hover verticle-middle" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Id Produk</th>
                                <th scope="col">Tipe Produk</th>
                                {{-- <th scope="col">Action</th> --}}
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
    $(function () {
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin/loadtipe') }}",
            columns: [
                {data: 'id_produk', name: 'id_produk'},
                {data: 'tipe_produk', name: 'tipe_produk'},
            ]
        });
    });
    $('#submit').click(function (e)
    {
        var tipe = $('#tipe').val();
        $.post('admin/addtipe',
                    {
                        "_token": "{{ csrf_token() }}",
                        'tipe':tipe,
                    }
                    ,
                    function (data) {
                        console.log(data);
                        data = $.parseJSON(data);
                        alert(data.message);
                    }
                );
            $('#myTable').DataTable().ajax.reload();
    });
</script>
@endsection
