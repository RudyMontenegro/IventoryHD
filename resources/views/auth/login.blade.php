@extends('layouts.app')
@extends('plantilla')

@section('content')
<div class="container">
    <div class="row text-center login-page">
        <div class="col-md-8 col-md-offset-2">
        <div class="card">
                <div class = "well well-md-8">
  
                <fieldset>
                <h1 class = "text-center header">ACCESO A LA APLICACION</h1>
                    <div class="panel-body">
                       <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="col-md-4 control-label"style="font-size: 20px">Correo Electronico</label>

                                     <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Correo Electronico"value="{{ old('email') }}"  autofocus style="font-size: 20px">

                                        @if ($errors->has('email'))
                                             <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                     </div>
                              </div>

                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label" style="font-size: 20px">Contraseña</label>

                                   <div class="col-md-6">
                                      <input id="password" type="password" class="form-control"placeholder="Contraseña" name="password"  style="font-size: 20px">
  
                                      @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                     @endif
                                    </div>
                                   </div>

                                   <div class="form-group">
                                      <div class="col-md-8 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary align-center" style="font-size: 20px">
                                             Ingresar
                                        </button>

                                
                            </div>
                        </div>
                    </form>
                </div> 
                </fielset>
            </div>
        </div>
    </div>
</div>
@endsection
