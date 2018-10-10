<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $distributorMultiplier->id }}</td>
</tr>

<!-- Categoria Producto Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Categoria Producto</td>
    <td style="text-align: right">{{ $distributorMultiplier->product_category->descripcion }}</td>
</tr>+

<!-- Distribuidor Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Distribuidor</td>
    <td style="text-align: right">{{ $distributorMultiplier->distributor->titulo }}</td>
</tr>

<!-- Descripcion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Descripcion</td>
    <td style="text-align: right">{{ $distributorMultiplier->descripcion }}</td>
</tr>

<!-- Porcentaje Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Porcentaje</td>
    <td style="text-align: right"><span class="badge bg-light-blue">
                        {{ ($distributorMultiplier->porcentaje ? $distributorMultiplier->porcentaje : 0) }}
            %</span>
    </td>
</tr>

