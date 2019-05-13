<div class="modifyForm">
    <form action="adminProdMod?name=<?php echo $product->get('name'); ?>" method="post" class="d-flex flex-column" enctype="multipart/form-data">
        Nom<input type="text" name="name" value=<?php echo '"'.$product->get('name').'"'?> required>
        Prix<input type="number" min="0.00" step="0.01" name="price" value=<?php echo '"'.$product->get('price').'"'?> required>
        Image<input type="file" name="picture" accept="image/jpeg">
        Taille<input type="number" min="0.00" step="0.01" name="size" value=<?php echo '"'.$product->get('size').'"'?> required>
        Couleur<input type="text" name="color" value=<?php echo '"'.$product->get('color').'"'?> required>
        Marque<input type="text" name="brand" value=<?php echo '"'.$product->get('brand').'"'?> required>
        <input type="submit" name="submit" value="Valider">
    </form>
</div>