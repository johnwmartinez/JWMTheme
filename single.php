<?php
/*
    Template Name: Blog post individual
*/
get_header();
$imagen = get_the_post_thumbnail($post->ID, 'full');

$cargos = get_terms_formateadas(get_the_terms($post->ID, 'categories'));
$autor_id = get_post_field('post_author', $post->ID);
$autor = get_the_author_meta('display_name', $autor_id);
$fecha = get_the_date();

$avatar = get_avatar($autor_id);
$cargo = '';

$custom_autor = get_field('autor');

$publicaciones_relacionadas = get_field('publicaciones_relacionadas');
$campo = 'blog';

if ($custom_autor[0]["nombre"] != "") {
    $avatar = '<img src="' . $custom_autor[0]["imagen"]["url"] . '" alt ="' . $custom_autor[0]["nombre"] . '" />';
    $cargo = $custom_autor[0]["cargo"];
    $autor = $custom_autor[0]["nombre"];
}
?>
<main class="PostContent singleblog">

    <div class="singleblog__header">
        <div class="singleblog__header--cont">
            <div class="breadcrumbs">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs" class="claro">', '</p>');
                }
                ?>
            </div>
        </div>

    </div>

    <div class="singleblog__cont">

        <div class="singleblog__body">
            <div class="singleblog__body--intro">
                <p class="fecha"><?= $fecha; ?></p>
                <h1><?php the_title() ?></h1>
            </div>
            <div class="singleblog__body--author">
                <div class="singleblog__body--author_avatar">
                    <?= $avatar ?>
                </div>
                <div class="singleblog__body--author_textos">
                    <h3>Por <?= $autor; ?></h3>
                    <p><?= $cargo ?></p>
                </div>
            </div>
            
            <article>
                <div class="singleblog__body--content">
                    <div class="singleblog__body--content--cont">
                        <?php the_content() ?>
                    </div>
                </div>
                
            </article>
        </div>

        
    </div>
    
    <?php echo get_template_part('template-parts/content', 'relacionados'); /* Módulo de relacionados */ ?>

    <?php echo get_template_part('template-parts/content', 'compartir'); /* Módulo de compartir */ ?>
    
    <?php echo get_template_part('template-parts/content', 'comentarios'); /* Módulo de comentarios */ ?>
    
</main>
<?php get_footer(); ?>