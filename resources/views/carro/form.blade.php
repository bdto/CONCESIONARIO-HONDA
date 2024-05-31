<div class="form-group">
    <label for="Marca">Marca</label>
    <input type="text" class="form-control" id="Marca" name="Marca" value="{{ old('Marca', $carro?->Marca) }}" required>
</div>
<div class="form-group">
    <label for="Precio">Precio</label>
    <input type="number" class="form-control" id="Precio" name="Precio" value="{{ old('Marca', $carro?->Precio) }}" required>
</div>
<div class="form-group">
    <label for="Modelo">Modelo</label>
    <input type="text" class="form-control" id="Modelo" name="Modelo" value="{{ old('Marca', $carro?->Modelo) }}" required>
</div>
<div class="form-group">
    <label for="Año">Año</label>
    <input type="number" class="form-control" id="Año" name="Año" value="{{ old('Marca', $carro?->Año) }}" required>
</div>
<div class="form-group">
    <label for="Vendedor">Vendedor</label>
    <input type="text" class="form-control" id="Vendedor" name="Vendedor" value="{{ old('Marca', $carro?->Vendedor) }}" required>
</div>
<div class="form-group">
    <label for="Placa">Placa</label>
    <input type="text" class="form-control" id="Placa" name="Placa" value="{{ old('Marca', $carro?->Placa) }}" required>
</div>
<div class="form-group">
    <label for="idproveedores">ID Proveedor</label>
    <input type="text" class="form-control" id="idproveedores" name="idproveedores" value="{{ old('Marca', $carro?->id_proveedor) }}" required>
</div>
<button type="submit" class="btn btn-primary">Guardar</button>