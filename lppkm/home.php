<?php

?>                    
    <div id="main-col">
        <?php
            $db->runQuery("SELECT val FROM web_setting WHERE id='3'");
            $r=$db->dbFetch();
            $selamat_datang=$r['val'];
        ?>
        
        <div class="widget-area-8">
        
            <div class="widget kopa-twitter-widget">
                <h3 class="widget-title clearfix">
                    <span class="title-text">SAMBUTAN Ketua LPPKM UNTAN
                        <span class="triangle-right"></span>
                        <span class="triangle-left"></span>
                        <span class="triangle-bottom"></span>
                    </span>
                    <span class="title-right"></span>
                </h3>
                <p style="text-align:justify"><?php echo $selamat_datang;?></p>
                <!-- <div id="tweets" class="clearfix"></div> -->
                <!-- <a class="load-more" href="#">Load more</a> -->
            </div><!--kopa-twitter-widget-->
            
            <div class="kopa-divider"></div>
            
        </div>

        <div class="clear"></div>
        <!-- KATEGORI DOKUMEN
        <div class="widget-area-6">                    
         <?php //include "_sidebar/list_kategori_dokumen.php";?>
        </div>  -->

	
        
    </div><!--main-col-->
    
    <div class="widget-area-5 sidebar">
        <div class="widget home-slider-widget">
            <!-- <h3 class="widget-title"><span class="title-line"></span><span class="title-text">Terpopuler</span></h3> -->
            
        </div>    
      
       

    </div><!--widget-area-5-->
    
    <div class="clear"></div>
            