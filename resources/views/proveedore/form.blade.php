<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="marca" class="form-label">{{ __('Marca') }}</label>
            <input type="text" name="Marca" class="form-control @error('Marca') is-invalid @enderror" value="{{ old('Marca', $proveedore?->Marca) }}" id="marca" placeholder="Marca">
            {!! $errors->first('Marca', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pais" class="form-label">{{ __('Pais') }}</label>
            <input type="text" name="Pais" class="form-control @error('Pais') is-invalid @enderror" value="{{ old('Pais', $proveedore?->Pais) }}" id="pais" placeholder="Pais">
            {!! $errors->first('Pais', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="distribuidor" class="form-label">{{ __('Distribuidor') }}</label>
            <input type="text" name="Distribuidor" class="form-control @error('Distribuidor') is-invalid @enderror" value="{{ old('Distribuidor', $proveedore?->Distribuidor) }}" id="distribuidor" placeholder="Distribuidor">
            {!! $errors->first('Distribuidor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="logo" class="form-label">{{ __('Logo') }}</label>
            <input type="text" name="Logo" class="form-control @error('Logo') is-invalid @enderror" value="{{ old('Logo', $proveedore?->Logo) }}" id="logo" placeholder="Logo">
            {!! $errors->first('Logo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_ingreso" class="form-label">{{ __('Fecha Ingreso') }}</label>
            <input type="text" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $proveedore?->fecha_ingreso) }}" id="fecha_ingreso" placeholder="Fecha Ingreso">
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>