<?php
if (themesflat_get_opt('show_bottom') == 1):     
    ?> 
    <div id="bottom" class="bottom">
        <div class="container">           
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inside"> 
                        <div class="content-left">
                            <div class="copyright">                     
                                <span><?php echo wp_kses(themesflat_get_opt( 'footer_copyright'), themesflat_kses_allowed_html()); ?></span>
                            </div>
                        </div>
                        <div class="content-right">
                            <?php
                                 wp_nav_menu( array( 'theme_location' => 'bottom', 'fallback_cb' => 'themesflat_menu_fallback', 'container' => false ) );
                            ?>
                        </div>                 
                    </div>
                </div>                   
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
<?php endif; ?>