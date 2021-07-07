@extends('layout.master')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<style>
    .svg-icon {
  width: 1.5em;
  height: 1.5em;
  margin-right: 0.4em;
}
</style>
    @if (Cart::count()>0)
        <div class="col-md-12">
                <div class="pb-5">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    
                                <!-- Shopping cart table -->
                                <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        
                                        <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach (Cart::content() as $item)
                                        <tr>
                                            <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img  class="img-responsive" src="{{$item->model->file_path}}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0">
                                                    <a href="#" class="text-dark d-inline-block align-middle">{{$item->model->nom_plat}}</a></h5>
                                                    <input type="hidden" name="idplat" value="{{$item->model->id_plat}}">
                                                    <span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                                                </div>
                                            </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong>{{$item->model->price}}</strong></td>
                                            <td class="border-0 align-middle"><strong>
                                                <select class="custom-select" class="quantity" name="qty" id="qty" data-id={{$item->rowId}}  >
                                                    @for($i=1;$i<=6;$i++)
                                                    <option value="{{$i}}" {{ $item->qty == $i ? 'selected' : ''}}>{{$i}}</option>
                                                 
                                                    @endfor 
                                           </select>    
                                            </strong></td>
                                            <td class="border-0 align-middle">
                                                <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-dark btn btn-danger">
                                                       <i class="fa fa-trash"></i>
       
                                                    </button>
                                                   </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                                </div>
                                <!-- End -->
                            </div>
                            </div>
                    
                            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                            <div class="col-lg-6">
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">get your localization</div>
                                <div class="p-4">
                                <p class="font-italic mb-4 " style="color: #ffffff!important;">Shipping and additional costs are calculated based on values you have entered.</p>
                                <div class="input-group mb-4 border rounded-pill p-2" style="border:none!important">
                                    <input type="text" placeholder="Allow location" aria-describedby="button-addon3" class="form-control border-0">
                                    <div class="input-group-append border-0">
                                        <form action="{{url('/insertaddord')}}" method="post" name="form1" id="form1">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id_client" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="lng" id="lng" value="">
                                            <input type="hidden" name="lalt" id="lalt" value="">
                                            
                                       
                                    <button id="button-addon3" onclick="getLocation()" type="button" class="btn btn-dark px-4 rounded-pill" style="background-color: #00a65a!important;"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                      </svg></button>
                                    </form>
                                    </div>
                                    <script>
                                        var x = document.getElementById("button-addon3");
                                        
                                        function getLocation() {
                                          if (navigator.geolocation) {
                                            navigator.geolocation.getCurrentPosition(showPosition);
                                       
                                          } else { 
                                            x.innerHTML = "Geolocation is not supported by this browser.";
                                          }
                                         
                                        }
                                        
                                        function showPosition(position) {
                                            console.log(position.coords.latitude)
                                            document.getElementById('lng').value=position.coords.longitude;
                                            console.log(position.coords.longitude)
                                            document.getElementById('lalt').value=position.coords.latitude;
                                            document.form1.submit();
                                      }
                                        
                                        
                                        </script>
                                </div>
                                </div>
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                                <div class="p-4">
                                <p class="font-italic mb-4"></p>
                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">detail de commande</div>
                                <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{Cart::subtotal()}} DHS</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>{{Cart::tax()}} DHS</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                        
                                    <h5 class="font-weight-bold">{{Cart::total()}} DHS</h5>
                                    </li>
                                </ul><a id="checkout-button" href="{{route('checkout.index')}}" class="btn btn-dark rounded-pill py-2 btn-block" style="background-color: #00a65a!important;" >Passer a la caisse</a>
                                </div>
                            </div>
                            </div>
                    
                        </div>
                </div>
  </div>
  @else
  <div class="col-md-12">
       <p>Votre panier est vide</p>
  </div>
  
    @endif

@endsection
@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
 /*  const x= document.querySelectorAll('#qty');
   console.log(x);
   Array.from(x).forEach(function(element){ 
        element.addEventListener('change', function () {
            const rowId = element.getAttribute('data-id');
            axios.patch('/panier/${rowId}',
                {    
                        qty: this.value     
                    })
            }). .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                         console.log(error);
                    });

        });

*/

var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
                element.addEventListener('change', function() {
                       console.log('nabil')
                 const rowId = element.getAttribute('data-id')
                 //   const productQuantity = element.getAttribute('data-productQuantity')
                    axios.patch(`/panier/${rowId}`, {
                                        quantity: this.value,
                                    //   productQuantity: productQuantity
                                    })
                                    .then(function (response) {
                                    //    console.log(response);
                                      window.location.href = '{{ route('cart.index') }}'
                                    })
                                    .catch(function (error) {
                                        console.log(error);
                                     window.location.href = '{{ route('cart.index') }}'
                                    });  
                })
          });
</script>

@endsection