<div class="col-md-10"> 
    <button class="btn btn-default" name="register" data-toggle="modal" data-target="#adminRegModal">New Admin</button>

    <div class="modal fade" id="adminRegModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New Admin</h4>
                </div>
                <div class="modal-body">
                    <div id="form">
                        <div class="message"></div>
                        <?php
                        $attributes = array('id' => 'adminRegForm', 'class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('admin/newAdmin', $attributes);
                        ?>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="username" name="username" placeholder="jackWhite">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Dog1">
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="newAdminSubmit">Submit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</div>
</div>

