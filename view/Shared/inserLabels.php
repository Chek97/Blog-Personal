<?php
    require('../../controller/Hashtag/hashtagController.php');
    require('../../controller/HashtagEntry/hashEntryController.php');
    $objHashtag = new HashtagActions();
    $objHashEntry = new HashEntryActions();
    $hashtags = $objHashtag->getHashtags();
    $listHash = $objHashEntry->getHashtag($entry['id']);

?>
<div class="container">
    <h2 class="">Etiquetas</h2>
    <?php 
        if($listHash == false){
            echo('No hay etiquetas');
        }else{
            foreach ($listHash as $hash) {
    ?>
        <span class="badge badge-primary"><?php echo($hash['titulo']); ?></span>
    <?php
            }
        }
    ?>
</div>
<form action="../../controller/HashtagEntry/hashEntryController.php?q=insert" method="post">
    <div class="form-group text-box">
        <input type="hidden" name="id" id="title" class="form-control" value="<?php echo ($entry['id']); ?>">
        <label for="listHashtag">Agregar Etiquetas</label>
        <select class="custom-select" name="listHashtag" id="listHashtag">
            <option selected>Elige una opcion</option>
            <?php foreach($hashtags as $hashtag){ ?>
                <option value="<?php echo($hashtag['id']); ?>"><?php echo($hashtag['titulo']); ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="p-2 text-center">
        <button class="btn btn-create-element btn-lg" type="submit">
            <i class="fa fa-plus" aria-hidden="true"></i>
        </button>
    </div>
</form>