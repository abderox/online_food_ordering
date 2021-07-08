<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div style="background-image:url();background-repeat:no-repeat;background-size:100% 100%">
        <h1 style="text-align:center;padding-top:9%;padding-bottom:9%;color:white">Our Partners</h1>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 ">
                @foreach ($restaurants as $restaurant)
                <div class="col">
                        <img src="{{asset($restaurant->image)}}" alt="" height="100%" width="100%" >
                    </div>
                    <div class="col" >
                        <div class="card shadow-sm">
                    <div class="card-body">
                        <h1>
                            {{$restaurant->name}}
                        </h1>
                        <br>
                        <h2 style="color:gray">Adresse:</h2>
                        <br>
                        <h3>
                            {{$restaurant->adresse}}
                        </h3>
                        <br>
                        <h2 style="color:gray">Description:</h2>
                        <br>
                        <p class="card-text">
                            {{$restaurant->description}}
                        </p>
                        <br>
                        <h3 style="color:gray">N Teleph:</h3>
                        <p>
                            {{$restaurant->N}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
                @endforeach
            </div>    
        </div>
        </div>
        </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>