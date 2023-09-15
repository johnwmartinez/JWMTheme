<?php
get_header();


/* Noticias */

// post_type[posts], post_x_page[3]

$args = array(
    'post_type' => 'noticias',
    'orderby' => 'post_date',
    'posts_per_page' => 3,
);
$entrada_index = 0;
$noticias = array();
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) { 
        $query->the_post();
        $imagen = get_the_post_thumbnail($post->ID, 'medium_large');
        $imagen2 = get_the_post_thumbnail($post->ID, 'thumbnail');
        $noticias[$post->ID] = array(
            "indice" => $entrada_index,
            "post_id" => $post->ID,
            "titulo" => get_the_title(),
            "fecha" => get_the_date(),
            "descripcion" => get_the_excerpt(),
            "enlace" => get_the_permalink(),
            "imagen" => $imagen,
            "imagen2" => $imagen2,
        );
        $entrada_index++;
    }
    wp_reset_postdata();
endif;

/* if noticias is empty, I get the demo data */
if(count($noticias) == 0){
    $noticias = demo_data_noticias();
}


/* Eventos */
$args = array(
    'post_type' => 'eventos',
    'orderby' => 'post_date',
    'posts_per_page' => 3,
);
$entrada_index = 0;
$eventos = array();
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) { 
        $query->the_post();
        $imagen = get_the_post_thumbnail($post->ID, 'medium_large');
        $eventos[$post->ID] = array(
            "indice" => $entrada_index,
            "post_id" => $post->ID,
            "titulo" => get_the_title(),
            "fecha" => get_the_date(),
            "enlace" => get_the_permalink(),
            "imagen" => $imagen,
            "clase" => ($imagen == '') ? 'sin-imagen' : '',

            "fecha" => get_field('fecha'),
            "hora_inicial" => poner_am_pm_conpuntos(get_field('hora_inicial')),
            "ubicacion" => get_field('ubicacion'),
        );
        $entrada_index++;
    }
    wp_reset_postdata();
endif;

if(count($eventos) == 0){
    $eventos = demo_data_programas();
}

/* Aliados */
$args = array(
    'post_type' => 'aliados',
    'orderby' => 'post_date',
    'posts_per_page' => 20,
);
$entrada_index = 0;
$aliados = array();
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) { 
        $query->the_post();
        $imagen = get_the_post_thumbnail($post->ID, 'medium_large');
        $aliados[$post->ID] = array(
            "indice" => $entrada_index,
            "post_id" => $post->ID,
            "titulo" => get_the_title(),
            "fecha" => get_the_date(),
            "imagen" => $imagen,
            "descripcion" => get_field('descripcion'),
            "contenido" => get_field('contenido'),
            "categoria" => get_field('categoria'),
        );
        $entrada_index++;
    }
    wp_reset_postdata();
endif;

if(count($aliados) == 0){
    $aliados = demo_data_aliados();
}

?>
<div class="home__slider">
    <div class="home__slider--contenedor">
        <div class="slider_home">
            <div class="slide">
                <img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-4.jpg" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-8.jpg" alt="Slide 2">
            </div>
            <div class="slide">
                <img src="https://demo.pro.radio/wp6/wp-content/uploads/2021/09/pr-demo6-show-7.jpg" alt="Slide 3">
            </div>
        </div>
    </div>
</div>

