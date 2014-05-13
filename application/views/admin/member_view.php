
<div id="banned_reason" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
        </button>
        <h4 class="modal-title">Register Demo</h4>
    </div>
    <form method="post" role="form" class="form-horizontal" action="<?php echo site_url('user/banned_user'); ?>" id="banned_form">
        <div class="modal-body">
            <div class="col-md-12">
                <div class="errorHandler alert alert-danger no-display">
                    <i class="icon-remove-sign"></i> You have some form errors. Please check below.
                </div>
                <div class="successHandler alert alert-success no-display">
                    <i class="icon-ok"></i> Your form validation is successful!
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="banned_reason">Banned Reason</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="banned_reason" name="banned_reason">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                Close
            </button>
            <button type="submit" class="btn btn-blue">
                Save changes
            </button>
        </div>
    </form>
</div>
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- start: DYNAMIC TABLE PANEL -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icon-external-link-sign"></i>
                Tabel Member
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
                            <th>Banned</th>
                            <th>Status</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($member)) {
                            foreach ($member as $key => $row) {
                                $is_active = array(
                                    '0' => 'Tidak Aktif',
                                    '1' => 'Aktif'
                                );
                                $banned = array(
                                    '0' => 'unbanned',
                                    '1' => 'banned'
                                );
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td><?php echo $row->full_name; ?></td>
                                    <td><?php echo form_dropdown('banned', $banned, $row->is_banned, 'class="form-control user_banned" data-val="' . $row->user_id . '"'); ?></td>
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