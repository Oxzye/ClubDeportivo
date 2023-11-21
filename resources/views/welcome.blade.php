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
<style>
    body {
            padding-top: 15px;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #FF0000 !important; /* Agregué !important para asegurar que el estilo se aplique */
            z-index: 1000;
        }

        .navbar-brand, .navbar-nav a {
            color: white !important; /* Agregué !important para asegurar que el estilo se aplique */
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .jumbotron {
            background: url('https://altoquedeportes.com.ar/wp-content/uploads/2020/08/columnista-marceloducart-20200823.jpg') center/cover;
            color: black;
            padding: 250px 0;
            background-size: cover;
            background-repeat: no-repeat;
            text-shadow: 2px 2px 4px #FFFFFF;
        }

        .welcome-text {
            color: white;
        }
        .about-me, .projects {
            background-color:  black;
            color: white;
            padding: 30px 0;
        }

        .card-group .card {
            margin-bottom: 20px;
            text-align: center;
            overflow: hidden; /* Ajuste para el efecto especial */
            transition: transform 0.3s; /* Ajuste para el efecto especial */
        }

        .card {
        height: 100%;
    }

    .card-img-top {
        height: 250px; /* Puedes ajustar la altura según tus necesidades */
        object-fit: cover;
    }

        .card-body {
            padding: 15px;
        }

        .card:hover {
            transform: scale(1.1); /* Ajuste para el efecto especial al pasar el mouse */
        }

        .carousel-caption {
            background: rgba(155, 148, 148, 0.7);
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
            background-color:  black;
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
        .navbar-logo {
            background-color: #FFFFFF; /* Color de fondo, por ejemplo blanco */
            padding: 5px; /* Ajusta el espaciado alrededor del logo */
            border-radius: 20px; /* Añade esquinas redondeadas para que se vea mejor */
        }

        .navbar-logo img {
            width: 50px; /* Ajusta el ancho del logo */
            height: 50px; /* Ajusta la altura del logo */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <div class="navbar-logo">
                <img src="{{ asset('images/factous.png') }}" alt="Club Logo">
            </div>
            <a class="navbar-brand" href="#">Club Deportivo Factous</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('#info') }}"><i class="fas fa-info-circle"></i> Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="{{ url('#noticias') }}"><i class="fas fa-newspaper"></i> Ultimas noticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('#contact') }}"><i class="fas fa-phone"></i> Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
                    </li>
                </ul>
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

<div class="jumbotron text-center" style="background: url('https://altoquedeportes.com.ar/wp-content/uploads/2020/08/columnista-marceloducart-20200823.jpg') center/cover; color: white; padding: 250px 0; background-size: cover; background-repeat: no-repeat;">
    <div style="background: rgba(0, 0, 0, 0.5); padding: 20px;">
        <h1 class="display-4">¡Descubre el Poder de la Pasión!</h1>
        <p class="lead">Bienvenido a Factous, el lugar donde la emoción y la diversión se encuentran. Sumérgete en un mundo de actividades deportivas apasionantes y únete a nuestra comunidad de entusiastas.</p>
        </div>
</div>

<section class="about-me">
    <div class="container">
        <h2 class="text-center" id="info">Descubre la Esencia de Factous</h2>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img src="https://www.vipealo.com/blog/wp-content/uploads/2022/02/AdobeStock_315861649-1.jpeg" class="img-fluid" alt="Club Logo">
            </div>
            <div class="col-md-8">
                <p>En Factous, no somos solo un club deportivo; somos una comunidad que celebra la pasión por el deporte y el bienestar. Con una amplia gama de actividades emocionantes, buscamos brindar experiencias que vayan más allá de lo ordinario.</p>
                <p>Descubre la esencia de Factous explorando nuestras instalaciones de vanguardia, participando en eventos emocionantes y conectándote con personas que comparten tu amor por el deporte. Tu viaje hacia una vida activa y llena de diversión comienza aquí.</p>
            </div>
        </div>
    </div>
</section>

<section class="recent-news">
    <div class="container">
        <h2 class="text-center" id="noticias">Explora las Últimas Novedades</h2>
        <hr>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card news-card">
                    <img src="https://estaticos-cdn.prensaiberica.es/clip/21ba0f71-b735-48de-8e72-c2df0629841b_alta-libre-aspect-ratio_default_0.jpg" class="card-img-top" alt="Noticia 1">
                    <div class="card-body">
                        <h5 class="card-title">Lukaku Brilla en el Último Encuentro</h5>
                        <p class="card-text">En el reciente enfrentamiento contra la selección de Azerbaiyán, el jugador belga, Lukaku, dejó su huella al anotar 4 goles en solo 20 minutos, llevando a su equipo a una victoria crucial.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card news-card">
                    <img src="https://www.elciudadanoweb.com/wp-content/uploads/2023/11/Scaloni-Argentina-1.jpg" class="card-img-top" alt="Noticia 2">
                    <div class="card-body">
                        <h5 class="card-title">Revuelo en la Selección Argentina</h5>
                        <p class="card-text">El director técnico Scaloni plantea cambios tácticos para el próximo partido contra Brasil en el Maracaná, generando expectación y debate entre los fanáticos.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card news-card">
                    <img src="https://www.infobae.com/new-resizer/1JwYRxLUJATugPGaudjvHpeFny8=/768x432/filters:format(webp):quality(85)/cloudfront-us-east-1.images.arcpublishing.com/infobae/Z4RMIM5TTZBJJMQ2HHJVYZUP3Q" class="card-img-top" alt="Noticia 3">
                    <div class="card-body">
                        <h5 class="card-title">¿En Peligro la Selección de Brasil?</h5>
                        <p class="card-text">Con cinco ausencias importantes, los puntos para la Canarinha están en duda frente al conjunto Albiceleste dirigido por Lionel Scaloni.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Carrusel de imágenes -->
<section class="projects">
    <div class="container">
        <h2 class="text-center" id="proy">Descubre Nuestras Actividades Deportivas</h2>
        <hr>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://procanchas.com.ar/wp-content/uploads/2022/12/cancha-tenis-la-plata-rugby.jpeg" class="d-block w-100 card-img-top" alt="Canchas de Tenis">
                    <div class="carousel-caption">
                        <h3>Canchas de Tenis</h3>
                        <p>Sumérgete en la emoción del tenis en nuestras canchas profesionales. ¡Experimenta la competencia y mejora tu juego!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://cordoba.gob.ar/wp-content/uploads/2022/01/WhatsApp-Image-2022-01-10-at-08.24.40-800x400.jpeg" class="d-block w-100 card-img-top" alt="Piscinas">
                    <div class="carousel-caption">
                        <h3>Piscinas Refrescantes</h3>
                        <p>Escapa del calor en nuestras modernas y refrescantes piscinas. Comparte momentos inolvidables con tu familia y amigos.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://quimicafacil.net/wp-content/uploads/2022/11/Campo-de-juego-1.jpg" class="d-block w-100 card-img-top" alt="Canchas de Fútbol">
                    <div class="carousel-caption">
                        <h3>Canchas de Fútbol 5 y 7</h3>
                        <p>Vive la pasión del fútbol en nuestras modernas canchas. Organiza partidos con amigos y demuestra quién es el mejor en el campo de juego.</p>
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

<div class="container-fluid contact" id="contact">
    <!-- Agregamos el footer -->
    <footer class="bg-danger text-light text-center py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>Email: info@clubdeportivo.com</p>
                    <p>Teléfono: +54 387 123 456</p>
                </div>
                <div class="col-md-4">
                    <h5>Redes Sociales</h5>
                    <a href="#" class="text-light"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-twitter-square fa-2x"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram-square fa-2x"></i></a>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Útiles</h5>
                    <a href="#info" class="text-light">Sobre Nosotros</a><br>
                    <a href="#contact" class="text-light">Contacto</a><br>
                    <a href="#news" class="text-light">Noticias</a>
                </div>
            </div>
        </div>
    </footer>
</div>      

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html><!-- Resto del código... -->

<!-- Bootstrap JS and dependencies (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
