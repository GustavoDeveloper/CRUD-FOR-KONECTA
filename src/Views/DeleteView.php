<?php
    namespace CoffeKonecta\Views;
    use CoffeKonecta\Template\Template;
    $header = new Template('header');
?>

<div class="container mt-5">
    <?php if(!empty($data['message']) && $data['alert'] == true){?>
        <div class="alert alert-success mt-2" role="alert"><?php echo $data['message'];?></div>
    <?php }elseif (!empty($data['message']) && $data['alert'] == false) { ?>
        <div class="alert alert-danger mt-2" role="alert"><?php echo $data['message'];?></div>
    <?php } ?>
    <a href="<?php echo URL; ?>" class="btn btn-primary mb-3">Regresar a productos</a>
    <h1>Módulo eliminar producto</h1>
    <form action="<?php echo URL; ?>delete/DeleteProduct/<?php echo $data['data'][0]['id']; ?>" method="POST" class="mt-5">
        <input value="<?php echo $data['data'][0]['id']; ?>" type="hidden" class="form-control" id="id" name="id">
        <div class="mb-3">
            <label for="product_name" class="form-label">Nombre del producto</label>
            <input value="<?php echo $data['data'][0]['product_name']; ?>" type="text" class="form-control" id="product_name" name="product_name" required readonly>
        </div>
        <div class="mb-3">
            <label for="reference" class="form-label">SKU/Referencia</label>
            <input value="<?php echo $data['data'][0]['reference']; ?>" type="text" class="form-control" id="reference" name="reference" required readonly>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio de venta</label>
            <input value="<?php echo $data['data'][0]['price']; ?>" type="number" class="form-control" id="price" name="price" required readonly>
        </div>
        <div class="mb-3">
            <label for="wegith" class="form-label">Peso en gramos</label>
            <input value="<?php echo $data['data'][0]['wegith']; ?>" type="number" class="form-control" id="wegith" name="wegith" required readonly>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select class="form-control" id="category" name="category" required readonly>
                <option value="">Seleccionar categoria</option>
                <?php foreach ($data['category'] as $value ) {?>
                    <?php if ( $value['id'] == $data['data'][0]['category'] ) {?>
                        <option selected value="<?php echo $value['id'];?>"><?php echo $value['category_name']; ?></option>
                    <?php }else { ?>
                        <option value="<?php echo $value['id'];?>"><?php echo $value['category_name']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Cantidad</label>
            <input value="<?php echo $data['data'][0]['stock']; ?>" type="number" class="form-control" id="stock" name="stock" required readonly>
        </div>
        <button type="submit" class="btn btn-success">Eliminar producto</button>
    </form>
</div>


<?php
    $footer = new Template('footer');
?>