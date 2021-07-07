@extends('layout.master')
@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>

@endsection
@section('content')
    <div class="col-md-12">
        <h1>
            Page de paiement
          
            
           
        <form action="/charge" method="POST">
            {{ csrf_field() }}
            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ env('STRIPE_PUB_KEY') }}"
                    data-amount={{(float)(Cart::total())*10}}
                    data-name="Payament"
                    data-description="..."
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-currency="usd">
            </script>
            <input type="hidden" name="payer" value="{{(float)(Cart::total())*10}}">
        </form>
     
@endsection