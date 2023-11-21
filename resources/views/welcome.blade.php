<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Club Deportivo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-DbI1II4kp26GbJv8ZtpZcIyJ20w1wYjpTd1P9YVg/dZ0hyIXBtB3HC+6tfzrOe2aONkk5fUPMYc9LlPgj/rJXw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://kit.fontawesome.com/4f89ce3630.js" crossorigin="anonymous"></script>

    <style>
      body {
        padding-top: 15px; /* Ajuste para la barra de navegación fija */
        background-color: #f8f9fa;
    }

    .navbar {
        background-color: #28a745;
        z-index: 1000; /* Ajuste del z-index para que el navbar esté por encima de la imagen */
    }

    .navbar-brand {
        color: white;
        font-weight: bold;
    }

    .navbar-toggler-icon {
        background-color:white;
    }

    .navbar-nav a {
        color: white;
    }

    .jumbotron {
        background: url('https://altoquedeportes.com.ar/wp-content/uploads/2020/08/columnista-marceloducart-20200823.jpg') center/cover;
        color: black; /* Ajuste para que el texto sea visible en la imagen de fondo */
        padding: 250px 0; /* Ajuste del espaciado interno */
        background-size:cover; /* Ajuste para cubrir completamente el contenedor */
        background-repeat: no-repeat; /* Evitar que se repita la imagen */
        
    }


        .about-me, .projects {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
        }

        .card-group .card {
            margin-bottom: 20px;
            text-align: center;
            overflow: hidden; /* Ajuste para el efecto especial */
            transition: transform 0.3s; /* Ajuste para el efecto especial */
        }

        .card-img-top {
            height: 250px; /* Ajusta la altura de todas las imágenes */
            object-fit: cover; /* Ajusta la forma en que las imágenes se ajustan al contenedor */
            transition: transform 0.3s; /* Ajuste para el efecto especial */
        }

        .card-body {
            padding: 15px;
        }

        .card:hover {
            transform: scale(1.1); /* Ajuste para el efecto especial al pasar el mouse */
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            position:sticky;
            bottom: 0;
            width: 100%;
        }

        .carousel-caption p {
            color: white;
            margin-bottom: 0;
        }

        .contact {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
        }
        .start-link, .register-link, .login-link {
            color: #ffffff;
            font-size: 20px;
            text-decoration: none;
            margin-right: 15px;
            position: relative;
            transition: color 0.3s;
        }

        .start-link i, .register-link i, .login-link i {
            margin-right: 5px;
        }

        .start-link:hover, .register-link:hover, .login-link:hover {
            color: #ffd700; /* Cambia el color al pasar el mouse */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Club Deportivo Factous</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('#info') }}"><i class="fas fa-info-circle"></i> Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('#contact') }}"><i class="fas fa-phone"></i> Contacto</a>
                    </li>
                </ul>
                <div class="navbar-logo">
                    <img src="tu_ruta_de_imagen/logo.png" alt="Club Logo">
                </div>
            </div>
        </div>
    </nav>
    
<div class="login-register">
    @if (Route::has('login'))
        <div class="navbar-text">
            @auth
                <a href="{{ url('/home') }}" class="text-light">Inicio</a>
            @else
                <a href="{{ route('login') }}" class="text-light">Iniciar Sesión</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-light ml-3">Registro</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="jumbotron text-center">
    <h1 class="display-4">¡Bienvenido al Club Deportivo!</h1>
    <p class="lead">Descubre nuestras actividades deportivas emocionantes y únete a la diversión.</p>
</div>

<section class="about-me">
    <div class="container">
        <h2 class="text-center" id="info">Sobre Nosotros</h2>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img src="https://www.vipealo.com/blog/wp-content/uploads/2022/02/AdobeStock_315861649-1.jpeg" class="img-fluid" alt="Club Logo">
            </div>
            <div class="col-md-8">
                <p>Somos Factous el club deportivo que puede terminar con el aburrimiento en tu vida, debido a las diferentes actividades que se pueden realizar</p>
            </div>
        </div>
    </div>
</section>

<!-- Carrusel de imágenes -->
<section class="projects">
    <div class="container">
        <h2 class="text-center" id="proy">Actividades deportivas</h2>
        <hr>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://procanchas.com.ar/wp-content/uploads/2022/12/cancha-tenis-la-plata-rugby.jpeg" class="d-block w-100 card-img-top" alt="Proyecto 1">
                    <div class="carousel-caption">
                        <p>Vení y disfrutá en nuestras canchas de tenis</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://cordoba.gob.ar/wp-content/uploads/2022/01/WhatsApp-Image-2022-01-10-at-08.24.40-800x400.jpeg" class="d-block w-100 card-img-top" alt="Proyecto 2">
                    <div class="carousel-caption">
                        <p>Cansado del calor, en Factous podes disfrutar de las mejores piletas de la provincia. Vení y disfruta con tu familia y compartí un lindo momento recreativo junto con nosotros.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://quimicafacil.net/wp-content/uploads/2022/11/Campo-de-juego-1.jpg" class="d-block w-100 card-img-top" alt="Proyecto 3">
                    <div class="carousel-caption">
                        <p>En factous también podes disfrutar de la mejor experiecia en canchas de futbol 5 y 7, vení y divertite con tus amigos para ver quien es mejor </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<div class="container-fluid contact">
    <h1 class="display-4" id="contact">Contacto</h1>
    <p>Puedes contactarnos en <a href="#"><i class="fab fa-whatsapp fa-2x"></i></a></p>
    <p>También nos encuentras en Instagram <a href="#"><i class="fab fa-instagram fa-2x"></i></a></p>
    <p>O puedes enviarnos un correo electrónico <a href="#"><i class="fas fa-envelope fa-2x"></i></a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html><!-- Resto del código... -->

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
