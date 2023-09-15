<?php if(comments_open()): ?>
<div class="comentarios">
    <div class="comentarios__cont">
        <?php 
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>
    </div>
</div>
<?php endif ?>