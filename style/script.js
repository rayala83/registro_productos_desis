document.getElementById('formulario_productos').addEventListener('submit', async function(e) {
    e.preventDefault();

    const codigo = document.getElementById('codigo_producto').value.trim();
    if(codigo === ""){
        alert("El codigo del producto no puede estar en blanco");
        return;
    }
    if(codigo.length < 5 || codigo.length > 15 ){
        alert("El codigo del producto debe tener entre 5 y 15 caracteres");
        return;
    }
    const regexCodigo = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;
    if(!regexCodigo.test(codigo)){
        alert("El codigo del producto debe contener solo leras y numeros");
        return;
    }
})