<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $city->id }}</td>
</tr>

<!-- Pais Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Pais</td>
    <td style="text-align: right">{{ $city->country->descripcion }}</td>
</tr>

<!-- Descripcion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Descripcion</td>
    <td style="text-align: right">{{ $city->descripcion }}</td>
</tr>

<!-- Created At Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $city->created_at }}</td>
</tr>

<!-- Updated At Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Actualizacion</td>
    <td style="text-align: right">{{ $city->updated_at }}</td>
</tr>

<!-- Deleted At Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Borrado</td>
    <td style="text-align: right">{{ $city->deleted_at }}</td>
</tr>

