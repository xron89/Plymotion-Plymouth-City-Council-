<div class="col-md-10">
    <div class="header">
        <h2>Admins</h2>
    </div>

    <div class="tableContainer">
        <?php
        $attributes = array('id' => 'newsForm', 'role' => 'form');
        echo form_open('admin/manageNews', $attributes);
        ?>

        <div class="tableContent">
            <table class="table" style="width: 300px">
                <tr>
                    <th></th>
                    <th>Username</th>
                </tr>

                <?php foreach ($admins as $item): ?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?php echo $item['adminID'] ?>" /></td>
                        <td><?php echo $item['username'] ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <input type="hidden" id="action" name="action" value="" />
        </form>
    </div>

    <button class="btn btn-default" name="register" data-toggle="modal" data-target="#adminRegModal">New Admin</button>
    <button class="btn btn-default" name="editVenue" id="editVenueSubmit" >Edit Admin</button>
    <button class="btn btn-default" name="deleteVenue" id="deleteVenueSubmit" >Delete Admin</button>
</div>

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

