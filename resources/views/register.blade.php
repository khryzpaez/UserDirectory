@extends('layouts.app')

@section('title', 'Registrar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar</div>

                    <div class="card-body">
                        <form method="POST" action="/usuarios/crear">
                            @if(!empty($errors))
                                <ul>
                                    @foreach($errors as $error)
                                        <li>{{$error['msg']}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{isset($data['name']) ? $data['name'] : ''}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Documento</label>

                                <div class="col-md-6">
                                    <input id="document" type="text" class="form-control" name="document"
                                           value="{{isset($data['document']) ? $data['document'] : ''}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{isset($data['email']) ? $data['email'] : ''}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Pais</label>

                                <div class="col-md-6">
                                    <select id="country_id" class="form-control" name="country_id" required>
                                        <option value="">Seleccione</option>
                                        @foreach(\App\Models\Country::get() as $country)
                                            <option value="{{$country->id}}" {{isset($data['country_id']) && $data['country_id'] == $country->id ? 'selected' : ''}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection