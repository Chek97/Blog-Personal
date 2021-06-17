//validate comment-form dont accept > 255 chars
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
}