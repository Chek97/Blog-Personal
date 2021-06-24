<input type="hidden" 
    name="<?php echo ('parraf[' . $element['id'] . ']'); ?>" 
    value="<?php echo ($element['id']); ?>"
>
<textarea name="<?php echo ('parraftit[' . $element['id'] . ']'); ?>" 
    cols="30" 
    rows="10" 
    placeholder="introduce un texto largo" 
    class="form-control"
><?php echo ($element['valor']); ?></textarea>
<div class="element-delete">
    <a href="../../controller/Element/elementController.php?q=delete&id=<?php echo ($element['id']); ?>">
        <i class="fas fa-times-circle"></i>
    </a>
</div>
<br>