@extends('template.main')
@section('content')
@section('style')
{{-- Style --}}
@endsection
<ul class="list-group" id="keranjang">
    
</ul>

@section('script')
<script>
    var j = window.location.pathname.split('/');
    k = j[3];
    var Pondel = {
        aa:(isi) => {
            return `
            <li class="list-group-item my-1 border">
                <div class="d-flex justify-content-between">
                <div class="right-side w-100">
                    <div class="d-flex">
                        <img src="${isi.items[0].img}" width="64px" height="64px" alt="">
                        <div class="detail px-2 py-1">
                            <h5>${isi.items[0].nama}</h5>    
                            <p>
                                Rp ${isi.items[0].harga}<br>
                                qty : ${isi.qty}
                        </p>
                        </div>
                        </div>
                </div>
                <div class="left-side w-50 align-self-end">
                    <div class="d-flex pb-2 justify-content-end">
                            <span>
                                <a class="btn btn-info delete" id="delete" href="javascript:;" data-id="${isi.id}">Hapus</a>
                            </span>
                        </form>
                        </div>
                        </div>
                        </div>
                    </li>`
                },
            }
            $(document).ready(function() {
                $.post("{{ route('cart') }}", {kode: k},
                function (data) {
                    $('#qtyx').html(data.data.length +' items');
                    $('#bayar').html(`Rp ${data.total}`);
                        data.data.forEach(isi => {
                            $('#keranjang').append(Pondel.aa(isi));
                            });
                            $('body .delete').on('click', function() {
                                var p = $(this);
                                z = p.data('id');
                                $.post("{{ route('delete-cart')}}", {kode:k, id:z},
                                    function (data) {
                                        $.post("{{ route('cart') }}", {kode:k},
                                            function (data) {
                                                $('#keranjang').html('');
                                                $('#qtyx').html(data.data.length +' items');
                                                $('#bayar').html(`Rp ${data.total}`);
                                                    data.data.forEach(isi => {
                                                    $('#keranjang').append(Pondel.aa(isi));
                                                });  
                                            },
                                        );
                                    },
                                );
                            });
                        },
                    );
                });

    
</script>
@endsection
@endsection