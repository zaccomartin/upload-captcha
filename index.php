<?php
session_start();
?>

<head>
<meta charset="UTF-8">
<title>Zacco Martin</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="function.js"></script>
</head>

<body id="page-top" class="index">

    
    <nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">zaccomartin@gmail.com</a>
            </div>

            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden active">
                        <a href="#page-top"></a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#services">Inicio</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#portfolio">Programa</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#about">Acerca</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#team">Configuracion</a>
                    </li>
                    <li class="">
                        <a class="page-scroll" href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
            
        </div>
       
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bienvenid@s</div>
                <div class="intro-heading">php 7</div>
                <a href="#portfolio" class="page-scroll btn btn-xl">Programa</a>
            </div>
        </div>
    </header>

    <!-- Inicio -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">inicio</h2>
                    <h3 class="section-subheading text-muted">explicacion</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-play"></i>
                    </span>
                    <h4 class="service-heading">Busqueda del archivo</h4>
                    <p class="text-muted">Buscaremos el archivo a subir al servidor, preferentemente debe ser una imagen de tipo  .jpg .gif</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-transfer"></i>
                    </span>
                    <h4 class="service-heading">Verificacion captcha</h4>
                    <p class="text-muted">El programa solicita una verificacion Captcha para continuar.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-floppy-saved"></i>
                    </span>
                    <h4 class="service-heading">Imagen cargada</h4>
                    <p class="text-muted">Si todo esta bien, podremos visualizar nuestra imagen guardada en el servidor.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Programa</h2>
                    <h3 class="section-subheading text-muted">Image Uploader con Captcha en php7</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">

<!-- programa  -->
    <form class="md-form" method="POST" action="index.php?#portfolio" enctype="multipart/form-data">
    <div class="file-field">
        <div class="btn btn-primary btn-sm float-left">
            <span>Elegir archivo</span>
            <input type="file" name="archivo" id="archivo">
        </div>
        <div class="file-path-wrapper">
            <br><img src="captcha.php" alt="captcha" class="rounded"><br><br>
            Ingrese los numeros : <input type="text" name="captcha" id="captcha"><br>
            <br><button type="submit" class="btn btn-primary" name="boton">Cargar</button>
        </div>
    </div>
    </form>
    <?php
    $error = 0;
    
 if(isset($_POST['boton'])){

    if ($_SESSION['numeroaleatorio'] == $_REQUEST['captcha']){
        

   // filtro
    $nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
   if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 1000000))) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 1 mb máximo.</td></tr></table></div>";
    $error = 2;
    exit();
    }

    if($error == 0){
        echo "Archivo cargado : ". $nombre_archivo;
        echo "<br>Tipo de archivo : ". $tipo_archivo;
        echo "<br>Tamaño : ". $tamano_archivo ."bytes";

        
        copy($_FILES['archivo']['tmp_name'], "uploads/".$nombre_archivo);
        echo "<br><div class=\"alert alert-info\" role=\"alert\">Imagen cargada.<br>";
        $nom = "uploads/".$nombre_archivo;
        echo "<a href=\"$nom\"><img src=\"$nom\"></a></div>";
    
    }

}else{
    
    echo "<div class=\"alert alert-danger\" role=\"alert\">Captcha erroneo, intente nuevamente.<br></div><br>";
        $error = 1;
}
 }


    ?>

                </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Acerca</h2>
                    <h3 class="section-subheading text-muted">Algunas experiencias y proyectos</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2010 - 2013</h4>
                                    <h4 class="subheading">RemoteExecution</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Conoci el foro de programacion y seguridad informatica, en el cual me senti atraido por los temas de los que se hablaba y los usuarios del mismo, aporte gran cantidad de papers y soporte a otros integrantes.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2013 - 2016</h4>
                                    <h4 class="subheading">Aspro</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Desarrollo de website, webmaster, content manager. Sitio desarrollado en html y PHP5. Uno de los primeros programas que complete y ofreci soporte durante el periodo de contrato.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2016 - actual</h4>
                                    <h4 class="subheading">Upwork</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Diseño y desarrollo de sistemas web, para usuarios de todo el mundo. Pasando por blogs, books, portafolios, webshops o ecommerce, sistemas de login, distintos upgrades a sistemas previamente creados.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2020</h4>
                                    <h4 class="subheading">Laravel 8</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Varios programas diseñados en laravel 7 , decido migrar a Laravel 8 , complementandolo con Jetstream y plantillas blade. Utilizo Laragon para el desarrollo y HeidiSQL para el manejo de las bases de datos.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Actualmente
                                    <br>utilizando
                                    <br>Bootstrap4</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Programas</h2>
                    <h3 class="section-subheading text-muted">Que utilizo para programar.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        
                        <h4>Visual Code 1.45.0</h4>
                        <p class="text-muted">Extensiones</p>
                        
                            <li>Laravel Blade Snippets 1.21.0
                            </li>
                            <li>Laravel Snippets 1.10.0
                            </li>
                            <li>PHP Intelephense 1.5.4
                            </li>
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        
                        <h4>Laragon 4.0.16</h4>
                        <p class="text-muted">Integrados</p>
                        
                            <li>Laravel 8
                            </li>
                            <li>PHP 7.3.8
                            </li>
                            <li>MySQL 5.7.24
                            </li>
                        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        
                        <h4>Apache</h4>
                        <p class="text-muted">Configuracion</p>
                        
                            <li>Httpd 2.4.35
                            </li>
                            <li>FileZilla
                            </li>
                            
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Estos son algunos de los programas que utilizo y sus versiones, de igual manera, proximamente estare migrando a PHP 8</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->
   

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contactame</h2>
                    <h3 class="section-subheading text-muted">Dejame un mensaje</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombre *" id="name" required="" data-validation-required-message="Ingresa tu nombre">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" id="email" required="" data-validation-required-message="Ingresa un correo electronico">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Telefono *" id="phone" required="" data-validation-required-message="Numero de telefono">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Mensaje *" id="message" required="" data-validation-required-message="Mensaje."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Zacco Martin</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="https://www.gnu.org/home.es.html">Privacidad</a>
                        </li>
                        <li><a href="https://www.gnu.org/licenses/licenses.es.html">Terminos de uso</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery Version 1.11.0 -->
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/classie.js"></script>
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/jqBootstrapValidation.js"></script>
    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/contact_me.js"></script>


