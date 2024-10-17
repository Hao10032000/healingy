<?php
if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) :         
?> 
    <footer id="footer" class="footer <?php (themesflat_meta( 'footer_class' ) != "" ? esc_attr( themesflat_meta( 'footer_class' ) ):'') ;?>">
        <div class="footer-widgets">
            <div class="container">                
                <div class="row">
                    <?php                            
                    $footer_widget_areas = themesflat_get_opt('footer_widget_areas');
                    $columns = themesflat_widget_layout($footer_widget_areas); 
                    $key = 0;
                        foreach ($columns as $key => $column) {
                            $key = $key +1;
                            ?>
                        <div class="col-lg-<?php  echo esc_attr($column);?> col-md-6 widgets-areas">
                            <div class="wrap-widgets-<?php  echo esc_attr($key);?>">
                            <?php                                         
                                $widget = themesflat_get_opt("footer".$key);
                                themesflat_dynamic_sidebar($widget);
                            ?>
                            </div>
                        </div>
                    <?php } ?>        
                </div><!-- /.row -->                  
            </div><!-- /.container --> 
        </div><!-- /.footer-widgets -->
    </footer>
<?php endif; ?>