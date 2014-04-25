<?php
$date = strtotime($session->date);
$start = strtotime($session->startTime);
$end = strtotime($session->endTime);
$date = date("d-m-Y", $date);
$start = date("H:i:s", $start);
$end = date("H:i:s", $end);
?>

<div class="col-md-10">
    <div class="header">
        <h2><?php echo "Session No. " . $session->sessionID; ?></h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="panel-title">Session Information</h3>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" name="editSessionSubmit" data-toggle="modal" data-target="#editSessionModal">Edit Session</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>Location</td>
                            <td><?php echo $session->name ?></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td><?php echo $session->level ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>

                            <td><?php echo $date ?></td>
                        </tr>
                        <tr>
                            <td>Start Time</td>
                            <td><?php echo $start ?></td>
                        </tr>
                        <tr>
                            <td>End Time</td>
                            <td><?php echo $end ?></td>
                        </tr>
                        <tr>
                            <td>Instructor</td>
                            <td>
                                <?php
                                if (isset($instructor)) {
                                    echo $instructor->name;
                                } else {
                                    echo "TBD";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Assistant</td>
                            <td>
                                <?php
                                if (isset($assistant)) {
                                    echo $assistant->name;
                                } else {
                                    echo "None";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Booked Clients</h3>
                </div>
                <div class="panel-body">
                    <?php if (sizeof($bookings) > 0) { ?>
                        <div class="row">
                            <div class="col-md-10">
                                <table class="table">
                                    <tr>
                                        <td></td>
                                        <th>Name</th>
                                    </tr>
                                    <?php
                                    $attributes = array('id' => 'editBookingsForm', 'class' => 'form-horizontal', 'role' => 'form');
                                    echo form_open('admin/editBooking', $attributes);
                                    foreach ($bookings as $booking) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="selected[]" value="<?php echo $booking['userID'] ?>" /></td>
                                            <td><a href="<?php echo site_url('myProfile/' . $booking['userID']) ?>"><?php echo $booking['firstName'] . " " . $booking['lastName'] ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    <input type="hidden" name="sessionID" value="<?php echo $session->sessionID; ?>">
                                    </form>
                                </table>
                            </div>
                            <div class="col-md-1">
                                <div>
                                    <button type="button" class="glyphicon glyphicon-plus" id="addClientBooking" data-toggle="modal" data-target="#addClientBookingModal" title="Add Client"></button>
                                </div>
                                <div>
                                    <button type="button" class="glyphicon glyphicon-minus" id="deleteClientBooking" title="Delete Client"></button>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>
                        No bookings for this session
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSessionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Session</h4>
            </div>
            <div class="modal-body">
                <div id="form">
                    <?php
                    $attributes = array('id' => 'editSessionForm', 'class' => 'form-horizontal', 'role' => 'form');
                    echo form_open('admin/editSession', $attributes);
                    ?>
                    <div class="form-group">
                            <label for="venue" class="col-sm-2 control-label">Venue:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="venue" id="venue">
                                    <option selected>Select Venue</option>
                                    <?php foreach ($venues as $venue_item): ?>
                                    <option value="<?php echo $venue_item['venueID'] ?>"><?php echo $venue_item['name'] ?></option>
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
                    <input type="hidden" name="venueID" value="<?php echo $session->sessionID; ?>">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addLocationSubmit">Submit</button>
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

