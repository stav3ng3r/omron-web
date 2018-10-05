<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $distributor->id }}</td>
</tr>

<!-- Titulo Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Titulo</td>
    <td style="text-align: right">{{ $distributor->titulo }}</td>
</tr>

<!-- Descripcion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Descripcion</td>
    <td style="text-align: right">{{ $distributor->descripcion }}</td>
</tr>

<!-- Pais Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Pais</td>
    <td style="text-align: right">{{ $distributor->country->descripcion }}</td>
</tr>

<!-- Ciudad Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Ciudad</td>
    <td style="text-align: right">{{ $distributor->city->descripcion }}</td>
</tr>

<!-- Direccion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Direccion</td>
    <td style="text-align: right">{{ $distributor->direccion }}</td>
</tr>

<!-- Oficina Regional Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Oficina Regional</td>
    <td style="text-align: right">{{ $distributor->regional_office->titulo }}</td>
</tr>

<!-- Marca Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Marca</td>
    <td style="text-align: right">{{ $distributor->brand->descripcion }}</td>
</tr>

