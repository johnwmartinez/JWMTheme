<?php get_header();
$s = get_search_query();
$args = array(
    's' =>$s
);
$salida = array();

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { // Encontró
    while ( $the_query->have_posts() ):
        $the_query->the_post();
        $imagen = get_the_post_thumbnail($post->ID, 'full');

        $salida[$post->ID]["id"] = get_the_ID();
        $salida[$post->ID]["titulo"] = get_the_title();
        $salida[$post->ID]["imagen"] = $imagen;
        $salida[$post->ID]["fecha"] = get_the_date();
        $salida[$post->ID]["excerpt"] = get_the_excerpt();
        $salida[$post->ID]["enlace"] = get_the_permalink();
        
    endwhile;
}
$total_resultados = count($salida);

?>
<div class="blogint">
    <div class="busqueda">
        <div class="busqueda__cont">
    
        <?php
                
            if($total_resultados > 0){
                ?>
                    <div class="busqueda__resultados">
                        <div class="busqueda__resultados--int">
                            <div class="busqueda__resultados--contenidos">
                                <p>Estamos mostrando resultados de búsqueda de: <strong>“<?= $_GET["s"] ?>”</strong></p>
                                <div class="productos_gen--productos">
                                    <div class="products__prod">
                                        <div class="blogpubs">
                                            <?php $jndice = 0;
                                            foreach ($salida as $entrada) : ?>
                                                <div class="blogpubs__card">
                                                    <div class="blogpubs__card--cont">
                                                        <?php if($entrada["imagen"] != ""): ?>
                                                            <div class="blogpubs__card--foto search">
                                                                <a href="<?= $entrada["enlace"] ?>">
                                                                    <?= $entrada["imagen"] ?>
                                                                </a>
                                                            </div>
                                                        <?php endif ?>
                                                        <div class="blogpubs__card--content">
                                                            <div class="blogpubs__card--content__int">
                                                                <h3><?= $entrada["fecha"] ?></h3>
                                                                <h2><a href="<?= $entrada["enlace"] ?>"><?= $entrada["titulo"] ?></a></h2>
                                                                <p><?= $entrada["excerpt"] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php $jndice++;
                                            endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            }else{ // No encontró
            ?>
                <div class="busqueda__noencontrado">
                    <div class="busqueda__noencontrado__int">
                        <div class="busqueda__noencontrado__contenido">
                            <h1>No results found for your search</h1>
                            <div class="busqueda__noencontrado__contenido--texto">
                                <p>
                                    Sorry, we did not find results related to <strong>“<?= $_GET["s"] ?>”</strong>. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>  
        <?php } ?>
        </div>
    </div>
</div>
<?php get_footer() ?>