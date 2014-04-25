<?php if ($this->session->userdata('auth') === "user") { ?>
    <div id="content" class="container">
        <div class="row">
        <?php } ?>
        <div class="col-md-9">
            <div class="header">
                <?php if ($this->session->userdata('auth') === "user") { ?>
                    <h2>Your Profile</h2>
                <?php } else { ?>
                    <h2><?php echo $user->firstName . " " . $user->lastName . "'s Profile" ?></h2>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-7">
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
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-7">
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
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Booked Sessions</h3>
                            </div>
                            <div class="panel-body">
                                <?php if ($bookings != null) { ?>
                                    <table class="table">
                                        <tr>
                                            <th>Session No.</th>
                                            <th>Location</th>
                                            <th>Date</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                        </tr>
                                        <?php
                                        foreach ($bookings as $booking) {
                                            $date = strtotime($booking['date']);
                                            $date = date("d-m-Y", $date);
                                            ?>
                                            <tr>
                                                <td><?php echo $booking['sessionID'] ?></td>
                                                <?php
                                                foreach ($locations as $location) {
                                                    if ($location['locationID'] === $booking['locationID']) {
                                                        ?>
                                                        <td><?php echo $location['name'] ?></td>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <td><?php echo $date ?></td>
                                                <td><?php echo $booking['startTime'] ?></td>
                                                <td><?php echo $booking['endTime'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                <?php } else { ?>
                                    No bookings for this client
                                <?php } ?>
                                <button class="btn btn-primary" id="addBooking" data-toggle="modal" data-target="#addBookingModal">Add Booking</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if ($this->session->userdata('auth') === "user") { ?>
            <div class="col-md-3">
                <h2>Your Control Panel</h2>
                <h4>Hello <?php echo $this->session->userdata('name'); ?></h4>
                <a class="btn btn-default" href="<?php echo site_url('myBookings') ?>">View Bookings</a><br/><br/>
                <a class="btn btn-default" href="<?php echo site_url('myProfile/' . $this->session->userdata('userID')) ?>">Manage Profile</a><br/><br/>
                <a class="btn btn-default" href="<?php echo site_url('logout') ?>">Logout</a>
            </div>
        <?php } ?>
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
                                            <?php if ($user->medicalConditions === "1") { ?>
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

        <div class="modal fade" id="addBookingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add A Booking</h4>
                    </div>
                    <div class="modal-body">
                        <div id="form">
                            <div class="form-group">
                                <label for="venue">Enter dates to search between</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="firstdate" id="firstdate" placeholder="19-11-2012">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="seconddate" id="seconddate" placeholder="19-11-2014">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-primary" id="sessionSearchSubmit">Search</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $attributes = array('id' => 'addBookingForm', 'class' => 'form-horizontal', 'role' => 'form');
                            echo form_open('admin/addBooking', $attributes);
                            ?>
                            <div class="form-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Sessions</h3>
                                    </div>
                                    <div class="panel-body" id="sessions">
                                        Use search box above to find sessions.
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="userID" value="<?php echo $user->userID ?>">
                            <input type="hidden" name="action" value="add">
                            </form>
                            <button class="btn btn-primary" id="createSession">Create a Session</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="addBookingSubmit">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="newSessionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">New Session</h4>
                    </div>
                    <div class="modal-body">
                        <div id="form">
                            <div class="message"></div>
                            <?php
                            $attributes = array('id' => 'newSessionForm', 'class' => 'form-horizontal', 'role' => 'form');
                            echo form_open('admin/newSessionBooking', $attributes);
                            ?>
                            <input type="hidden" name="userID" value="<?php echo $user->userID ?>">
                            <div class="form-group">
                                <label for="venue" class="col-sm-2 control-label">Venue:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="venue" id="venue">
                                        <option selected>Select Venue</option>
                                        <?php foreach ($venues as $venue): ?>
                                            <option value="<?php echo $venue['venueID'] ?>"><?php echo $venue['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="venuelocation" class="col-sm-2 control-label">Venue Location:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="venuelocation" id="venuelocation">
                                        <option>Select Venue First</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="level" class="col-sm-2 control-label">Level:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="level" id="level">
                                        <option selected>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-2 control-label">Date:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="date" name="date" placeholder="19-11-2014">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="start" class="col-sm-2 control-label">Start Time:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="start" name="start" placeholder="13:12:00">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end" class="col-sm-2 control-label">End Time:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="end" name="end" placeholder="14:25:00">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="instructor" class="col-sm-2 control-label">Instructor:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="instructor" id="instructor">
                                        <option value="0">Select Instructor</option>
                                        <?php foreach ($instructors as $instructor): ?>
                                            <option value="<?php echo $instructor['instructorID'] ?>"><?php echo $instructor['name'] ?></option>
                                        <?php endforeach ?>
                                        <option value="0">TBD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="assistant" class="col-sm-2 control-label">Assistant:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="assistant" id="assistant">
                                        <option value="0">Select Assistant</option>
                                        <?php foreach ($instructors as $instructor): ?>
                                            <option value="<?php echo $instructor['instructorID'] ?>"><?php echo $instructor['name'] ?></option>
                                        <?php endforeach ?>
                                        <option value="0">None</option>
                                    </select>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="newSessionSubmit">Submit</button>
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

