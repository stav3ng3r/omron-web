<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $productPromotion->id }}</td>
</tr>

<!-- Id Producto Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id Producto</td>
    <td style="text-align: right">{{ $productPromotion->product->nombre }}</td>
</tr>

<!-- Desde Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Desde</td>
    <td style="text-align: right">{{ $productPromotion->desde }}</td>
</tr>

<!-- Hasta Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Hasta</td>
    <td style="text-align: right">{{ $productPromotion->hasta }}</td>
</tr>

<!-- Distribuidor Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Distribuidor</td>
    <td style="text-align: right">{{ ($productPromotion->distributor ? $productPromotion->distributor->titulo : '') }}</td>
</tr>

<!-- Fecha Creacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $productPromotion->fecha_creacion }}</td>
</tr>


