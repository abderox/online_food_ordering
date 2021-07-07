
   
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="contact/fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="contact/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="contact/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css"
        integrity="sha512-riZwnB8ebhwOVAUlYoILfran/fH0deyunXyJZ+yJGDyU0Y8gsDGtPHn1eh276aNADKgFERecHecJgkzcE9J3Lg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #map {
            height: 700px;
            width: 100%;
        }

    </style>



@extends('admin.dashlivreur')
@section('content')
    {{-- <div class="row">
        <div class="col-md-12 form-group justify-content-center">
         
        </div>
      </div> --}}
      <div class="container">
    <div class="container bg-light">
        <div class="col-md-12 text-center">
            <input type="button" id="btn"  value="Se localiser" class="btn btn-primary rounded-0 py-2 px-4">
            <span class="submitting"></span>
        </div>
    </div>



    <div class="col-md-12">
        <div class="" style="background-image: url('contact/images/map.jpg')">

            <div id="map"></div>

            <script async
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUq0T7xdrsPyrSyi84PdbSou4CIDMIow&callback=initMap">
            </script>


<div  class="container col-md-12 text-center">
  <h2 style="color:white;">Restaurants</h2>
</div>

<div class="container">
  <div class="col-md-12 text-center">
    @foreach ($orders as $order )
      <a id="btn"  href="../resto/{{$order->nom}}" class="btn btn-primary rounded-0 py-2 px-4">{{$order->nom}}</a>
      <span class="submitting"></span>
      @endforeach
  </div>

</div>
</div>

<script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key=AIzaSyAvUq0T7xdrsPyrSyi84PdbSou4CIDMIow&callback=initMap&libraries=places&region=GB'></script>
<script defer>
	function initialize() {
		var mapOptions = {
			zoom: 12,
			minZoom: 6,
			maxZoom: 17,
			zoomControl:true,
			zoomControlOptions: {
  				style:google.maps.ZoomControlStyle.DEFAULT
			},
			center: new google.maps.LatLng(31.660379, -8.021475),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			panControl:false,
			mapTypeControl:false,
			scaleControl:false,
			overviewMapControl:false,
			rotateControl:false
	  	}
		var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var image = new google.maps.MarkerImage("images/pin.png", null, null, null, new google.maps.Size(40,52));
        var places = @json($orders);
        for(place in places)
        {
            place = places[place];
            if(place.latitude && place.longitude)
            {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(place.latitude, place.longitude),
                    icon:image,
                    map: map,
                    title: place.name
                });
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', (function (marker, place) {
                    return function () {
                        infowindow.setContent(generateContent(place))
                        infowindow.open(map, marker);
                    }
                })(marker, place));
            }
        }
	}
	google.maps.event.addDomListener(window, 'load', initialize);
    function generateContent(place)
    {
        var content = `
            <div class="gd-bubble" style="">
                <div class="gd-bubble-inside">
                    <div class="geodir-bubble_desc">
                    <div class="geodir-bubble_image">
                        <div class="geodir-post-slider">
                            <div class="geodir-image-container geodir-image-sizes-medium_large ">
                                <div id="geodir_images_5de53f2a45254_189" class="geodir-image-wrapper" data-controlnav="1">
                                    <ul class="geodir-post-image geodir-images clearfix">
                                        <li>
                                            <div class="geodir-post-title">
                                                <h4 class="geodir-entry-title">
                                                    <a href="">`+place.nom+`</a>
                                                </h4>
                                            </div>
                                            <a href="" class="align size-medium_large" width="1400" height="930"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="geodir-bubble-meta-side">
                    <div class="geodir-output-location">
                    <div class="geodir-output-location geodir-output-location-mapbubble">
                        <div class="geodir_post_meta  geodir-field-post_title"><span class="geodir_post_meta_icon geodir-i-text">
                            <i class="fas fa-minus" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Place Title: </span></span>`+place.phone_number+`</div>
                        <div class="geodir_post_meta  geodir-field-address" itemscope="" itemtype="http://schema.org/PostalAddress">
                            <span class="geodir_post_meta_icon geodir-i-address"><i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                            <span class="geodir_post_meta_title">Address: </span></span><span itemprop="streetAddress">`+place.address+`</span>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            </div>`;
    return content;
    }
</script>

            
            <script src="contact/js/jquery-3.3.1.min.js"></script>
            <script src="contact/js/popper.min.js"></script>
            <script src="contact/js/bootstrap.min.js"></script>
            <script src="contact/js/jquery.validate.min.js"></script>
            <script src="contact/js/main.js"></script>
            @endsection

