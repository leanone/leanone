<div class="container">
                        <div id="topbar">
                            <?php if(function_exists('wp_nav_menu')) {
                            wp_nav_menu(array(
                            'theme_location'=>'toolbar',
                            'menu_id'=>'toolbar',
                            'container'=>'ul')
                            );}
                            ?>
                        </div>
                 </div>