<?php
    namespace CoffeKonecta\Views;
    use CoffeKonecta\Template\Template;
    $header = new Template('header');
?>
<div class="container">
    <div class="row mb-5">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body text-start p-5">
            <h3 class="card-titler">Producto con mayor stock</h3>
            <p class="card-title">Nombre: <?php echo $data['stock'][0]['product_name']; ?></p>
            <p class="card-title">Referencia: <?php echo $data['stock'][0]['reference']; ?></p>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body text-start p-5">
            <h3 class="card-titler">Producto más vendido</h3>
            <p class="card-title">Nombre: <?php echo $data['sell'][0]['product_name']; ?></p>
            <p class="card-title">Cantidad vendida: <?php echo $data['sell'][0]['quantity']; ?></p>
        </div>
        </div>
    </div>
    </div>

    <div class="row align-items-center mb-4">
        <div class="col-sm-12">
            <a href="<?php echo URL; ?>add" class="btn btn-success" type="submit">Añadir Producto <i class="bi bi-file-earmark-plus"></i></a>
        </div>
    </div>

    <table class="table table-bordered table-responsive">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres de articulo</th>
                <th scope="col">Referencia</th>
                <th scope="col">Precio</th>
                <th scope="col">Peso</th>
                <th scope="col">Categoria</th>
                <th scope="col">Stock</th>
                <th scope="col">fecha de creación</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['productos'] as $key => $value) {?>
                <tr>
                    <th scope="row" id="<?php echo $value['id']; ?>"><?php echo $key; ?></th>
                    <td><?php echo $value['product_name']; ?></td>
                    <td><?php echo $value['reference']; ?></td>
                    <td><?php echo "$ ".$value['price']; ?></td>
                    <td><?php echo $value['wegith']." Gramos"; ?></td>
                    <td><?php echo $value['category_name']; ?></td>
                    <td><?php echo $value['stock']; ?></td>
                    <td><?php echo $value['creation_date']; ?></td>
                    <td><a href="<?php echo URL; ?>edit/editproduct/<?php echo $value['id']; ?>" class="btn btn-primary" rel="noopener noreferrer"><i class="bi bi-pen"></i></a></td>
                    <td><a href="<?php echo URL; ?>delete/deleteproduct/<?php echo $value['id']; ?>" class="btn btn-danger" rel="noopener noreferrer"><i class="bi bi-file-earmark-x"></i></a></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php
    $footer = new Template('footer');
?>