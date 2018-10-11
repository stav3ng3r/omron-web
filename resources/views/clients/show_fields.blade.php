<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $client->id }}</td>
</tr>

<!-- Descripcion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Descripcion</td>
    <td style="text-align: right">{{ $client->descripcion }}</td>
</tr>

<!-- Numero Documento Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Numero Documento</td>
    <td style="text-align: right">{{ $client->numero_documento }}</td>
</tr>

<!-- Direccion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Direccion</td>
    <td style="text-align: right">{{ $client->direccion }}</td>
</tr>

<!-- Email Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Email</td>
    <td style="text-align: right">{{ $client->email }}</td>
</tr>

<!-- Logo Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Logo</td>
    <td style="text-align: right">
        <img style="max-width: 128px; max-height: 128px;"
             src="{!! $client->logo  !!}" class="img-responsive pull-right" alt="{{ $client->descripcion }}">
    </td>
</tr>

<!-- Distribuidor Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Distribuidor</td>
    <td style="text-align: right">{{ ($client->distributor ? $client->distributor->titulo : '') }}</td>
</tr>

<!-- Fecha Creacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $client->fecha_creacion }}</td>
</tr>

<!-- Fecha Actualizacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Actualizacion</td>
    <td style="text-align: right">{{ $client->fecha_actualizacion }}</td>
</tr>

<!-- Deleted At Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Borrado</td>
    <td style="text-align: right">{{ $client->deleted_at }}</td>
</tr>

