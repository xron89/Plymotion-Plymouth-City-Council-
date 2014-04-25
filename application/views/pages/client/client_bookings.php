<?php
$dateStart = strtotime($course->startDate);
$dateEnd = strtotime($course->endDate);

$dateStart = date("d-m-Y", $dateStart);
$dateEnd = date("d-m-Y", $dateEnd);
?>
<div id="content" class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="header">
                <h2>Your Bookings</h2>
            </div>
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Course Information</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table" style="width: 300px">
                            <tr>
                                <td>Venue:</td>
                                <td><?php if(isset($course)) { echo $course->name; } else { echo "TBD"; } ?></td>
                            </tr>
                            <tr>
                                <td>Alternative Venue:</td>
                                <td><?php if(isset($course)) { echo $altVenue->name; } else { echo "TBD"; } ?></td>
                            </tr>
                            <tr>
                                <td>Start Date:</td>
                                <td><?php if(isset($course)) { echo $dateStart; } else { echo "TBD"; } ?></td>
                            </tr>
                            <tr>
                                <td>End Date:</td>
                                <td><?php if(isset($course)) { echo $dateEnd; } else { echo "TBD"; } ?></td>
                            </tr>
                        </table>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Session Information</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <th>Session No.</th>
                                        <th>Location</th>
                                        <th>Level</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                    </tr>

                                    <?php foreach ($sessions as $session_item): ?>
                                        <?php
                                        $date = strtotime($session_item['date']);
                                        $date = date("d-m-Y", $date);
                                        ?>
                                        <tr>
                                            <td><?php echo $session_item['sessionID'] ?></td>
                                            <td><?php echo $session_item['name'] ?></td>
                                            <td><?php echo $session_item['level'] ?></td>
                                            <td><?php echo $date ?></td>
                                            <td><?php echo $session_item['startTime'] ?></td>
                                            <td><?php echo $session_item['endTime'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h2>Your Control Panel</h2>
            <h4>Hello <?php echo $this->session->userdata('name'); ?></h4>
            <a class="btn btn-default" href="<?php echo site_url('myBookings')?>">View Bookings</a><br/><br/>
            <a class="btn btn-default" href="<?php echo site_url('myProfile/' . $this->session->userdata('userID')) ?>">Manage Profile</a><br/><br/>
            <a class="btn btn-default" href="<?php echo site_url('logout') ?>">Logout</a>
        </div>
    </div>
</div>
