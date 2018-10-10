<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $productCategory->id }}</td>
</tr>

<!-- Id Marca Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id Marca</td>
    <td style="text-align: right">{{ $productCategory->brand->descripcion }}</td>
</tr>

<!-- Descripcion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Descripcion</td>
    <td style="text-align: right">{{ $productCategory->descripcion }}</td>
</tr>

<!-- Fecha Creacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $productCategory->fecha_creacion }}</td>
</tr>

<!-- Fecha Actualizacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Actualizacion</td>
    <td style="text-align: right">{{ $productCategory->fecha_actualizacion }}</td>
</tr>

