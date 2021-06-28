@extends('template.main')
@section('content')
@section('style')
<style>
    .list-group .list-group-item{
        border-radius: 12px;
    }
</style>
@endsection
    <ul class="list-group">
        @foreach($menus as $enum)
        <li class="list-group-item my-3">
            <div class="d-flex justify-content-between">
                <div class="right-side w-100">
                    <div class="d-flex">
                        <img src="{{ $enum->img }}" width="64px" height="64px" alt="">
                        <div class="detail px-2 py-1">
                            <h5>{{$enum->nama}}</h5>    
                            <p>
                            {{'Rp '. number_format($enum->harga,0)}}<br>
                            {{'Stock '.$enum->stock }}
                        </p>
                        </div>
                    </div>
                </div>
                <div class="left-side w-50 align-self-end">
                    <div class="d-flex pb-2 justify-content-end">
                        {{-- <span >
                            <a href="javascript:;" class="btn btn-danger minus" data-id="{{ $enum->id }}">-</a>
                        </span> --}}
                        {{-- <form id="getMenus" onsubmit="return false" class="d-flex" method="post"> --}}
                            {{-- <input type="number" value="1" min="1" name="qty" id="qrty" class="form-control mx-1 w-25"> --}}
                            <span>
                                {{-- <a class="btn btn-info" href="javascript:;">Add Cart</a> --}}
                                <a class="btn btn-info plus" href="javascript:;" data-id="{{ $enum->id }}">+</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="mb-5"></div>
@endsection
@section('script')
<script>
    
    var j = window.location.pathname.split('/');
    k = j[2];

    $(document).ready( () => {
        $.post("{{ route('cart') }}", {kode: k},
              function (data) {
                  $('#qtyx').html(data.data.length + '   items');
              },
          );
    });

    $('body .plus').on('click', function() {
        var t = $(this);
        $.post("{{ route('add-cart') }}", { menu:t.data('id'), kode: k },
        function (data) {
        //   console.log(data);  
          $.post("{{ route('cart') }}", {kode: k},
              function (data) {
                  $('#qtyx').html(data.data.length + '   items');
              },
          );
        },
        );
    });
    </script>
    
@endsection