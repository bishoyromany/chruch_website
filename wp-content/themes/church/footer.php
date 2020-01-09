        <!-- back to top -->
        <div id="backToTop">
            <img src="<?php echo get_template_directory_uri() ?>/imgs/footer/arrow-up.svg" alt="Arrow Up">
        </div>


        <?php //dd(me_footer_menu()); ?>

        <footer class="footer">
            <div class="items">
                <div class="donate text-center">   
                    <a href="#">Donate</a>
                </div>  
                <div class="logo text-center">
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/imgs/church/logo.png" alt="Logo">
                </div>
                <?php foreach(me_footer_menu() as $item): ?>
                    <div class="text-center item">
                        <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
                    </div>    
                <?php endforeach; ?>      
                <div class="social">
                    <div>
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/imgs/church/social/facebook.svg" alt="Facebook"></a>
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/imgs/church/social/facebook.svg" alt="Facebook"></a>
                    </div>
                    <div>
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/imgs/church/social/facebook.svg" alt="Facebook"></a>
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/imgs/church/social/facebook.svg" alt="Facebook"></a>
                    </div>
                    <div>
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/imgs/church/social/facebook.svg" alt="Facebook"></a>
                        <a href="#"><img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/imgs/church/social/facebook.svg" alt="Facebook"></a>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    
        </div>
    </body>
</htm>