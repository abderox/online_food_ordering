@extends('layout.master')
@section('content')
    @foreach ($plats as $plats)
        <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
            <h5 class="mb-0">{{$plats->nom_plat}}</h5>
            <div class="mb-1 text-muted">    
                @if($plats->status_islamic== 1)
                islamic 
           @endif
           @if($plats->status_meal== 1)
               meal 
           @endif
              @if($plats->status_drink== 1)
              drink
             @endif
             @if($plats->status_vegan== 1)
             vegan 
             @endif
             @if($plats->status_dessert== 1)
             dessert
             @endif
            </div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <p class="mb-auto">Price :{{$plats->price}} DHS</p>

            <a href="{{route('plats.show',$plats->id)}}"class="stretched-link btn "         style="background-color:#ffdf6b	;"
                ><i class="fa fa-location-arrow" aria-hidden="true"></i> Consulter plat</a>            </div>
            <div class="col-auto  d-lg-block" style="width: 200" style="height: 250">
                  <img  class="img-responsive" src="images/{{$plats->file_path}}" alt="image" >

            </div>
        </div>
        </div>
    @endforeach    
@endsection
