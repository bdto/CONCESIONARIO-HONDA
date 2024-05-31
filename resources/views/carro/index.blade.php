@extends('layouts.app')

@section('template_title')
    Carros
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">

                            <span id="card_title">
                                {{ __('Carros') }}
                            </span>

                            <div class="d-flex">
                                <form class="d-flex me-2" role="search" method="GET" action="{{ route('carros.index') }}">
                                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request()->query('search') }}">
                                    <button class="btn btn-outline-success" type="submit">BUSCAR</button>
                                    <button class="btn btn-outline-success" style="margin-left:1em;" type="submit"><a href="/datos.xlsx">Descargar</a></button>
                                </form>

                                
                                <a href="{{ route('carros.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                  {{ __('CREAR REGISTRO') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>id</th>
                                        <th>Marca</th>
                                        <th>Precio</th>
                                        <th>Modelo</th>
                                        <th>Año</th>
                                        <th>Vendedor</th>
                                        <th>Placa</th>
                                        <th>Idproveedores</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carros as $carro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $carro->id }}</td>
                                            <td>{{ $carro->Marca }}</td>
                                            <td>{{ $carro->Precio }}</td>
                                            <td>{{ $carro->Modelo }}</td>
                                            <td>{{ $carro->Año }}</td>
                                            <td>{{ $carro->Vendedor }}</td>
                                            <td>{{ $carro->Placa }}</td>
                                            <td>{{ $carro->id_proveedor }}</td>
                                            <td>
                                                <form action="{{ route('carros.destroy', $carro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('carros.show', $carro->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('carros.edit', $carro->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('DESEAS ELIMINAR EL REGISTRO?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $carros->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection