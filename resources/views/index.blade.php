@extends('layouts.app')

@section('title', 'Contactos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Contactos</div>

                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Pais</th>
                                    <th scope="col">Ciudad</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$contact->job_title}}</td>
                                        <td>{{$contact->first_name}}</td>
                                        <td>{{$contact->last_name}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->document}}</td>
                                        <td>{{$contact->phone_number}}</td>
                                        <td>{{$contact->country}}</td>
                                        <td>{{$contact->city}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection