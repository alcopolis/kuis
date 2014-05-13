
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
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
                <form role="form" class="form-horizontal" method="POST" action="<?php echo $action; ?>" id="admin_input">
                    <div class="col-md-12">
                        <div class="errorHandler alert alert-danger no-display">
                            <i class="icon-remove-sign"></i> You have some form errors. Please check below.
                        </div>
                        <div class="successHandler alert alert-success no-display">
                            <i class="icon-ok"></i> Your form validation is successful!
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="email">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="full_name">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="full_name" name="full_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pwd_again">Ulangi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="pwd_again" name="pwd_again">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="role">Role</label>
                        <div class="col-sm-9">
                            <?php echo form_dropdown('role', $role_drop, '', 'class="form-control"'); ?>
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
</div>

<!-- end: PAGE CONTENT-->