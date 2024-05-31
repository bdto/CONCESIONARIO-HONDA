@extends('layouts.app')

@section('template_title')
    {{ $carro->Marca ?? __('Show') . " " . __('Carro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Carro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('carros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id:</strong>
                                    {{ $carro->id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ $carro->Marca }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:</strong>
                                    {{ $carro->Precio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Modelo:</strong>
                                    {{ $carro->Modelo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Año:</strong>
                                    {{ $carro->Año }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Vendedor:</strong>
                                    {{ $carro->Vendedor }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Placa:</strong>
                                    {{ $carro->Placa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Idproveedores:</strong>
                                    {{ $carro->id_proveedor }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection