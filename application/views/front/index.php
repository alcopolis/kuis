<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>
		<?php 
			if($page === 'article'){
				echo 'Innovate Ceritamu | ' . $title; 
			}else{
				echo $title . ucfirst($page); 
			}
		?>
</title>
	<script type="text/javascript">
		var siteURL = '<?php echo site_url(); ?>';
		var baseURL = '<?php echo base_url(); ?>';
	</script>
    
    
	<!-- PARTIAL | METADATA -->
    <?php if($page === 'create'){ ?>
		<script src="<?php echo base_url('assets/ckeditor'); ?>/ckeditor.js" type="text/javascript"></script>
	<?php } ?>
    
	<?php $this->load->view('front/partials/metadata.html'); ?>
    
</head>

<body>
	<div class="wrapper">
        <section id="main" class="<?php echo $page; ?> left">
        	<?php if($this->uri->segment(1) === 'article'){ ?>
                <?php if($this->session->userdata('logged_in')){ ?>
					<?php if($fav_state){ ?>
                        <button id="like-button" class="liked" value="Favorite">Favorite</button>
                    <?php }else{ ?>
                        <button id="like-button" data-article_id="<?php echo $article->article_id; ?>" value="Make Favorite" onclick="processLike()" >Make Favorite</button>
                    <?php } ?>
                <?php }else{ ?>
                	<button id="like-button" data-article_id="<?php echo $article->article_id; ?>" value="Make Favorite" onclick="loginFirst()" class="fav-inactive" >Make Favorite</button>
                <?php } ?>
			<?php } ?>
            
            <ul id="nav">
            	<li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo site_url(); ?>articles">Cerita</a></li>
                <li class="last"><a href="<?php echo site_url(); ?>about">Mekanisme</a></li>
            </ul>
            
            
            <?php //if (!$this->session->userdata('logged_in')) { ?>
                <div style="position:absolute; top:95px; right:40px; text-align:center; color:#FFF;" id="social">
                    <h5 style="padding-bottom:5px; color:#004B76">FOLLOW</h5>
                    <a target="_blank" href="https://twitter.com/intent/follow?&amp;screen_name=innovateind" id="twitter" class="social-links"><img src="<?php echo base_url('assets/front'); ?>/images/twitter.png" title="Follow Innovate's Twitter" style="width:32px;"/></a>
                    &nbsp;
                    <a target="_blank" href="https://www.facebook.com/pages/Innovate/370058633094270?fref=ts" id="fb" class="social-links"><img src="<?php echo base_url('assets/front'); ?>/images/fb.png" title="Follow Innovate's Facebook" style="width:32px;" /></a>
                </div>
            <?php //} ?>
            
            <!-- PARTIAL | CONTENT -->
            <div class="content clearfix">
            	<?php $this->load->view('front/partials/page-' . $page . '.html'); ?>
            </div>
        </section>
        
        <aside class="right">
        	<h1 id="logo"><a href="/">Innovate Quad Play</a></h1>
               
           	<div id="sider">
            	<!-- PARTIAL | ASIDE -->
                <div class="aside-content">
					<?php
                        if (!$this->session->userdata('logged_in')) {
                            $this->load->view('front/partials/login.html', $notif);
                        }else{
							$this->load->view('front/partials/user_tools.html');
                        }
						
						$this->load->view('front/partials/recent_articles.html');
                    ?>
                </div>
            </div>
        </aside>
    </div>
    <div id="footer" class="wrapper clear" style="padding-left:30px;">
    	Copyright &copy; <?php echo date('Y'); ?> Innovate - All Rights Reserved.
    </div>
</body>
</html>
