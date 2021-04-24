<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VirtualTecnoDinamyc</title>
    <link rel="shortcut icon" href="./images/logoempresa.png" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    @if(session('mensaje'))
    <div class="alert alert-danger">
        {{session('mensaje')}}
        <br>
        <div>

            Referencia al siguiente <a href="https://www.google.com/">enlace</a>
        </div>
    </div>

    @endif
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <h1 style="color:#fff">VIRTUAL TECNO DINAMYC</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        @if(Auth()->user()->bandera == 1 || Auth()->user()->bandera == 2)
                        <div class="navbar-nav me-4">
                            <a class="navbar-brand" href="{{ url('/registro') }}">REGISTRO</a>
                        </div>
                        @endif

                        <div class="navbar-nav">
                            <a class="navbar-brand" href="{{ url('/showDisk') }}">DISCOS</a>
                        </div>
                        <div class="container-fluid">
                            <form action="{{ route('disco.compatible') }}" method="POST" class="d-flex">
                                {{csrf_field()}}
                                <input class="form-control mx-7" type="search" placeholder="Ingrese tarjeta logica"
                                    aria-label="Search" name="logico">
                                <button class="btn btn-outline-light" type="submit">Búsqueda</button>
                            </form>


                        </div>

                        
                        @if(Auth()->user()->bandera == 1)

                          <a class="btn btn-outline-light me-2" href="{{ route('register') }} ">Nuevo/Usuario</a>
                        <a class="btn btn-outline-light" href="{{ route('usuarios') }} ">Usuarios</a>
                        
                        @endif

                        
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav navbar-nav navbar-right">
                <div class="container-fluid">
                <a class="btn btn-outline-light " href="{{url('cerrar')}}">CERRAR SESION</a>
            </div>
    </nav>

    <header class="container-fluid" style="height: 500px; background-color: #fff ">
        <div class="row">
            <div class= >
                <img src="{{asset('images/logo.jpg')}}" class="img-fluid" width="400px " alt="">
                <br><br><br><br>
                <h1>Bienvenidos a VIRTUAL TECNO DINAMYC</h1>
                <p> LA SOLUCION A TU ALCANCE</p>
            </div>
        </div>
    </header>
</body>
<footer>
    <div class="container-fluid text-center text-white" style="background-color: #0D6EFD">
        <div class="row">
            <p>Central: Edificio SKYBOX - Antezana casi Heroinas, Oficina #4 Planta baja</p>
        </div>
    </div>
    </div>
</footer>

</html>