<?php if($this->session->userdata('auth') === "user") { ?>
<div id="content" class="container">
    <div class="row">
<?php } ?>
<div class="col-md-10">
    <div class="header">
        <?php if ($this->session->userdata('auth') === "user") { ?>
            <h2>Your Profile</h2>
        <?php } else { ?>
            <h2><?php echo $user->firstName . " " . $user->lastName . "'s Profile" ?></h2>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">  
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title">Basic Information</h3>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" name="editDetailsSubmit" data-toggle="modal" data-target="#editDetailsModal">Edit Details</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>Name</th>
                            <td><?php echo $user->firstName . " " . $user->lastName ?></td>
                        </tr>
                        <tr>
                            <td>Address</th>
                            <td><?php echo $user->address ?></td>
                        </tr>
                        <tr>
                            <?php
                            $date = strtotime($user->dateOfBirth);
                            $date = date("d-m-Y", $date);
                            ?>
                            <td>Date of Birth</th>
                            <td><?php echo $date ?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</th>
                            <td><?php echo $user->phoneNumber ?></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</th>
                            <td><?php echo $user->mobileNumber ?></td>
                        </tr>
                        <tr>
                            <td>Email</th>
                            <td><?php echo $user->email ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title">Additional Information</h3>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" name="editAdditionalSubmit" data-toggle="modal" data-target="#editAdditionalModal">Edit Details</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Emergency Contact</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td><?php
                                        if ($user->ecName === null) {
                                            echo "N/A";
                                        } else {
                                            echo $user->ecName;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Relationship</td>
                                    <td><?php
                                        if ($user->ecRelationship === null) {
                                            echo "N/A";
                                        } else {
                                            echo $user->ecRelationship;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td><?php
                                        if ($user->ecMobileNo === null) {
                                            echo "N/A";
                                        } else {
                                            echo $user->ecMobileNo;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php
                                        if ($user->ecPhoneNo === null) {
                                            echo "N/A";
                                        } else {
                                            echo $user->ecPhoneNo;
                                        }
                                        ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php if ($user->medicalConditions === "1") { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Medical Details</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                if ($user->medicalDetails === null) {
                                    echo "N/A";
                                } else {
                                    echo $user->medicalDetails;
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ($this->session->userdata('auth') === "admin") { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Booked Sessions</h3>
                    </div>
                    <div class="panel-body">
                        Panel content
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="modal fade" id="editDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Basic Information</h4>
            </div>
            <div class="modal-body">
                <div id="form">
                    <?php
                    $attributes = array('id' => 'editDetailsForm', 'class' => 'form-horizontal', 'role' => 'form');
                    echo form_open('editUserBasic', $attributes);
                    ?>
                    <input type="hidden" name="userID" value="<?php echo $user->userID ?>">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">First Name:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="firstname" name="firstname" value="<?php echo $user->firstName ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="surname" class="col-sm-3 control-label">Surname:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="surname" name="surname" value="<?php echo $user->lastName ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="address" name="address" value="<?php echo $user->address ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="dob" name="dob" value="<?php echo $date ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Phone Number:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="phone" name="phone" value="<?php echo $user->phoneNumber ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Mobile Number:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="mobile" name="mobile" value="<?php echo $user->mobileNumber ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="email" name="email" value="<?php echo $user->email ?>">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editDetailsSubmit">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="editAdditionalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Additional Information</h4>
            </div>
            <div class="modal-body">
                <div id="form">
                    <?php
                    $attributes = array('id' => 'editAdditionalForm', 'class' => 'form-horizontal', 'role' => 'form');
                    echo form_open('editUserAdditional', $attributes);
                    ?>
                    <input type="hidden" name="userID" value="<?php echo $user->userID ?>">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Emergency Contact</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="ecname" name="ecname" value="<?php echo $user->ecName ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Relationship:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="ecrelation" name="ecrelation" value="<?php echo $user->ecRelationship ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Mobile:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="ecmobile" name="ecmobile" value="<?php echo $user->ecMobileNo ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Phone:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="ecPhone" name="ecphone" value="<?php echo $user->ecPhoneNo ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Medical Details</h3>
                        </div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                <label class="checkbox-inline" style="margin-left: 20px">
                                    <?php if($user->medicalConditions === "1") { ?>
                                    <input type="checkbox" name="medCond" value="1" checked>
                                    <?php } else { ?>
                                    <input type="checkbox" name="medCond" value="1">
                                    <?php } ?>
                                    Any medical conditions?
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Details:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" name="medDetails" ><?php echo $user->medicalDetails ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editAdditionalSubmit">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</div>
<?php if (isset($errorMessage)) { ?>
    <script>
        $errorMessage = "<?php echo $errorMessage ?>";
        alert($errorMessage);
    </script>
<?php } ?>

