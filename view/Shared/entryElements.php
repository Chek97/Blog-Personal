<div class="p-3">
    <?php 
        if(count($elements) > 0){
            $counter = 1;
            foreach ($elements as $element) {
                if($element['tipo'] == 'titulo'){ ?>
                    <input type="hidden" 
                        name="<?php echo('head[' . $element['id'] . ']'); ?>" 
                        value="<?php echo($element['id']); ?>"
                    >
                    <input type="text" 
                        value="<?php echo($element['valor']); ?>" 
                        class="form-control" 
                        placeholder="Escribe un encabezado" 
                        name="<?php echo('headtit[' . $element['id'] . ']'); ?>"
                    >
                    <div class="element-delete">
                        <a href="../../controller/Element/elementController.php?q=delete&id=<?php echo($element['id']); ?>">
                            <i class="fas fa-times-circle"></i>
                        </a>
                    </div>
                    <br>
    <?php       }else{ ?>
                    <input type="hidden" 
                        name="<?php echo('parraf['. $element['id'] . ']'); ?>" 
                        value="<?php echo($element['id']); ?>"
                    >
                    <textarea name="<?php echo('parraftit['. $element['id'] . ']'); ?>" 
                        cols="30" 
                        rows="10" 
                        placeholder="introduce un texto largo" 
                        class="form-control"><?php echo($element['valor']); ?></textarea>
                    <div class="element-delete">
                        <a href="../../controller/Element/elementController.php?q=delete&id=<?php echo($element['id']); ?>">
                            <i class="fas fa-times-circle"></i>
                        </a>
                    </div>
                    <br>
    <?php            }
                $counter++;   
            }

        }else{
            echo('<div class="alert alert-primary text-center" role="alert">
                <strong>No hay elementos</strong>
                </div>'
            );
        }
    ?>
</div>