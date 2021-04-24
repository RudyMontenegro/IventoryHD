@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row text-center login-page">
        <div class="col-md-8 col-md-offset-2">
        <div class="card">
                <div class = "well well-sm">
  
                <fieldset>
                <legend class = "text-center header">ACCESO ALA APLICACION</legend>
                    <div class="panel-body">
                       <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                                     <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Correo Electronico"value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                             <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                     </div>
                              </div>

                                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Contraseña</label>

                                   <div class="col-md-6">
                                      <input id="password" type="password" class="form-control"placeholder="Contraseña" name="password" required>
  
                                      @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                     @endif
                                    </div>
                                   </div>

                                   <div class="form-group">
                                      <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
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
