document.getElementById('formulario_productos').addEventListener('submit', async function(e) {
    e.preventDefault();
    //VALIDACIÓN: CODIGO DEL PRODUCTO
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
    try {
        const respuesta = await fetch(`verificar_codigo.php?codigo=${codigo}`);
        
        if (!respuesta.ok) throw new Error('Error en la comunicación con el servidor');
        
        const resultado = await respuesta.json();

        if (resultado.existe) {
            alert("El código del producto ya está registrado.");
            return;
        }
    } catch (error) {
        console.error("Error al verificar el código:", error);
        alert("Hubo un error al verificar la unicidad del código.");
        return;
    }

    //VALIDACIÓN: NOMBRE DEL PRODUCTO
    const nombre = document.getElementById('nombre_producto').value.trim();
    if (nombre.length < 2 || nombre.length > 50) {
        alert("El nombre del producto debe tener entre 2 y 50 caracteres.");
        return;
    }
    // VALIDACIÓN: BODEGA 
    const bodega = document.getElementById('select_bodega').value;
    if (bodega === "0" || bodega === "") {
        alert("Debe seleccionar una bodega.");
        return;
    }

    // VALIDACIÓN: SUCURSAL 
    const sucursal = document.getElementById('select_sucursal').value;
    if (sucursal === "0" || sucursal === "") {
        alert("Debe seleccionar una sucursal para la bodega seleccionada.");
        return;
    }

    // VALIDACIÓN: MONEDAD 
    const moneda = document.getElementById('select_moneda').value;
    if (moneda === "0" || moneda === "") {
        alert("Debe seleccionar una moneda para el producto.");
        return;
    }



    //VALIDACIÓN: PRECIO
    const precio = document.getElementById('precio').value.trim();
    const regexPrecio = /^[0-9]+(\.[0-9]{1,2})?$/;
    if (precio === "" || !regexPrecio.test(precio) || parseFloat(precio) <= 0) {
        alert("El precio debe ser un número positivo con hasta 2 decimales.");
        return;
    }


    // VALIDACIÓN: MATERIALES 
    
    const materiales = document.querySelectorAll('input[name="material[]"]:checked');
    if (materiales.length < 2) {
        alert("Debe seleccionar al menos dos materiales.");
        return;
    }

    // VALIDACIÓN: DESCRIPCIÓN
    const descripcion = document.getElementById('descripcion_producto').value.trim();

    if (descripcion === "") {
    alert("La descripción del producto no puede quedar en blanco.");
    return;
    }
    if (descripcion.length < 10 || descripcion.length > 1000) {
        alert("La descripción debe tener entre 10 y 1000 caracteres.");
        return;
    }

    console.log("Enviando datos al servidor...");

    const formData = new FormData(this);

    try {
        const respuestaFinal = await fetch('guardar_productos.php', {
            method: 'POST',
            body: formData
        });

        const resultado = await respuestaFinal.json();

        if (resultado.status === "success") {
            alert("¡Éxito!: " + resultado.message);
            this.reset(); 
            document.getElementById('select_sucursal').disabled = true;
        } else {
            alert("Error al guardar: " + resultado.message);
        }

    } catch (error) {
        console.error("Error en el envío:", error);
        alert("Hubo un error crítico al conectar con el servidor.");
    }
})
document.getElementById('select_bodega').addEventListener('change', function() {
    const bodegaId = this.value;
    const selectSucursal = document.getElementById('select_sucursal');

    if (bodegaId == "0") {
        selectSucursal.innerHTML = '<option value="0"> </option>';
        return;
    }

    fetch(`obtener_datos_iniciales.php?bodega_id=${bodegaId}`)
        .then(response => response.json())
        .then(data => {
            selectSucursal.innerHTML = '<option value="0"> </option>';
            data.forEach(sucursal => {
                let opt = document.createElement('option');
                opt.value = sucursal.id;
                opt.textContent = sucursal.nombre;
                selectSucursal.appendChild(opt);
            });
            selectSucursal.disabled = false;
        })
        .catch(err => console.error("Error cargando sucursales:", err));
});