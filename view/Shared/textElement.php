<input type="hidden" 
    name="<?php echo ('head[' . $element['id'] . ']'); ?>" 
    value="<?php echo ($element['id']); ?>"
>
<input type="text" 
    value="<?php echo ($element['valor']); ?>" 
    class="form-control" 
    placeholder="Escribe un encabezado" 
    name="<?php echo ('headtit[' . $element['id'] . ']'); ?>"
>
<div class="element-delete">
    <a href="../../controller/Element/elementController.php?q=delete&id=<?php echo ($element['id']); ?>">
        <i class="fas fa-times-circle"></i>
    </a>
</div>
<br>