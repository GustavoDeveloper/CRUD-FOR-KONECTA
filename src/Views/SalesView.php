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
    <a href="<?php echo URL; ?>" class="btn btn-primary mb-3">Regresar a Home</a>
    <h1>Módulo de ventas</h1>
    <form action="<?php echo URL; ?>sales/addSale" method="POST" class="mt-5">
        <div class="mb-3">
            <label for="item" class="form-label">Producto</label>
            <select class="form-control" id="item" name="item" required>
                <option value="">Seleccionar producto</option>
                <?php foreach ($data['item'] as $value ) {?>
                    <option value="<?php echo $value['id'];?>"><?php echo $value['product_name']; ?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <button type="submit" class="btn btn-success">Realizar venta</button>
    </form>
</div>


<?php
    $footer = new Template('footer');
?>