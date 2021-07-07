
      @extends('layout.masterpro')

      @section('content')

   <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="contact/fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="contact/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="contact/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css" integrity="sha512-riZwnB8ebhwOVAUlYoILfran/fH0deyunXyJZ+yJGDyU0Y8gsDGtPHn1eh276aNADKgFERecHecJgkzcE9J3Lg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<style>
  #map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
</style>
 
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-12">
          <div class="form h-100">
            <h3>Send us a message</h3>
            <form class="mb-5" method="post" id="contactForm"  action="{{url('/send')}}">
            	{{csrf_field()}}
              @if (Session::has('success'))
    <script>
        swal({
            title: "{!! Session::get('success')!!}" + "{!!  Session::put('success',null)!!}"
        });
    </script>
@endif
           
              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Name *</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Your name" value="{{$user['name']}}">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Email *</label>
                  <input type="text" class="form-control" name="email" id="email"  placeholder="Your email" value="{{$user['email']}}">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Phone</label>
                  <input type="text" class="form-control" name="phone_number" id="phone"  placeholder="Phone #" value="{{$user['phone_number']}}">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label">Company</label>
                  <input type="text" class="form-control" name="company" id="company"  placeholder="if you are a company please mention it here " >
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group mb-5">
                  <label for="" class="col-form-label">Subject *</label>
                  <input type="text" class="form-control" name="subject" id="subject"  placeholder="subject" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group mb-5">
                  <label for="message" class="col-form-label">Message *</label>
                  <textarea class="form-control" name="message" id="message" cols="30" rows="4"  placeholder="Write your message"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                 <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4"> 
                  {{-- <a class="btn btn-primary rounded-0 py-2 px-4" href="../send">Send</a> --}}
                  <span class="submitting"></span>
                </div>
              </div>
              <div class="row justify-content-center">
                <a href="{{url('/livreur')}}" class="btn btn-outline-success rounded-0 py-2 px-4">work as a delivery guy for CozaFood !</a>
              </div>
            </form>

            <div id="form-message-warning mt-4"></div> 
            <div id="form-message-success">
              Your message was sent, thank you!
            </div>

          </div>
        </div>
   
        <div class="col-md-12">
          <div class="" style="background-image: url('contact/images/map.jpg')">
           
            <div id="map"></div>
            <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvUq0T7xdrsPyrSyi84PdbSou4CIDMIow&callback=initMap&libraries=&v=weekly"
   
            async defer
          ></script>
      
            
          </div>
        </div>
      </div>
    </div>

    
    
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat:  31.660379, lng:  -8.021475  };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 7,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
 
 

    <script src="contact/js/jquery-3.3.1.min.js"></script>
    <script src="contact/js/popper.min.js"></script>
    <script src="contact/js/bootstrap.min.js"></script>
    <script src="contact/js/jquery.validate.min.js"></script>
    <script src="contact/js/main.js"></script>

    @endsection