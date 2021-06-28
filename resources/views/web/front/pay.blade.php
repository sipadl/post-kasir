@extends('template.main')
@section('content')
@section('style')
<style>
/* input[type="radio"]{
  visibility: hidden;
  height: 0;
  width: 0;
} */
</style>
@endsection
<div class="row">
    <div class="d-flex justify-content-center">
        <div class="">
            <h4 class="">Support Payment Method</h4>
            <br>
            <hr class="my-2 mx-4">
            @foreach($bank as $ap)
            <div class="card w-100 mb-2" style="border-radius:12px;">
                    <div class="d-flex p-2 align-items-center w-100">
                        <div class="p-2">
                            <input type="radio" name="type" id="banks" value="{{$ap->id}}">
                        </div>
                        <div class="img-banks">
                            <img class="img-thumbnail" style="border-radius:12px;" width="64px" height="64px;" src="{{ $ap->img_bank }}" alt="">       
                        </div>    
                        <div class="mx-5">
                            <h5>Bank Rakyat Indonesia</h5>    
                        </div> 
                    </div>
                </div>
                @endforeach
                <div class="card w-100 mb-2" style="border-radius:12px;">
                    <div class="d-flex p-2 align-items-center w-100">
                        <div class="p-2">
                            <input type="radio" name="type" id="banks" value="999">
                        </div>
                        <div class="img-banks">
                            <img class="img-thumbnail" style="border-radius:12px;" width="64px" height="64px;" src="https://image.freepik.com/free-vector/cash-hand-businessman-logo-white_269543-105.jpg" alt="">       
                        </div>    
                        <div class="mx-5">
                        <h5>Cash On Cashier</h5>    
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('#barcode').on('click', () => {
      var uri = window.location.origin;
      var p =  window.location.pathname.split('/');
      var x = $("input[name='type']:checked").val();

      $.post("{{ route('detail-orders') }}", {kode:p[2] , bank:x},
          function (data) {
            console.log(data)  
            window.location.replace(`${uri}/barcode/${data.kode}`)
          },
      );
    })
</script>
@endsection