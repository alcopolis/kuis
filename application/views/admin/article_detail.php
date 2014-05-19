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
                Tabel Artikel
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
                    <div class="col-md-12" id="article_detail">
                        <h3 class="article_title"><?php echo $article->article_title; ?></h3>

                        <div class="article_desc">
                            <div class="author">Penulis : <?php echo $article->full_name; ?></div>
                            <div class="cat">Kategori : <?php echo $article->category_name; ?></div>
                            <div class="stat">Status : <?php echo $article->article_status; ?></div>
                            <div class="date">Tanggal : <?php echo $article->article_date; ?></div>
                        </div>
                        <div class="article_img">
                            <img src="<?php echo base_url('article/' . $article->article_pic); ?>" />
                        </div>
                        <blockquote>
                            <p>
                                <?php echo $article->article_desc; ?>
                            </p>
                        </blockquote>
                        <p>
                            <?php echo $article->article_body; ?>
                        </p>
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
                            <a href="<?php echo site_url('admin_article/edit/' . $article->article_id); ?>" class="btn btn-info btn-squared btn-lg">
                                Edit <i class="icon-circle-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE PANEL -->
    </div>
</div>

<!-- end: PAGE CONTENT-->