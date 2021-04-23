@extends('plantilla')

<head>
    <link rel="shortcut icon" href="./images/logoempresa.png" type="image/x-icon" />
</head>
<nav class="navbar navbar-light" style="background-color: #FFCB00;" class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 style="color:#000">LISTA DE USUARIOS</h1>

        </div>
    </div>
    </div>
</nav>



@section('seccion')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualTecnoDinamyc</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg  bg-light">
        <a href="{{ url('/') }}" class="btn btn-secondary btn-lg btn-block">Volver</a>
    </nav>

    <div class="container-fluid" style="background-color: #FFCB00 ">
        <div>

            <table class="table table-bordered table-responsive text-black">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>

                    </tr>
                    @foreach($dis as $dis)
                    <tr>
                        <td>{{$dis->name}}</td>
                        <td>{{$dis->email}}</td>
                        <td>
                           

                        <a href="{{url('editarUsuario',$dis->id)}}" class="btn btn-success">Editar</a>
                        
                        
                            <form action="{{url('adm/eliminar/'.$dis->id)}}" method="post" class="d-inline">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger"
                                    onclick=" return confirm ('¿Esta seguro de Eliminar este Usuario?'); "
                                    type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>

        </div>

    </div>

</body>
<nav class="navbar navbar-expand-lg  bg-light">
    <a href="{{ url('/') }}" class="btn btn-secondary btn-lg btn-block">Volver</a>
</nav>
@endsection