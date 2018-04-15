
            	
<div class="row-fluid">
    <div class="span12">
        <div class="breadcrumb clearfix">
            <span>You are here:</span>
            <a href="<?php echo DOMAIN_UTAMA;?>">Beranda</a>
            <span>/</span>
            <span class="current-page">Buku Tamu</span>
        </div>
    </div><!--span12-->
</div><!--row-fluid-->

<div class="row-fluid">
	<div class="span12">
    	<div class="elements-box">                     
            <div class="row-fluid">
                <div class="span4 mb-20">
                    <!-- <h2 class="element-title">Isi Buku Tamu</h2> -->
                    <div id="contact-box">
                        <h3><span class="title-line"></span><span class="title-text">Tulis Buku Tamu Berikut</span></h3>  
							
                        <form id="contact-form" class="clearfix" action="act.bukutamu.php" method="post">
						<span class="c-note">Identitas Anda sangat diperlukan, Alamat email Anda tidak akan kami publikasikan.</span>
                            <p class="input-block clearfix">
                                <label class="required" for="contact_name">Nama Anda:</label>
                                <input class="valid" type="text" name="name" id="contact_name" value="">
                            </p>
                            <p class="input-block">
                                <label class="required" for="contact_email">Alamat Email:</label>
                                <input type="email" class="valid" name="email" id="contact_email" value="">
                            </p>
                            <p class="textarea-block">                        
                                <label class="required" for="contact_message">Tuliskan Tanggapan/Pesan/Saran/Kritik Anda:</label>
                                <textarea rows="4" cols="80" id="contact_message" name="message"></textarea>
                            </p> 
                            <p class="input-block">                                                
                                <label class="required" for="contact_url"> Kode Verifikasi: &nbsp <img src="_captcha.php"/> </label>
                                <input type="text" id="contact_url" value="" class="valid" name="captcha"  placeholder="Masukkan Kode Verifikasi">                                                
                            </p>

                            <p class="contact-button clearfix">                    
                                <input type="submit" id="submit-contact" value="Kirimkan">
                            </p>
                            <div class="clear"></div>                        
                        </form>
                        <div id="response"></div>
                    </div><!--contact-box-->
                </div>
                <div class="span8 mb-20">
                    <!-- <h2 class="element-title">Buku Tamu</h2> -->
                    <?php
                    $k="SELECT id,nama_lengkap,komentar,tgl,waktu FROM tb_komentar WHERE jenis='BT' AND publish='Y' ORDER BY tgl DESC";
                    
                    $p = new PagingHalaman;
                    $batas = 5;
                    $posisi = $p->cariPosisi($batas);
                    $db->runQuery($k);
                    $jlh=$db->dbRows();

                    $db->runQuery($k." LIMIT $posisi,$batas");

                    ?>
                    <div id="comments">
                        <h3><span class="title-line"></span><span class="title-text"><?php echo ($jlh==0)?"Buku Tamu Kosong":$jlh." Pesan/Komentar" ;?></span></h3>
                        <?php 
                        if($db->dbRows()>0){ 
                        ?>
                        <ol class="comments-list clearfix">
                            <?php
                            $no = $posisi + 1;
                            while($komentar=$db->dbFetch()){
                                ?>
                                <li class="comment clearfix">
                                    <article class="comment-wrap clearfix"> 
                                        <div class="comment-avatar">
                                            <img src="images/people.png" alt="">                                           
                                        </div>
                                        <div class="comment-body clearfix">
                                            <header class="clearfix">
                                                <div class="comment-meta">
                                                    <span class="author"><?php echo "#".$no."-".$komentar['nama_lengkap'];?></span>
                                                    <span class="date"><?php echo tanggalIndo($komentar['tgl'],'l, j F Y');?> pada <?php echo $komentar['waktu'];?></span>
                                                </div>
                                            </header>
                                            <p><?php echo $komentar['komentar'];?></p>                                                
                                        </div>
                                    </article>                                                                               
                                </li>
                                <?php
                                $no++;
                            }
                            ?>
                        </ol>
                        <?php 
                        }
                        ?>
                        <?php
                        $db->runQuery($k);
                        $jmldata = $db->dbRows();
                        $jmlhalaman = $p->jumlahHal($jmldata, $batas);
                        $linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
                        if ($jmlhalaman > 1) {
                            echo '<div class="pagination kopa-comment-pagination">' . $linkHalaman . '</div><br>';
                        }
                        ?>
                     
                        <div class="clear"></div>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>

            