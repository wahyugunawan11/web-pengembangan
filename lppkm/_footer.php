<div class="bottom-sidebar clearfix">
            	
	<div class="widget-area-13">
		<div class="widget widget_text">
		<?php
		$db->runQuery("SELECT * FROM tb_linkterkait WHERE publish='Y' ORDER BY `order`,id");
		if($db->dbRows()>0){
		?>
		<h3 class="widget-title" style="color:#fff">Website Terkait</h3>
		<ul class="link-terkait">
			<?php
			if($db->dbRows()>10){
				$batas=ceil($db->dbRows()/2);
			}else{
				$batas=5;
			}
			$no=1;
			while($link=$db->dbFetch()){
				echo '<li><a target="_blank" href="'.$link['url'].'">'.$link['nama'].'</a></li>';
				if($no%$batas==0){
				echo '</ul><ul class="link-terkait">';
				}
			$no++;
			}
			?>
        </ul>
		<?php
		}
		?>
		</div>
	</div>
	
	<div class="widget-area-14" style="color:#fff">
		<div class="widget kopa-newsletter-widget">
			<h3 class="widget-title" style="color:#fff">Statistik Pengunjung</h3>
			<?php
			include "_sidebar/webcounter.php";
			?>
		
		</div>
	</div>
	
	<div class="clear"></div>
	
</div>

<footer id="page-footer">
	<nav id="footer-nav">
		<ul id="footer-menu" class="clearfix">
			<li style="color:#fff">Copyright&copy2016 LPPKM UNTAN</li>
		</ul>
	</nav>
</footer>