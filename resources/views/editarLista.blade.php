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

        <form action="{{ route('updateL', $listaEd->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="col-md-4 col-md-offset-4 mt-md-5 ">
                            <div class="box box-primary">
                                <div class="panel panel-heading align-self-center">

                                    </br>
                                    <label form="USB">USB</label>
                                    <input class="form-control" type="text" name="USB" id="USB"
                                        placeholder="Ingrese el codigo USB" value="{{ $listaEd->USB }}">

                                    <br>

                                    <label form="SATA">SATA</label>
                                    <input class="form-control" type="text" name="SATA" id="SATA"
                                        Placeholder="Ingrese el codigo SATA" value="{{ $listaEd->SATA }}">
                                    <br>

                                    <br>
                                    <button type="submit" class="btn btn-warning mb-5" value="editar">Guardar</button>
                                    <a href="{{ url('listaC') }}" class="btn btn-primary mb-5">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
           
        </div>
        
    </div>
    
</body>
@endsection