<div class="home">


    <div class="home__bloque2 container-fluid g-0" id="noticias">
        <div class="container-lg g-0">
            <div class="row g-0 mb-5">
                <div class="col-12">
                    <h2 class="titulo"><strong>News</strong></h2>
                </div>
            </div>
            <div class="row g-0 mb-4">
                <div class="col-12 text-center">
                    <div class="noticias">

                        <?php foreach($noticias as $cadaP): ?>
                            <?php if($cadaP["indice"] == 0): ?>
                                <div class="noticias__card big">
                                    <div class="noticias__card--contenido">
                                        <div class="titulo">
                                            <h2><a href="<?= $cadaP["enlace"] ?>"><?= $cadaP["titulo"] ?> <i class="fas fa-arrow-right"></i></a></h2>
                                        </div>
                                        <div class="descripcion">
                                            <h3><?= $cadaP["fecha"] ?></h3>
                                            <p class="descrip"><?= $cadaP["descripcion"] ?></p>
                                            <p><a href="<?= $cadaP["enlace"] ?>"><i class="fas fa-arrow-right"></i></a></p>
                                        </div>
                                    </div>
                                    <div class="noticias__card--bg">
                                        <a href="<?= $cadaP["enlace"] ?>"><?= $cadaP["imagen"] ?></a>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if($cadaP["indice"] == 1): ?>
                                <div class="noticias__card dobles">
                                
                                    <div class="noticias__card--indv">
                                        <div class="noticias__card--contenido dobles">
                                            <div class="descripcion">
                                                <h3><?= $cadaP["fecha"] ?></h3>
                                                <h2><?= $cadaP["titulo"] ?></h2>
                                                <p class="descrip"><?= $cadaP["descripcion"] ?></p>
                                                <p><a href="<?= $cadaP["enlace"] ?>"><i class="fas fa-arrow-right"></i></a></p>
                                            </div>
                                        </div>
                                        <div class="noticias__card--bg dobles">
                                            <a href="<?= $cadaP["enlace"] ?>"><?= $cadaP["imagen2"] ?></a>
                                        </div>
                                    </div>
                                <?php if(count($noticias) == 2): ?>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                            <?php if($cadaP["indice"] == 2): ?>
                                <div class="noticias__card--indv">
                                    <div class="noticias__card--contenido dobles">
                                        <div class="descripcion">
                                            <h3><?= $cadaP["fecha"] ?></h3>
                                            <h2><?= $cadaP["titulo"] ?></h2>
                                            <p class="descrip"><?= $cadaP["descripcion"] ?></p>
                                            <p><a href="<?= $cadaP["enlace"] ?>"><i class="fas fa-arrow-right"></i></a></p>
                                        </div>
                                    </div>
                                    <div class="noticias__card--bg dobles">
                                        <a href="<?= $cadaP["enlace"] ?>"><?= $cadaP["imagen2"] ?></a>
                                    </div>
                                </div>
        
                            </div>
                            <?php endif ?>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-12 text-center">
                    <a href="#" class="enlace enlace-vermas">View all <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

        </div>
    </div>

    <?php if(is_array($eventos)): ?>
    <div class="home__bloque3 container-fluid g-0" id="eventos">
        <div class="container-lg g-0">
            <div class="row g-0 mb-5">
                <div class="col-12">
                    <h2 class="titulo"><strong>Events</strong> of the week <i class="fas fa-arrow-right"></i></h2>
                </div>
            </div>
            <div class="row g-0 mb-4">
                <div class="col-12 text-center">
                    <div class="eventos">
                        <?php foreach($eventos as $evento): ?>
                            <div class="eventos__card <?= $evento["clase"] ?>">
                                <?php if($evento["imagen"] != ""): ?>
                                <div class="eventos__card--foto">
                                    <a href="<?= $evento["enlace"] ?>" class="azul">
                                        <?= $evento["imagen"] ?>
                                    </a>
                                </div>
                                <?php endif ?>
                                <div class="eventos__card--content">
                                    <h3><?= $evento["fecha"] ?></h3>
                                    <h2><a href="<?= $evento["enlace"] ?>"><?= $evento["titulo"] ?></a></h2>
                                    <p><strong>Location: </strong><?= $evento["ubicacion"] ?> </p>
                                    <p><strong>Time: </strong> <?= $evento["hora_inicial"] ?></p>
                                </div>
                                <div class="eventos__card--arrow">
                                    <a href="<?= $evento["enlace"] ?>"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="row g-0 mb-4">
                <div class="col-12 text-center">
                    <a href="#" class="enlace enlace-vermas enlace-vermas__claro">View all <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>






    <div class="home__bloque5 container-fluid g-0" id="bolsa-empleo">
        <div class="container-lg g-0">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <div class="image_cover">
                        <img src="https://demo.pro.radio/wp4/wp-content/uploads/2021/08/2-770x433.jpg" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bolsaempleo">
                        <div class="bolsaempleo__cont">
                            <p><a href="#" class="btn btn-comunidad">Community</a></p>
                            <h3><strong>Do you know</strong> our Compensation plans?</h3>
                            <p><a href="#" class="btn btn-visitarahora">Visit now <i class="fas fa-arrow-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="home__bloque6 container-fluid g-0 mb-5" id="aliados">
        <div class="container-lg g-0">
            <div class="row g-0">
                <div class="col-9">
                    <h2 class="titulo"><strong>Our</strong> Allies</h2>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-12">
                    <div class="aliados_slider">
                        <?php foreach($aliados as $aliado): ?>
                            <div class="aliados_slide">
                                <div class="aliados_slide--cont">
                                    <div class="aliados_slide--imagen">
                                        <?= $aliado["imagen"] ?>
                                    </div>
                                    <div class="aliados_slide--descrp">
                                        <p><?= $aliado["descripcion"] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<?php
get_footer();
?>