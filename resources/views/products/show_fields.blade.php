<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $product->id }}</td>
</tr>

<!-- Nombre Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Nombre</td>
    <td style="text-align: right">{{ $product->nombre }}</td>
</tr>

<!-- Descripcion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Descripcion</td>
    <td style="text-align: right">{{ $product->descripcion }}</td>
</tr>

<!-- Codigo Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Codigo</td>
    <td style="text-align: right">{{ $product->codigo }}</td>
</tr>

<!-- Codigo Barra Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Codigo Barra</td>
    <td style="text-align: right">{{ $product->codigo_barra }}</td>
</tr>

<!-- Activo Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Activo</td>
    <td style="text-align: right">{{ $product->activo }}</td>
</tr>

<!-- Id Producto Tipo Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Tipo</td>
    <td style="text-align: right">{{ $product->product_type->descripcion }}</td>
</tr>

<!-- Id Producto Marca Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Marca</td>
    <td style="text-align: right">{{ $product->brand->descripcion }}</td>
</tr>

<!-- Id Producto Categoria Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Categoria</td>
    <td style="text-align: right">{{ $product->product_category->descripcion }}</td>
</tr>

<!-- Precio Venta Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Precio Venta</td>
    <td style="text-align: right">{{ $product->precio_venta }}</td>
</tr>

<!-- Path Imagen Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Imagen</td>
    <td style="text-align: right">
        <img style="max-width: 128px; max-height: 128px;"
             src="{!! $product->path_imagen !!}" class="img-responsive pull-right" alt="">
    </td>
</tr>

<!-- Fecha Creacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $product->fecha_creacion }}</td>
</tr>

<!-- Fecha Actualizacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Actualizacion</td>
    <td style="text-align: right">{{ $product->fecha_actualizacion }}</td>
</tr>

<!-- Fecha Borrado Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Borrado</td>
    <td style="text-align: right">{{ $product->fecha_borrado }}</td>
</tr>

<!-- Precio Costo Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Precio Costo</td>
    <td style="text-align: right">{{ $product->precio_costo }}</td>
</tr>

<!-- Peso Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Peso</td>
    <td style="text-align: right">{{ $product->peso }}</td>
</tr>

<!-- Precio Flete Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Precio Flete</td>
    <td style="text-align: right">{{ $product->precio_flete }}</td>
</tr>

<!-- Precio Despacho Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Precio Despacho</td>
    <td style="text-align: right">{{ $product->precio_despacho }}</td>
</tr>

<!-- Precio Costo Con Impuestos Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Precio Costo Con Impuestos</td>
    <td style="text-align: right">{{ $product->precio_costo_con_impuestos }}</td>
</tr>

