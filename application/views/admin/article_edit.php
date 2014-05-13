<?php
$article = $article_detail[0];
?>
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- start: DYNAMIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icon-external-link-sign"></i>
                Edit Artikel
                <div class="panel-tools">
                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                    </a>
                    <a class="btn btn-xs btn-link panel-expand" href="#">
                        <i class="icon-resize-full"></i>
                    </a>
                    </a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form role="form" class="form-horizontal" method="POST" action="<?php echo $action; ?>" id="article_edit">
                        <?php echo form_hidden('user_id', $article->user_id); ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="article_title">
                                Judul
                            </label>
                            <div class="col-sm-9">
                                <input type="text" id="article_title" name="article_title" class="form-control" value="<?php echo $article->article_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="article_desc">
                                Deskripsi Artikel
                            </label>
                            <div class="col-sm-9">
                                <textarea type="text" id="article_desc" name="article_desc" class="autosize form-control" rows="5"><?php echo $article->article_desc; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="article_body">
                                Isi Artikel
                            </label>
                            <div class="col-lg-9">
                                <textarea class="ckeditor" name="article_body" id="article_body"><?php echo $article->article_body; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <div class="btn-group btn-group-lg" id="article_status">
                                    <?php
                                    if ($article->article_status == 'pending') {
                                        ?>
                                        <a class = "btn btn-info btn-squared btn-lg" id="approve_article" data-val="<?php echo $article->article_id; ?>" href = "javascript:;">
                                            Approve
                                        </a>
                                        <a class = "btn btn-info btn-squared btn-lg" id="reject_article" data-val="<?php echo $article->article_id; ?>" href = "javascript:;">
                                            Reject
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class = "btn btn-info btn-squared btn-lg disabled" href = "javascript:;">
                                            <?php echo $article->article_status; ?>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-blue btn-block" type="submit">
                                    Simpan <i class="icon-circle-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end: DYNAMIC TABLE PANEL -->
</div>
</div>

<!-- end: PAGE CONTENT-->