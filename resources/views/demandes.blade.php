@extends('admin.dashadmin')
 @section('content') 

  
    
    <div class="container-fluid">
     
      @if (Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
          {{Session::put('success',null)}}
      </div>
  @endif
  <h2 class="mb-5 " style="margin-top: 150px ;display:flex ;justify-content:center">Demandes d'emploie livreurs</h2>
      <div class="table-responsive">

        <table class="table table-striped custom-table">
          <thead>
            <tr>
            <th></th>
              <th scope="col">N°</th>
              <th scope="col">Nome</th>
              <th scope="col">Prenom</th>
              <th scope="col">Gmail</th>
              <th scope="col">Telephone</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($demandes_livreurs as $demandes_livreur)
                  
             
            <tr scope="row">
              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              <td>
                {{$demandes_livreur->id}}
              </td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                 

                    <svg style="color: rgb(25, 4, 77); margin-right:4px" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                      </svg>{{$demandes_livreur->name}}
                </div>
              </td>
              <td>
                {{$demandes_livreur->prenom}}
                @if ($demandes_livreur->status_etud==1)
                  
                    @php $etud="etudiant ";@endphp
                @else
                    {{ $etud=""}}  
                @endif
                @if ($demandes_livreur->status_vehicule==1)
                
                    @php $vehicule="    vehiculé  "@endphp
                @else
                    @php $vehicule="    non vehicule "@endphp
                @endif
                @if ($demandes_livreur->status_genre==1)
             
                     @php $genre="   male";@endphp
                @else 
                     @php $genre="   male";@endphp
                @endif
                <small class="d-block" style="color: rgb(2, 90, 53)">
                    
                  <i>  &#8226;{{$etud}}
                  
                    &#8226; {{$vehicule}}
                   
                    &#8226; {{$genre}}
                  </i>
                </small>
              </td>

              <td> <a href="https://mail.google.com/mail/u/0/?pli=1#inbox/FMfcgzGkXdBKGCtdSGQTXlXsccVVHQzj?compose=new"><svg style="color: rgb(25, 4, 77);margin-right:4px" xmlns="http://www.w3.org/2000/svg"  width="14" height="14" fill="currentColor" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
              </svg>{{$demandes_livreur->email}}</a></td>

              <td> <svg style="color: rgb(25, 4, 77);margin-right:4px" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
              </svg>{{$demandes_livreur->phone_number}}</td>

              @php $created = new Carbon\Carbon($demandes_livreur->created_at);
                $now = Carbon\Carbon::now();
                $difference1=$created->diff($now)->days;
                $difference = ($created->diff($now)->days < 1)
                    ? $lo='today'
                    : $lo=$created->diffForHumans($now);
                    @endphp
                   @if ($difference1 < 2)
                   <td style="color: green"><svg style="color: rgb(25, 4, 77)"  xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                  </svg>
                    {{$lo}}</td>  
                    @else
                    <td style="color: rgb(223, 16, 16)"> <svg  style="color: rgb(25, 4, 77)" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                        <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                      </svg>
                        {{$lo}}</td>  
                   @endif
                  
              
              <td><a href="demandelivinf/{{$demandes_livreur->id}}" class="more">Details</a></td>
              
            </tr>
            @endforeach
            <!-- <tr>

              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              
              <td>4616</td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                  <label class="custom-control ios-switch">
                  <input type="checkbox" class="ios-switch-control-input" checked="">
                  <span class="ios-switch-control-indicator"></span>
                  </label>

                  <a href="#">Matthew Wasil</a>
                </div>

              </td>
              <td>
                Graphic Designer
                <small class="d-block">Far far away, behind the word mountains</small>
              </td>
              <td>+02 020 3994 929</td>
              <td>London College</td>
              <td><a href="#" class="more">Details</a></td>
            </tr>
            <tr>
              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              <td>9841</td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                  <label class="custom-control ios-switch">
                  <input type="checkbox" class="ios-switch-control-input">
                  <span class="ios-switch-control-indicator"></span>
                  </label>

                  <a href="#">Sampson Murphy</a>
                </div>
                
              </td>
              <td>
                Mobile Dev
                <small class="d-block">Far far away, behind the word mountains</small>
              </td>
              <td>+01 352 1125 0192</td>
              <td>Senior High</td>
              <td><a href="#" class="more">Details</a></td>
            </tr>
            <tr>
              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              <td>9548</td>

              <td class="pl-0">
                <div class="d-flex align-items-center">
                  <label class="custom-control ios-switch">
                  <input type="checkbox" class="ios-switch-control-input">
                  <span class="ios-switch-control-indicator"></span>
                  </label>

                  <a href="#">Gaspar Semenov</a>
                </div>
                
              </td>

              <td>
                Illustrator
                <small class="d-block">Far far away, behind the word mountains</small>
              </td>
              <td>+92 020 3994 929</td>
              <td>College</td>
              <td><a href="#" class="more">Details</a></td>
            </tr>

            <tr>
              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              <td>4616</td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                  <label class="custom-control ios-switch">
                  <input type="checkbox" checked="" class="ios-switch-control-input">
                  <span class="ios-switch-control-indicator"></span>
                  </label>

                  <a href="#">Matthew Wasil</a>
                </div>
                
              </td>
              <td>
                Graphic Designer
                <small class="d-block">Far far away, behind the word mountains</small>
              </td>
              <td>+02 020 3994 929</td>
              <td>London College</td>
              <td><a href="#" class="more">Details</a></td>
            </tr>
            <tr>
              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              <td>9841</td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                  <label class="custom-control ios-switch">
                  <input type="checkbox" checked="" class="ios-switch-control-input">
                  <span class="ios-switch-control-indicator"></span>
                  </label>

                  <a href="#">Sampson Murphy</a>
                </div>
                
              </td>

              <td>
                Mobile Dev
                <small class="d-block">Far far away, behind the word mountains</small>
              </td>
              <td>+01 352 1125 0192</td>
              <td>Senior High</td>
              <td><a href="#" class="more">Details</a></td>
            </tr>
            <tr>
              <td>
                <label class="control control--checkbox">
                <input type="checkbox" />
                <div class="control__indicator"></div>
                </label>
              </td>
              <td>9548</td>
              <td class="pl-0">
                <div class="d-flex align-items-center">
                  <label class="custom-control ios-switch">
                  <input type="checkbox" class="ios-switch-control-input">
                  <span class="ios-switch-control-indicator"></span>
                  </label>

                  <a href="#">Gaspar Semenov</a>
                </div>
                
              </td>
              <td>
                Illustrator
                <small class="d-block">Far far away, behind the word mountains</small>
              </td>
              <td>+92 020 3994 929</td>
              <td>College</td>
              <td><a href="#" class="more">Details</a></td>
            </tr> -->
            
          </tbody>
        </table>
        @if (Session::has('null'))
        <div class="alert alert-danger">
          {{Session::get('null')}}
          {{Session::put('null',null)}}
        </div>
      @endif
      </div>


    </div>

 
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
@endsection