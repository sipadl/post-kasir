@extends('template.main')
@section('content')
@section('style')
<style>
    .list-group .list-group-item{
        border-radius: 12px;
    }
</style>
@endsection
<div class="p-4">
    <ul class="list-group">
        <li class="list-group-item mb-2">
            <div class="d-flex justify-content-between">
                <div class="right-side w-100">
                    <div class="d-flex">
                        <img src="https://pondokindahmall.co.id/assets/img/default.png" width="64px" height="64px" alt="">
                        <div class="detail px-2 py-1">
                        <p>
                            Nama Makanan<br>    
                            Harga<br>
                            Stock
                        </p>
                        </div>
                    </div>
                </div>
                <div class="left-side w-50 align-self-end">
                    <div class="d-flex pb-2 justify-content-end">
                        <span class="btn btn-danger">-</span>
                        <input type="number" value="1" min="1" name="qty" class="form-control mx-1 w-25">
                        <span class="btn btn-info">+</span>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
@endsection