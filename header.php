<?php
/* Search variables */
$search = '';
if(isset($_GET["s"])){
    $search = $_GET["s"];
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description') ?>">
    
    <!-- Fuentes -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/fuentes/cera_pro/stylesheet.css">

    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Estilos por página -->
    <?php if(is_front_page()): ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/home.css">
    <?php endif; ?>
    <!-- // Estilos por página -->
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <div class="bg"></div>
    <div class="gamers">
        <header class="cabecera sticky">
            <div class="top_bar">
                <ul>
                    <li><a href="#" class="search_trigger"><i class="far fa-search"></i> Search</a></li>
                </ul>
            </div>
            <div class="buscador__sombra">
                <div class="buscador__contenedor">
                    <div class="buscador__contenedor--results">
                        <form action="/" class="search" method="get">
                            <input type="text" class="form-control" name="s" placeholder="search" value="<?= $search ?>" />
                            <button type="submit" class="search__btn"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="contenido">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url('/'));  ?>">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png" alt="John W. Martínez - Developals">
                    </a>
                </div>
                <div class="menu_mb d-block d-lg-none">
                    <div class="menu_celulares w-100">
                        <nav class="navbar navbar-light ms-2">
                            <button class="navbar-toggler abrir_menu_cell" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </button>
                        </nav>
                    </div>
                </div>
                <div class="menu d-none d-lg-block">
                    <div class="menu__cont">
                        <?php
                        $menuToUse = 'main_menu';
                        if (has_nav_menu($menuToUse)) {
                            wp_nav_menu(array(
                                'theme_location'        => $menuToUse,
                                'container'             => 'nav',
                                'container_class'       => 'main-menu-container',
                                'menu_class'            => 'main-menu',
                                'depth'                 => 0,
                            ));
                        }
                        ?>
                    </div>
                </div>
                <div class="call_to_action menu d-none d-lg-block">
                    <a href="#" class="btn btn-contactenos">Blog <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </header>
        <div class="menu_responsive_cont d-block d-lg-none">
            <a href="#" class="cerrar_menu_cell">
                <svg style="width:28px;" class="icon-color1" xmlns="http://www.w3.org/2000/svg" width="56.569" height="56.568" viewBox="0 0 56.569 56.568">
                    <g id="Grupo_1161" data-name="Grupo 1161" transform="translate(-1007.025 -5243.704)">
                        <rect id="Rectángulo_968" data-name="Rectángulo 968" width="6" height="74" rx="3" transform="translate(1059.351 5243.704) rotate(45)" />
                        <rect id="Rectángulo_969" data-name="Rectángulo 969" width="6" height="74" rx="3" transform="translate(1007.025 5247.946) rotate(-45)" />
                    </g>
                </svg>

            </a>
            <div class="menu_respon_total">
                <div>
                    <?php
                    if (has_nav_menu($menuToUse)) {
                        wp_nav_menu(array(
                            'theme_location' => $menuToUse,
                            'container' => 'nav',
                            'container_class' => 'main-menu-mb-container',
                            'menu_class'      => 'main-menu-mb menu_responsive'
                        ));
                    }
                    ?>
                    <div class="menu_respon_total--botones">
                        <div class="mb-3">
                            <a href="#" class="btn btn-contactenos">Blog <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
        <div class="gamers__cuerpo">