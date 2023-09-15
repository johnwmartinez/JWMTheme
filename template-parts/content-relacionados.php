<?php global $publicaciones_relacionadas, $campo;
if(is_array($publicaciones_relacionadas)): ?>
<div class="relacionados">
    <div class="relacionados__cont">
        <h3>Te puede interesar</h3>
        <ul>
        <?php foreach($publicaciones_relacionadas as $cadaP): ?>
            <li>
                <a href="<?= get_permalink($cadaP[$campo]->ID) ?>"><?= $cadaP[$campo]->post_title ?> <i class="fas fa-arrow-right"></i></a>
            </li>
        <?php endforeach ?>
        </ul>
    </div>
</div>
<?php endif; ?>