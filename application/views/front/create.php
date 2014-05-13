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
            <div class="content clearfix" style="width:100%;left:auto; color:#FFF;">
                <?php if ($notif != NULL) { ?>
                    <div id="notif" style="font-size:12px; color:#F00; padding:10px; margin:10px 0; text-shadow:none; background:#FFF;">
                        <?php echo $notif; ?>
                    </div>	
                <?php } ?>


                <h1 class="page-title">+ Create Article</h1>
                <div id="create-article" class="clearfix">    
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="create_article">
                        <input type="text" name="article_title" id="article_title" placeholder="Title" maxlength="50" style="width:400px;"/>
                        <?php
                        echo form_dropdown('category_id', $category_drop, '');
                        ?>
                        <textarea name="article_desc" rows="5" cols="80" placeholder="Deskripsi"></textarea>
                        <textarea id="article_body" name="article_body"></textarea>
                        <input type="file" name="content" class="article_pic" />
                        <input type="submit" value="Submit"> <input type="button" name="cancel" value="Cancel">
                        <input type="hidden" value="<?php echo $previous ?>" name="last_viewed" />
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