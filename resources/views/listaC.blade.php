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

    
    <style>
        h1 {
            text-align:center;
        }
    </style>
    
<div class="row">
    
    <nav class="navbar navbar-expand-lg  bg-light">
        <a href="{{ url('/') }}" class="btn btn-secondary btn-lg btn-block">Volver</a>
            
</nav>
<nav class="navbar navbar-expand-lg  bg-light">

    @if(Auth()->user()->bandera == 1 || Auth()->user()->bandera == 2)
    <a  data-toggle="modal" data-target="#my-modal" class="btn btn-success btn-lg btn-block">Añadir</a>
    @endif

    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    
                    <div class="row center">
                        
                        <h1>Registro de Compatibilidad</h1>
                    </div>
                    <form action="{{ route('addTable') }}" method="POST" >
                        {{csrf_field()}}
                    <div class="container">
                        <label for="USB">USB</label>
                        <div class="row col-5">
                            <input class="form-control {{$errors->has('usb')?'is-invalid':'' }}" type="text" name="usb" id="usb"
                            placeholder="Ingrese el Numero de Tarjeta USB" value="{{ old('usb') }}">
                            {!! $errors->first('usb','<div class="invalid-feedback">:message</div>') !!}
                        </div >
                            <label for="SATA">SATA</label>
                            <div  class="row col-5">
                                <input class="form-control {{$errors->has('sata')?'is-invalid':'' }}" type="text" name="sata" id="sata"
                                placeholder="Ingrese el Numero de Tarjeta SATA" value="{{ old('sata') }}">
                                {!! $errors->first('sata','<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>
                    

                  </div>
                  <div class="modal-footer">
                    
                        
                        <button class="btn btn-success" type="submit">Registrar</button>
                  
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  </div>
            </div>
        </div>
          </form>
    </div>
        
</nav>
   
</div>

    <div class="container-fluid" style="background-color: #FFCB00 ">
        
        <div class="row">

            <table class="table table-bordered text-black">
            
                    <thead>
                        <tr >
                            <th scope="col">USB</th>
                            <th scope="col">SATA</th>
                            @if(Auth()->user()->bandera == 1 || Auth()->user()->bandera == 2)
                            <th scope="col">Acciones</th>
                            @endif
                        </tr>
               @foreach($listaCom as $listaCom)
                        <tr>
                        <td> 
                          {{$listaCom->USB}}  
                        </td>
                        <td>
                            {{$listaCom->SATA}} 
                        </td>
                        @if(Auth()->user()->bandera == 1 || Auth()->user()->bandera == 2)
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
                        @endif
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


