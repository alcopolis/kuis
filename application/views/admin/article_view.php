
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
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Penulis</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>View Count</th>
                            <th>Fav Count</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($article)) {
                            foreach ($article as $key => $row) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $row->full_name; ?></td>
                                    <td><?php echo $row->category_name; ?></td>
                                    <td><?php echo $row->article_title; ?></td>
                                    <td><?php echo $row->article_desc; ?></td>
                                    <td><?php echo $row->article_date; ?></td>
                                    <td><?php echo $row->article_status; ?></td>
                                    <td><?php echo $row->view_count; ?></td>
                                    <td><?php echo $row->like_count; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin_article/detail/' . $row->article_id); ?>"><i class="icon-eye-open"></i></a>
                                        <a class="article_delete" data-val="<?php echo $row->article_id; ?>"><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE PANEL -->
    </div>
</div>

<!-- end: PAGE CONTENT-->