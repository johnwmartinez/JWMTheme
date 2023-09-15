<?php 
get_header(); 

$header = get_field('banner_superior');

?>
<div class="Content-container Page contenido">
	<main class="paginas">
		<div class="paginas__header">
			<div class="paginas__header--cont">
				<div class="breadcrumbs">
					<?php
					if (function_exists('yoast_breadcrumb')) {
						yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
					}
					?>
				</div>
				<h1><?php the_title(); ?></h1>
				<div class="paginas__header--banner">
					<?php if(isset( $header["url"] )): ?>
					<img src="<?= $header["url"]; ?>" alt="<?= $header["alt"]; ?>" class="w-100">
					<?php endif; ?>
				</div>
			</div>

		</div>
		<?php while (have_posts()) : the_post(); ?>
			<section class="PostContent">
				<article>
					<?php the_content(); ?>
				</article>
			</section>
		<?php endwhile; ?>
	</main>


<div class="jwm_timeline" style="display:none;">
	<div class="jwm_timeline__cont">
		<?php for($i=0;$i<=6;$i++): ?>
		<div class="jwm_timeline__indv <?php if($i==0){ echo "activo"; } ?>">
			<div class="jwm_timeline__indv--cont">
				<div class="jwm_timeline__indv--img">
					<?php if($i % 2 != 0): ?>
						<div class="imagenvacia"></div>
					<?php endif ?>
				</div>
				<div class="jwm_timeline__indv--content">
					<div class="jwm_timeline__indv--content__cont">
						<h3>Título <?= $i ?></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sollicitudin semper erat in fermentum. Mauris quis sollicitudin leo. Etiam ullamcorper urna enim, eget sagittis turpis varius vitae.</p>
					</div>
				</div>
			</div>
		</div>
		<?php endfor ?>
	</div>
	<div class="jwm_timeline__nav">
		<div class="jwm_timeline__nav--btn">
			<a href="#" class="prev inactivo"><i class="fas fa-arrow-left"></i></a>
		</div>
		<div class="jwm_timeline__nav--anios">
			<ul>
				<?php for($i=0;$i<=6;$i++): ?>
				<li <?php if($i==0){ echo 'class="seleccionado"'; } ?>>
					<a href="#">
						<span class="circulo"></span>
						<span class="anio">2021</span>
					</a>
				</li>
				<?php endfor ?>
			</ul>
		</div>
		<div class="jwm_timeline__nav--btn">
			<a href="#" class="next"><i class="fas fa-arrow-right"></i></a>
		</div>
	</div>
</div>


</div>
<?php get_footer(); ?>