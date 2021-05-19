<div class="p-3 elements-section">
    <?php 
        if(count($elements) > 0){
            $counter = 1;
            foreach ($elements as $element) {
                if($element['tipo'] == 'titulo'){
                    echo('<input type="hidden" name="head[' . $element['id'] . ']" value="' . $element['id'] . '">');
                    echo('<input type="text" value="' . $element['valor'] . '" class="form-control" placeholder="Escribe un encabezado" name="headtit[' . $element['id'] . ']">');
                    echo('<br>');
                }else{
                    echo('<input type="hidden" name="parraf['. $element['id'] . ']" value="' . $element['id'] . '">');
                    echo('<textarea name="parraftit['. $element['id'] . ']" cols="30" rows="10" placeholder="introduce un texto largo" class="form-control">'. $element['valor'] . '</textarea>');
                    echo('<br>');
                }
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