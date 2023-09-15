<?php
global $testimonios;
$args = array(
    'post_type' => 'testimonios__', /* No traemos testimonios, pero el código sirve */
    'order' => 'ASC',
    'orderby' => 'title',
    'posts_per_page' => -1,
);
$entrada_index = 0;

$publicaciones = array();
$pagina = array();

$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) { 
        $query->the_post();
        $imagen = get_the_post_thumbnail($post->ID, 'full');
        
        $publicaciones[$post->ID] = array(
            "indice" => $entrada_index,
            "post_id" => $post->ID,

            "titulo" => get_the_title(),
            "imagen" => ($imagen == '') ? '' : $imagen,
            "clase" => ($imagen == '') ? 'sin-imagen' : '',
            "cargo" => get_field('cargo'),
            "descripcion" => get_field('descripcion'),
        );
        $entrada_index++;
    }
    $pagina = $query;
    wp_reset_postdata();
endif;

if(is_array($testimonios)){ /* Hay testimonios personalizados */
    $indice = 0;
    $publicaciones = array();
    foreach($testimonios as $cadaT){
        $imagen = $cadaT["imagen"];

        $publicaciones[$indice] = array(
            "indice" => $indice,
            "post_id" => $indice,

            "titulo" => $cadaT["nombre"],
            "imagen" => (!(is_array($imagen))) ? '' : '<img src="'. $cadaT["imagen"]["url"] .'" alt="'. $cadaT["nombre"] .'" />',
            "clase" => (!(is_array($imagen))) ? 'sin-imagen' : '',
            "cargo" => $cadaT["cargo"],
            "descripcion" => $cadaT["testimonio"],
        );
        $indice++;
    }
}

if(count($publicaciones) > 0):
?>
<div class="singleprograma__body--testimonios">
    <h2>Testimonios</h2>
    <div class="singleprograma__body--testimonios__cont">
        <div class="testimonios testimonios_slider">
            <?php foreach($publicaciones as $cadaP): ?>
            <div class="testimonios_indv">
                <div class="testimonios_indv--cont">
                    <div class="testimonios_indv--header <?= $cadaP["clase"] ?>">
                        <div class="testimonios_indv--header__foto">
                            <?= $cadaP["imagen"] ?>
                        </div>
                        <div class="testimonios_indv--header__textos">
                            <h3><?= $cadaP["titulo"] ?></h3>
                            <p><?= $cadaP["cargo"] ?></p>
                        </div>
                    </div>
                    <div class="testimonios_indv--body">
                        <p>
                            <?= $cadaP["descripcion"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php endif ?>