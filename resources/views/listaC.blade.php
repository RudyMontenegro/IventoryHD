@extends('plantilla')
<head>
    <style>
        {
            margin:0px;
        }
        
        
        .whiteheadline {
            font-size: 48px;
            font-family: "Open Sans";
            color: rgb(255, 255, 255);
            font-weight: bold;
        }
        
        .header-rectangle { 
            text-align: center;
            line-height: 143px;
        }
    </style>
<link rel="shortcut icon" href="./images/logoempresa.png" type="image/x-icon"/>
</head>
<nav class="navbar navbar-light" style="background-color: #FFCB00;" class="container">
    <div class="row">
        <div class="header-rectangle">
            <h1 style="color:#000" class="whiteheadline">Lista de Compatibilidad</h1>
            
        

        </div>
    </div>
    </div>
</nav>

       
        </div>
       
@section('seccion')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualTecnoDinamyc</title>

</head>

<body>

   
    
    <div class="container-fluid" style="background-color: #FFCB00 ">
        <div class="row">

            <table class="table table-bordered text-black">
            
                    <thead>
                        <tr >
                            <th scope="col">USB</th>
                            <th scope="col">SATA</th>
                            <th scope="col">Acciones</th>
                        </tr>
               @foreach($listaCom as $listaCom)
                        <tr>
                        <td> 
                          {{$listaCom->USB}}  
                        </td>
                        <td>
                            {{$listaCom->SATA}} 
                        </td>
                        <td>
                           <a href="{{route('editarLista',$listaCom->id)}}" class="btn btn-success">Editar</a>
                        
                          
                          <form action="{{url('listaC/eliminar/'.$listaCom->id)}}" method="post" class="d-inline">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger"
                                onclick=" return confirm ('¿Esta seguro de Eliminar esta compatibilidad?'); "
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


