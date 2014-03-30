</div><!-- END WRAP-->

    <div id="footer" class="affix-bottom">
      <div class="container">
		<div class="row">
           
            <div class="col-sm-12 col-xs-12">
                <div class="col-sm-3 col-xs-12">
                    <?php dynamic_sidebar( 'footer1' ); ?>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <?php dynamic_sidebar( 'footer2' ); ?>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <?php dynamic_sidebar( 'footer3' ); ?>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <?php dynamic_sidebar( 'footer4' ); ?>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <p class="">Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2014 Net@Work</p>
            </div>

        </div>
      </div>
    </div>


<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>


  </body>
</html>