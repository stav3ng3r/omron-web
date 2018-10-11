<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $clientContact->id }}</td>
</tr>

<!-- Id Cliente Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Cliente</td>
    <td style="text-align: right">{{ $clientContact->client->descripcion }}</td>
</tr>

<!-- Nombre Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Nombre</td>
    <td style="text-align: right">{{ $clientContact->nombre }}</td>
</tr>

<!-- Departamento Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Departamento</td>
    <td style="text-align: right">{{ $clientContact->departamento }}</td>
</tr>

<!-- Email Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Email</td>
    <td style="text-align: right">{{ $clientContact->email }}</td>
</tr>

<!-- Telefono Contacto Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Telefono Contacto</td>
    <td style="text-align: right">{{ $clientContact->telefono_contacto }}</td>
</tr>

<!-- Fecha Creacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $clientContact->fecha_creacion }}</td>
</tr>

<!-- Fecha Actualizacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Actualizacion</td>
    <td style="text-align: right">{{ $clientContact->fecha_actualizacion }}</td>
</tr>

