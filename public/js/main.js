
document.getElementById('update-entry').onclick = function(e){
    var inputs = document.getElementsByName('form-element');
    for (var index = 0; index < inputs[0].length; index++) {
        if(inputs[0][index].type !== 'file' && inputs[0][index].value === '' && inputs[0][index].type !== 'submit'){
            e.preventDefault();
            console.log('La entrda tiene campos vacios');
        }
    }
};

document.getElementById('btn-create-hashtag').onclick = function(e){
    var selection = document.getElementById('listHashtag');
    if(selection.value === 'Elige una opcion'){
        e.preventDefault();
        console.log('no hay nada seleccionado');
    }
};

document.getElementById('btn-create-element').onclick = function(e){
    var selection = document.getElementById('element-list');
    if(selection.value === 'Elige una opcion'){
        e.preventDefault();
        console.log('no hay nada seleccionado');
    }
};

document.getElementById('btn-comment-submit').onclick = function(e){
    
    var inputComment = document.getElementById('value');
    if(inputComment.textLength > 255){
        e.preventDefault();
        var parent = document.getElementById('message-error');
        var error = document.createElement('p');
            error.innerHTML = 'El comentario excede los 255 caracteres, abrevia un poco porfavor';
            error.style = 'color: red';
        parent.appendChild(error);
    }
    if(inputComment.value === ''){
        e.preventDefault();
        console.log('No hay nada');
    }
};