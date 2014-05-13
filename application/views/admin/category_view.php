
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- start: DYNAMIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icon-external-link-sign"></i>
                Form Kategori
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
                <form role="form" class="form-horizontal" method="POST" action="<?php echo $action_save; ?>" id="category_form">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="icon-remove-sign"></i> You have some form errors. Please check below.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                            <i class="icon-ok"></i> Your form validation is successful!
                        </div>
                    </div>
                    <?php
                    if (isset($category_detail)) {
                        $detail = $category_detail[0];
                        echo form_hidden('category_id', $detail->category_id, 'id="category_id"');
                    }
                    ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="category_name">Nama Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo isset($detail) ? $detail->category_name : ''; ?>">
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
        <!-- end: DYNAMIC TABLE PANEL -->
    </div>
    <div class="col-md-12">
        <!-- start: DYNAMIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icon-external-link-sign"></i>
                Tabel Kategori
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
                            <th>Nama</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($category)) {
                            foreach ($category as $key => $row) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $row->category_name; ?></td>
                                    <td>
                                        <a class="category_delete" data-val="<?php echo $row->category_id; ?>"> <i class="icon-trash"></i></a>
                                        <a href="<?php echo site_url('category/edit/' . $row->category_id); ?>"> <i class="icon-edit"></i></a>
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