<span style="height: 20px; width: 40px; min-height: 20px; min-width: 40px; position: absolute; opacity: 0.85; z-index: 8675309; display: none; cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAUCAYAAAD/Rn+7AAADU0lEQVR42s2WXUhTYRjHz0VEVPRFUGmtVEaFUZFhHxBhsotCU5JwBWEf1EWEEVHQx4UfFWYkFa2biPJiXbUta33OXFtuUXMzJ4bK3Nqay7m5NeZq6h/tPQ+xU20zugjOxR/+7/O8539+5znnwMtNTExwJtMb3L/fiLv3botCSmUjeCaejTOb39AiFothfHxcFIrHY8RksZjBsckJcOIRMfFsHD/SsbExUYpnI8DR0dGUGjSb0byhEJp5Uqg5CTSzc2CQleJbMEj9/ywBcGRkJEk9DQqouEVQT1sK444yWI9UonmTjGqauVLEIlHa9x8lAMbj8SSpp0rwKGMVvg8P46vbg0C7na8z8JsMcgHe7jlEa+edRhiLy8n/TUMfu6EvLElk+U0WtGwrTrdfAGQf5J8iiK4LVzDU28t8JtMSocf8E+l68myaNFXm/6rXslLK7ay5TOunuRvZWpJuvwAYjUaTpOIWoquuAZ219RTaxKYp9BbjycoN5FvL9qH9TBX5rvoGdJythvXYSTxdtRnWylO/ZdqrLsGwszzhWQ593z2KlAwCYCQSSZJ6ehZ0W7bD9VBLgN0NCqr3qR7R2rBrL3pu3Sb/7nDlz2uy6cG0OXk0GTbZXzNp8trsPAQdTj6frlWzN2DcXZGKQQAMh8NJ6rpyHe+PnkCr/CAFdZyvpfpjuvkifLF9wIt1Wwlo0OHie1RvWrKa93RjzfzliTzPKz3ltB0/Tevmwp14wGUgHAzSOoUEwFAolFaaBSuhnslPRkJexUJtZ6v5HtUeLswl33n1BgEY5fvhs9sJ3FAiT+QYyyvoAQJuD0KBAFRTJNAuz5/s3gJgMBhMJwrVFRThM5tY5zUF/A4X1f2fvQTRLCuBreoim0YmAbqNJryvPEXeeq46kaNdkQ/1HCncbJKPs9ZSv2VHGfWsZ2hfkhKAfr8/pdxWKx4wwD69PmVfNSOL+lr2w+gYqHpWDtXt1xQ8AMlWU0e1lqLd/APRHoP8AJqWrQG9gYxcPMsvSJUvAA4MDKTUJ7MZLaVy8v+qT21tcDx/OemePr0RTkNrur4A6PP5xCgBsL+/X4wiQDpuuVxOeL1eMYmYeDY6sOp0z+B0OuHxeEQhxkJMFosJiSO/UinOI/8Pc+l7KKArAT8AAAAASUVORK5CYII=);"></span></body>

