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
                                    echo form_open('admin/manageBookings', $attributes);
                                    foreach ($bookings as $booking) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" name="selected[]" value="<?php echo $booking['userID'] ?>" /></td>
                                            <td><a href="<?php echo site_url('myProfile/' . $booking['userID']) ?>"><?php echo $booking['firstName'] . " " . $booking['lastName'] ?></a></td>
                                        </tr>
                                    <?php } ?>
                                    <input type="hidden" name="sessionID" value="<?php echo $session->sessionID; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    </form>
                                </table>
                            </div>
                            <div class="col-md-1">
                                <div>
                                    <button type="button" class="glyphicon glyphicon-plus" id="addClientBooking" data-toggle="modal" data-target="#addClientBookingModal" title="Add Client"></button>
                                </div>
                                <div>
                                    <button type="button" class="glyphicon glyphicon-minus" id="deleteClientBookingSubmit" title="Delete Client"></button>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="row">
                            <div class="col-md-10">
                                No bookings for this session
                            </div>
                            <div class="col-md-1">
                                <div>
                                    <button type="button" class="glyphicon glyphicon-plus" id="addClientBooking" data-toggle="modal" data-target="#addClientBookingModal" title="Add Client"></button>
                                </div>
                            </div>
                        </div>
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
                                <?php
                                foreach ($venues as $venue_item) {
                                    if ($venue_item['venueID'] === $venue->venueID) {
                                        ?>
                                <option value="<?php echo $venue_item['venueID'] ?>" selected><?php echo $venue_item['name'] ?></option>
                                <?php } else { ?>
                                       <option value="<?php echo $venue_item['venueID'] ?>"><?php echo $venue_item['name'] ?></option> 
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="venuelocation" class="col-sm-2 control-label">Venue Location:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="venuelocation" id="venuelocation">
                                <?php
                                    foreach ($venuelocations as $location) {
                                        if($location['locationID'] === $session->locationID) {
                                ?>
                                <option value="<?php echo $location['locationID'] ?>" selected><?php echo $location['name'] ?></option>
                                <?php } elseif ($location['venueID'] === $venue->venueID) { ?>
                                <option value="<?php echo $location['locationID'] ?>"><?php echo $location['name'] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="level" class="col-sm-2 control-label">Level:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="level" id="level">
                                <?php
                                    for($x = 1; $x < 4; $x++) {
                                        if ($x == intval($session->level)) {
                                ?>
                                    <option selected><?php echo $x ?></option>
                                <?php } else { ?>
                                    <option><?php echo $x ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-2 control-label">Date:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="date" name="date" value="<?php echo $date ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="start" class="col-sm-2 control-label">Start Time:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="start" name="start" value="<?php echo $start ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end" class="col-sm-2 control-label">End Time:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="end" name="end" value="<?php echo $end ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instructor" class="col-sm-2 control-label">Instructor:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="instructor" id="instructor">
                                <?php foreach ($instructors as $instructor): 
                                    if($instructor['instructorID'] === $session->instructorID) {
                                    ?>
                                    <option value="<?php echo $instructor['instructorID'] ?>" selected><?php echo $instructor['name'] ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $instructor['instructorID'] ?>"><?php echo $instructor['name'] ?></option>
                                    <?php } endforeach  ?>
                                    <?php if ($session->instructorID === "0") { ?>
                                    <option value="0" selected>TBD</option>
                                    <?php } else { ?>
                                    <option value="0">TBD</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="assistant" class="col-sm-2 control-label">Assistant:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="assistant" id="assistant">
                                <?php foreach ($instructors as $instructor): 
                                    if($instructor['instructorID'] === $session->assistantID) {
                                    ?>
                                    <option value="<?php echo $instructor['instructorID'] ?>" selected><?php echo $instructor['name'] ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $instructor['instructorID'] ?>"><?php echo $instructor['name'] ?></option>
                                    <?php } endforeach  ?>
                                    <?php if ($session->assistantID === "0") { ?>
                                    <option value="0" selected>None</option>
                                    <?php } else { ?>
                                    <option value="0">None</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="sessionID" value="<?php echo $session->sessionID; ?>">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="editSessionSubmit">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addClientBookingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Booking</h4>
            </div>
            <div class="modal-body">
                <div id="form">
                    <div class="form-group">
                        <label for="venue">Enter Client Last Name</label>
                        <div class="row">
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="clientSearch" id="clientSearch">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" id="clientSearchSubmit">Search</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    $attributes = array('id' => 'addClientBookingForm', 'role' => 'form');
                    echo form_open('admin/manageBookings', $attributes);
                    ?>
                    <div class="form-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Clients</h3>
                            </div>
                            <div class="panel-body" id="clients">
                                Use search box above to find clients.
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="sessionID" value="<?php echo $session->sessionID; ?>">
                    <input type="hidden" name="action" value="add">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addClientBookingSubmit">Submit</button>
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

