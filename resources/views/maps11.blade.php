<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
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
</head>

<body>


    {{-- <div class="row">
        <div class="col-md-12 form-group justify-content-center">
         
        </div>
      </div> --}}
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


            <script>
            




let map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 6,
  });
  infoWindow = new google.maps.InfoWindow();
  const locationButton = document.createElement("button");
  locationButton.textContent = "Pan to Current Location";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  var options={
        center: { lat:38.3452 , lng:  -0.481006},
        zoom: 15
    }
   
  
  document.getElementById("btn").addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
 
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

               
               
            </script>
            
            <script src="contact/js/jquery-3.3.1.min.js"></script>
            <script src="contact/js/popper.min.js"></script>
            <script src="contact/js/bootstrap.min.js"></script>
            <script src="contact/js/jquery.validate.min.js"></script>
            <script src="contact/js/main.js"></script>
</body>

</html>
