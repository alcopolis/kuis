<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
} else {
    $previous = base_url();
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Create Article</title>
        <script src="<?php echo base_url('assets/ckeditor'); ?>/ckeditor.js" type="text/javascript"></script>
        <?php $this->load->view('front/partials/metadata.html'); ?>
    </head>

    <body style="background:#333">
        <div class="wrapper">
            <div class="content clearfix" style="width:100%;left:auto; color:#FFF; margin-top:80px;">
                <?php if ($notif != NULL) { ?>
                    <div id="notif" style="font-size:12px; color:#F00; padding:10px; margin:10px 0; text-shadow:none; background:#FFF;">
                        <?php echo $notif; ?>
                    </div>	
                <?php } ?>



                <h1 class="page-title" style="margin-left:180px;">+ Create Article</h1>
                <div id="create-article" style="margin-top:20px;">    

                    <form class="form-horizontal" role="form" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="create_article">
                        <div class="form-group clearfix">
                            <label for="article_title" class="col-sm-2 control-label">Judul Artikel</label>
                            <div class="col-sm-8">
                                <input type="text" name="article_title" id="article_title" class="form-control" style="width:280px"/>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label for="category_id" class="col-sm-2 control-label">Kategori</label>
                            <div class="col-sm-8">
                                <?php
                                echo form_dropdown('category_id', $category_drop, '', 'class="form-control" id="category_id"');
                                ?>
                            </div>
                            <label for="provider" class="col-sm-2 control-label">Provider</label>
                            <div class="col-sm-8">
                                <input type="text" name="provider" id="provider" class="form-control" style="width:280px"/>&nbsp;&nbsp;&nbsp;<em style="font-size:11px;">Data tidak akan dipublikasikan</em>
                            </div>
                            <label for="usage" class="col-sm-2 control-label">Speed / Jumlah Channel</label>
                            <div class="col-sm-8">
                                <input type="text" name="usage" id="usage" class="form-control" style="width:280px"/>&nbsp;&nbsp;&nbsp;<em style="font-size:11px;">Data tidak akan dipublikasikan</em>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label for="article_desc" class="col-sm-2 control-label">Deskripsi Artikel</label>
                            <div class="col-sm-8">
                                <textarea name="article_desc" id="article_desc" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label for="article_body" class="col-sm-2 control-label">Isi Artikel</label>
                            <div class="col-sm-8">
                                <textarea id="article_body" name="article_body" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label for="" class="col-sm-2 control-label">Gambar Artikel</label>
                            <div class="col-sm-8">
                                <input type="file" name="content" class="form-control article_pic" />
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            <label for="inputEmail3" class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                            	<p style="margin-top:20px; font-size:11px;">Dengan klik tombol Submit, peserta bersedia mengikuti <a href="about" style="color:#97c8ff">syarat dan ketentuan</a> kuis yang berlaku.</p>
                                <input type="submit" id="submit_article" value="Submit"> <input type="button" name="cancel" value="Cancel">
                                <input type="hidden" value="<?php echo $previous ?>" name="last_viewed" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
//            CKEDITOR.replace('editor');
            CKEDITOR.replace('article_body');

            $('input[name="cancel"]').click(function() {
                window.history.back();
            });
        </script>
    </body>
</html>