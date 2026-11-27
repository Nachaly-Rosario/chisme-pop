
document.addEventListener("DOMContentLoaded", function () {

    const formulario = document.getElementById("commentForm");
    const contenedor = document.getElementById("commentsContainer");
    const mensaje = document.getElementById("formMessage");

    const coloresAvatares = [
        "avatar-pink",
        "avatar-purple",
        "avatar-yellow"
    ];

    // Obtener los comentarios desde la base de datos
    async function cargarComentarios() {
        try {
            const respuesta = await fetch("php/obtener_comentarios.php");

            if (!respuesta.ok) {
                throw new Error("Error al obtener comentarios");
            }

            const comentarios = await respuesta.json();

            contenedor.innerHTML = "";

            // Verificar si existen comentarios
            if (comentarios.length === 0) {
                contenedor.innerHTML = `
                    <div class="col-12">
                        <p class="text-center">
                            Todavía no hay comentarios.
                            ¡Sé el primero en opinar!
                        </p>
                    </div>
                `;
                return;
            }

            // Recorrer los comentarios recibidos
            comentarios.forEach(function (comentario, index) {

                const columna = document.createElement("div");
                columna.className = "col-md-6 col-lg-4";

                const tarjeta = document.createElement("article");
                tarjeta.className = "comment-card";

                const usuario = document.createElement("div");
                usuario.className = "comment-user";

                // Avatar
                const avatar = document.createElement("div");
                avatar.className = "user-avatar " +
                    coloresAvatares[index % coloresAvatares.length];

                avatar.textContent =
                    comentario.autor.charAt(0).toUpperCase();

                // Información del usuario
                const infoUsuario = document.createElement("div");

                const nombre = document.createElement("h5");
                nombre.textContent = comentario.autor;

                const fecha = document.createElement("span");
                fecha.textContent = formatearFecha(comentario.fecha);

                infoUsuario.appendChild(nombre);
                infoUsuario.appendChild(fecha);

                usuario.appendChild(avatar);
                usuario.appendChild(infoUsuario);

                // Texto del comentario
                const texto = document.createElement("p");
                texto.className = "comment-text";
                texto.textContent = comentario.comentario;

                // Footer de la tarjeta
                const footer = document.createElement("div");
                footer.className = "comment-footer";

                const opinion = document.createElement("span");
                opinion.innerHTML =
                    '<i class="bi bi-heart-fill"></i> Opinión';

                const comunidad = document.createElement("span");
                comunidad.innerHTML =
                    '<i class="bi bi-chat-dots"></i> Comunidad';

                footer.appendChild(opinion);
                footer.appendChild(comunidad);

                // Construir tarjeta
                tarjeta.appendChild(usuario);
                tarjeta.appendChild(texto);
                tarjeta.appendChild(footer);

                columna.appendChild(tarjeta);
                contenedor.appendChild(columna);
            });

        } catch (error) {
            contenedor.innerHTML = `
                <div class="col-12">
                    <p class="text-center text-danger">
                        No fue posible cargar los comentarios.
                    </p>
                </div>
            `;

            console.error(error);
        }
    }

    // Formatear fecha de MySQL
    function formatearFecha(fechaMySQL) {
        const fecha = new Date(fechaMySQL.replace(" ", "T"));

        if (isNaN(fecha.getTime())) {
            return fechaMySQL;
        }

        return fecha.toLocaleString("es-DO", {
            dateStyle: "medium",
            timeStyle: "short"
        });
    }

    // Enviar comentario sin recargar la página
    formulario.addEventListener("submit", async function (event) {

        event.preventDefault();

        mensaje.textContent = "";
        mensaje.className = "mb-3";

        const datos = new FormData(formulario);

        try {
            const respuesta = await fetch(formulario.action, {
                method: "POST",
                body: datos
            });

            const resultado = await respuesta.json();

            if (!respuesta.ok || !resultado.success) {
                throw new Error(
                    resultado.message || "No se pudo publicar."
                );
            }

            // Mostrar mensaje de éxito
            mensaje.textContent = resultado.message;
            mensaje.classList.add("text-success");

            // Limpiar formulario
            formulario.reset();

            // Actualizar comentarios
            await cargarComentarios();

        } catch (error) {
            mensaje.textContent = error.message;
            mensaje.classList.add("text-danger");

            console.error(error);
        }
    });

    // Cargar comentarios al entrar a la página
    cargarComentarios();

});
