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
                            <a href="javascript:;" class="btn btn-danger minus" onclick="GetMenus(1);" id="getmenus">-</a>
                        </span> --}}
                        {{-- <form id="getMenus" onsubmit="return false" class="d-flex" method="post"> --}}
                            <input type="number" value="1" min="1" name="qty" id="qrty" data-id="{{$enum->id}}" class="form-control mx-1 w-25">
                            <span>
                                <button type="button" class="btn btn-info" id="getmenus">Add Cart</button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
@endsection
@section('script')
<script>
    var menus = {}
    $('body #getmenus').on('click', function(){
        console.log(this);
        // var menus = {
        //     'id': $('#qrty').data('id'),
        //     'qty': $('#qrty').val()
        // };
        console.log(menus)
    });
</script>
    
@endsection