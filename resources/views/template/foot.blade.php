
@if(Request::segment(1) != '')
@php
$p = Request::segment(2);
$d = Request::segment(3);
@endphp
<div class="fixed-bottom">
  <div class="d-flex justify-content-between bg-dark">
      <div class="nav-link left">
    @if(Request::segment(1) != 'waiting' AND Request::segment(1) != 'bayar' AND Request::segment(1) != 'barcode' )
          <h5 class="text-light my-2">Total : <span id="qtyx">0 Items</span></h5>
         @if($d)
          <h5 class="text-light my-2">Total Bayar : <span id="bayar">Rp 0</span></h5>
        @endif
    @endif
        </div>
      <div class="nav-link right p-3">
          @if($d)
          <a href="{{ route('web.menu',[$d])}}" class="btn btn-info text-light">  
              Kembali
          </a>
          <a href="{{ route('make-order',[$d])}}" class="btn btn-info text-light">  
              Proses
          </a>
          @else
            @if(Request::segment(1) == 'payment')
            <a href="{{ route('bayar',[$p])}}" class="btn btn-info text-light">  
                Bayar
            </a>
            @elseif(Request::segment(1) == 'waiting')
            <a href="{{ route('bayar',[$p])}}" class="btn btn-info text-light">  
                Pilih Metode Pembayaran
            </a>
            @else
                @if(Request::segment(1) == 'bayar')
                <button type="button" id="barcode" class="btn btn-info text-light">  
                    Lihat QR Code / Virtual Account
                </button>
                @else
                    @if(Request::segment(1) == 'barcode')
                    {{-- <a href="{{ route('tq',[$p])}}" class="btn btn-info text-light">  
                        Selesai
                    </a> --}}
                    @else
                    <a href="{{ route('li-cart',[$p])}}" class="btn btn-info text-light">  
                        Proses
                    </a>
                    @endif
                @endif
            @endif
          @endif
      </div>
  </div>
</div>
@endif
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @yield('script')
  </body> 
</html>
