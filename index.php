
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chisme Pop | El lado divertido de la farándula</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                CHISME<span>POP</span><i class="bi bi-stars"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categorias">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#comentar">Comentar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#comentarios">Opiniones</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <header class="hero-section" id="inicio">
        <div class="container">
            <div class="hero-content">
                <span class="hero-badge">
                    <i class="bi bi-fire"></i> EL LUGAR DONDE TODO SE COMENTA
                </span>

                <h1>¡Aquí se habla<br>de <span>todo!</span></h1>

                <p>
                    La farándula, las tendencias y las opiniones que no se quedan calladas.
                    ¡Únete a la conversación!
                </p>

                <a href="#comentar" class="btn btn-pop">
                    Déjanos tu opinión <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Categorías -->
    <section class="categories-section" id="categorias">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">EXPLORA</span>
                <h2>¿Qué está sonando?</h2>
            </div>

            <div class="categories-list">
                <a href="#comentarios" class="category-pill pill-pink">
                    <i class="bi bi-music-note-beamed"></i> Música
                </a>

                <a href="#comentarios" class="category-pill pill-purple">
                    <i class="bi bi-camera-fill"></i> Influencers
                </a>

                <a href="#comentarios" class="category-pill pill-yellow">
                    <i class="bi bi-tv-fill"></i> Televisión
                </a>

                <a href="#comentarios" class="category-pill pill-green">
                    <i class="bi bi-stars"></i> Artistas
                </a>

                <a href="#comentarios" class="category-pill pill-orange">
                    <i class="bi bi-chat-heart-fill"></i> Tendencias
                </a>
            </div>
        </div>
    </section>

    <!-- Formulario -->
    <section class="comment-form-section" id="comentar">
        <div class="container">
            <div class="comment-form-card">
                <div class="form-header">
                    <div class="form-icon">
                        <i class="bi bi-chat-heart-fill"></i>
                    </div>

                    <div>
                        <span class="section-label">TU VOZ CUENTA</span>
                        <h2>¡Suelta tu comentario!</h2>
                        <p>Queremos saber qué piensas.</p>
                    </div>
                </div>

                <!-- Formulario conectado con PHP -->
                <form id="commentForm" action="php/guardar_comentario.php" method="POST">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Tu nombre</label>
                        <input type="text"
                            class="form-control"
                            id="nombre"
                            name="nombre"
                            placeholder="¿Cómo te llamas?"
                            maxlength="100"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="comentario" class="form-label">Tu opinión</label>
                        <textarea class="form-control"
                            id="comentario"
                            name="comentario"
                            rows="4"
                            maxlength="2000"
                            placeholder="Cuéntanos qué está pasando..."
                            required></textarea>
                    </div>

                    <!-- Mensaje de éxito o error -->
                    <div id="formMessage" class="mb-3" role="status"></div>

                    <button type="submit" class="btn btn-pop btn-publish">
                        Publicar comentario <i class="bi bi-send-fill"></i>
                    </button>

                </form>
            </div>
        </div>
    </section>

    <!-- Comentarios -->
    <section class="comments-section" id="comentarios">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">LA COMUNIDAD</span>
                <h2>Lo que se está comentando <i class="bi bi-chat-dots-fill"></i></h2>
                <p>Opiniones, conversaciones y mucho entretenimiento.</p>
            </div>

            <!-- Los comentarios se cargarán desde MySQL -->
            <div class="row g-4" id="commentsContainer">
                <!-- JavaScript insertará aquí las tarjetas de comentarios -->
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-section">
        <div class="container text-center">
            <a class="footer-logo" href="#">CHISME<span>POP</span><i class="bi bi-stars"></i></a>

            <p>Donde la farándula se convierte en conversación.</p>

            <span class="footer-copy">
                Proyecto académico | Programación Web
            </span>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript para gestionar los comentarios -->
    <script src="js/comentarios.js"></script>

</body>
</html>
