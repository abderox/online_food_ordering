@extends('layout.master1')
@section('content')
    <div class="col-md-12">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h5 class="mb-0">{{ $plats->nom_plat }}</h5>
            <hr>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <strong class="mb-auto font-weight-normal text-secondary">Price :{{ $plats->price }} DHS</strong>
            <form action="{{route('cart.store')}}" method="POST">
                @csrf
                <input type="hidden" name="plat_id" value="{{$plats->id}}">
                <button type="submit" class="stretched-link btn "         style="background-color:#ffdf6b	;"
                ><i class="fa fa-location-arrow" aria-hidden="true"></i> Ajouter au panier</a>
            </form>
        </div>
        <div class="col-auto  d-lg-block">
            <img  class="img-responsive" src="../images/{{$plats->file_path}}" alt="image" >
        </div>
        </div>
    </div>
@endsection