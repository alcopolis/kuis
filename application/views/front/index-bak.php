<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title . ucfirst($page); ?></title>


	<!-- PARTIAL | METADATA -->
	<?php $this->load->view('front/partials/metadata.html'); ?>

</head>



<body>
	<div class="wrapper">
        <section id="main" class="<?php echo $page; ?> left">
            <ul id="nav">
            	<li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo site_url(); ?>articles">Articles</a></li>
                <li><a href="<?php echo site_url(); ?>about">About</a></li>
            </ul>
            
            
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
                            $this->load->view('front/partials/recent_articles.html');
                        }
                    ?>
                </div>
            </div>
           	
            <?php if (!$this->session->userdata('logged_in')) { ?>
                <div style="width:100%; margin-top:80px; text-align:center; color:#FFF;" id="social">
                    <h6>FOLLOW</h6>
                    <a target="_blank" href="https://twitter.com/intent/follow?&amp;screen_name=innovateind" id="twitter" class="social-links"><img src="<?php echo base_url('assets/front'); ?>/images/twitter.png" title="Follow Innovate's Twitter" /></a>
                    <a target="_blank" href="https://www.facebook.com/pages/Innovate/370058633094270?fref=ts" id="fb" class="social-links"><img src="<?php echo base_url('assets/front'); ?>/images/fb.png" title="Follow Innovate's Facebook" /></a>
                </div>
            <?php } ?>
        </aside>
    </div>
    <div id="footer" class="wrapper clear">
    	Copyright &copy; <?php echo date('Y'); ?> Innovate - All Rights Reserved.
    </div>
</body>
</html>
