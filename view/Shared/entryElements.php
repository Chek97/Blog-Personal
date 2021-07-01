<div class="p-3">
    <?php 
        if(count($elements) > 0){
            $counter = 1;
            foreach ($elements as $element) {
                switch ($element['tipo']) {
                    case 'titulo':
                        include('../Shared/textElement.php');                    
                        break;
                    case 'parrafo':
                        include('../Shared/parrafElement.php');    
                        break;
                    case 'imagen':
                        include('../Shared/imageElement.php');    
                        break;
                    case 'video':
                        include('../Shared/videoElement.php');    
                        break;
                    default:
                        echo('no hay elementos');
                        break;
                }
                $counter++;   
            }
        }else{ ?>
            <div class="alert alert-primary text-center" role="alert">
                <strong>No hay elementos</strong>
            </div>'
    <?php   
        }   
    ?>
</div>