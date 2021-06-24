<input type="hidden" 
    name="<?php echo ('video[' . $element['id'] . ']'); ?>" 
    value="<?php echo ($element['id']); ?>"
>
<input type="file"
    name="<?php echo ('vidtit[' . $element['id'] . ']'); ?>"
    value="<?php echo ($element['valor']); ?>"
    class="form-control"
>
<div class="element-delete">
    <a href="../../controller/Element/elementController.php?q=delete&id=<?php echo ($element['id']); ?>">
        <i class="fas fa-times-circle"></i>
    </a>
</div>
<br>