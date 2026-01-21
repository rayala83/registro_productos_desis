# Sistema de Ingreso de Productos (PHP + PostgreSQL + AJAX)

Este proyecto es un formulario de pruebas profesional diseñado para el registro de artículos en una base de datos **PostgreSQL**. La aplicación utiliza una arquitectura limpia separando la lógica del servidor, el diseño y las validaciones interactivas en el cliente.

## 🚀 Tecnologías Utilizadas

* **Backend:** PHP (PDO para conexión segura a DB).
* **Frontend:** HTML5, CSS3 y **JavaScript Puro**.
* **Comunicación:** **AJAX** para validaciones en tiempo real y envío de datos sin recargar la página.
* **Base de Datos:** PostgreSQL.
* **Infraestructura:** Docker & Docker Compose.

## 🛠️ Requisitos Previos

Tienes dos formas de ejecutar este proyecto:

### Opción A: Usando Docker (Recomendado)
Ideal para mantener el entorno limpio y evitar configurar bases de datos manualmente.

1.  **Clonar el repositorio:**
    ```bash
    git clone [https://github.com/rayala83/registro_productos_desis.git)
    cd nombre-repo
    ```
2.  **Instalar Docker:** Si no lo tienes, descárgalo en [docker.com](https://www.docker.com/).
3.  **Levantar los contenedores:**
    Ejecuta el siguiente comando en la raíz del proyecto:
    ```bash
    docker-compose up -d
    ```
    *Esto creará automáticamente un contenedor para la base de datos PostgreSQL y otro para el servidor Apache/PHP.*
4.  **Acceder a la app:** Abre tu navegador en `http://localhost:8080`.

### Opción B: Usando XAMPP o Servidor Local
Si prefieres no usar Docker, puedes usar XAMPP (asegúrate de que tenga el driver de PostgreSQL habilitado):

1.  Mueve la carpeta del proyecto a `C:/xampp/htdocs/`.
2.  Abre el **XAMPP Control Panel** e inicia Apache.
3.  **Configuración de DB:** Deberás tener PostgreSQL instalado localmente y crear las tablas manualmente usando el archivo SQL adjunto.
4.  Ajusta las credenciales en `conexion.php`.
5.  Accede en `http://localhost/nombre-del-proyecto`.

## 📋 Funcionalidades y Validaciones

El formulario cuenta con validaciones estrictas mediante JavaScript antes del envío:

* **Código:** Formato alfanumérico, entre 5 y 15 caracteres. **Validación de unicidad mediante AJAX** (consulta a la BD en tiempo real).
* **Nombre:** Entre 2 y 50 caracteres.
* **Precio:** Validado con **Regex** para aceptar solo números positivos con hasta 2 decimales.
* **Bodegas y Sucursales:** Carga dinámica de datos. La sucursal se habilita solo al seleccionar una bodega.
* **Materiales:** Obligatorio seleccionar al menos 2 opciones.
* **Descripción:** Entre 10 y 1000 caracteres.


