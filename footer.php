<?php
$whatsapp = get_option('jw_whatsapp_numero');
?>
            <footer class="footer" id="footer">
                
                <div class="container-fluid g-0">
                    <div class="row g-0">
                        
                        <div class="col-12 g-0 d-md-block menu_footer">

                            <div class="footer_top">
                                <div class="footer_top--cont">
                                    <div class="footer_top--logo">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo_white.png" alt="John W. Martínez - Developals">
                                    </div>
                                    <div class="footer_top--address">
                                        <p>John W. Martínez - Senior Dev at Developals</p>
                                        <p>Cali, Colombia</p>
                                        <p><a href="mailto:info@johnwmartinez.com">info@johnwmartinez.com</a></p>

                                    </div>
                                    <div class="footer_top--social">
                                        <?php echo get_template_part('template-parts/content', 'social'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="footer_bottom">
                                <div class="footer_bottom--cont">
                                    <div class="footer_bottom--menus">
                                        <div class="footer_bottom--menus_indv">
                                            <?php
                                            $menuToUse = 'menu_footer1';
                                            if (has_nav_menu($menuToUse)) {
                                                wp_nav_menu(array(
                                                    'theme_location' => $menuToUse,
                                                    'container' => 'nav',
                                                    'container_class' => 'menu-footer-container',
                                                    'menu_class'      => 'menu-footer'
                                                ));
                                            }
                                            ?>
                                        </div>
                                        <div class="footer_bottom--menus_indv">
                                            <?php
                                            $menuToUse = 'menu_footer2';
                                            if (has_nav_menu($menuToUse)) {
                                                wp_nav_menu(array(
                                                    'theme_location' => $menuToUse,
                                                    'container' => 'nav',
                                                    'container_class' => 'menu-footer-container',
                                                    'menu_class'      => 'menu-footer'
                                                ));
                                            }
                                            ?>
                                        </div>
                                        <div class="footer_bottom--menus_indv">
                                            <?php
                                            $menuToUse = 'menu_footer3';
                                            if (has_nav_menu($menuToUse)) {
                                                wp_nav_menu(array(
                                                    'theme_location' => $menuToUse,
                                                    'container' => 'nav',
                                                    'container_class' => 'menu-footer-container',
                                                    'menu_class'      => 'menu-footer'
                                                ));
                                            }
                                            ?>
                                        </div>
                                        <div class="footer_bottom--menus_indv">
                                            <?php
                                            $menuToUse = 'menu_footer4';
                                            if (has_nav_menu($menuToUse)) {
                                                wp_nav_menu(array(
                                                    'theme_location' => $menuToUse,
                                                    'container' => 'nav',
                                                    'container_class' => 'menu-footer-container',
                                                    'menu_class'      => 'menu-footer'
                                                ));
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="footer_bottom--copyright">
                                        <div class="footer_bottom--copyright__col">
                                            <p>&copy; Made with love by Developals.com</p>
                                        </div>
                                        <div class="footer_bottom--copyright__col text-start text-lg-end">
                                            <p><a href="#">Privacy Police</a> | <a href="#">Terms and Conditions</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </footer>
        </div><!-- cuerpo -->
    </div><!-- aplus_contenedor -->
<?php
/*
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.4.0.js"></script>
*/
?>

<?php if($whatsapp != ""): ?>
    <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp; ?>&text=Hola.%20Necesito%20m%C3%A1s%20informaci%C3%B3n." class="btn-whatsapp"><i class="fab fa-whatsapp"></i></a>
<?php endif; ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
<?php wp_footer(); ?>


</body>
</html>