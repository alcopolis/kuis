
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="<?php echo site_url('user/add_admin'); ?>"><i class="icon-plus"></i> Tambah Admin</a>
        <!-- start: DYNAMIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icon-external-link-sign"></i>
                Tabel Admin
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
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($admin)) {
                            foreach ($admin as $key => $row) {
                                $is_active = array(
                                    '0' => 'Tidak Aktif',
                                    '1' => 'Aktif'
                                );
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->full_name; ?></td>
                                    <td><?php echo $row->role; ?></td>
                                    <td><?php echo form_dropdown('is_active', $is_active, $row->is_active, 'class="form-control user_isActive" data-val="' . $row->user_id . '"'); ?></td>
                                    <td>
                                        <a class="user_delete" data-val="<?php echo $row->user_id; ?>"><i class="icon-trash"></i></a>
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