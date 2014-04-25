<div class="col-md-10">
    <div class="row stats">
        <div class="col-md-8">
            <div class="row stats">
                <div class="col-md-4">
                    <div class="panel panel-sucess">
                        <i class="fa fa-pencil fa-3x"></i>
                        <small>News Posts</small>
                        <h2><?php echo $postCount ?></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-alert">
                        <i class="fa fa-users fa-3x"></i>
                        <small>Total Clients</small>
                        <h2><?php echo $clientCount ?></h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <i class="fa fa-building-o fa-3x"></i>
                        <small>Cycle Venues</small>
                        <h2><?php echo $venueCount ?></h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 tableContent" id="locationTable">
                    <div class="header">
                        <h4>Upcoming Courses</h4>
                        <hr>
                    </div>
                    <table id="processQue" class="table">
                        <tr>
                            <th>#</th>
                            <th>Venue</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                        </tr>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td><?php echo $course['courseID'] ?></td>
                                <td><?php echo $course['name'] ?></td>
                                <td><?php echo $course['startDate'] ?></td>
                                <td><?php echo $course['endDate'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
                <div class="col-md-3 tableContent" id="locationTable">
                    <div class="header">
                        <h4>New Clients</h4>
                        <hr>
                    </div>
                    <table class="table" style="width: 200px;">
                        <tr>
                            <th>Name</th>
                        </tr>
                        <?php
                        if ($contacts != null) {
                            $attributes = array('id' => 'contactForm', 'class' => 'form-horizontal', 'role' => 'form');
                            echo form_open('admin/viewContact', $attributes);
                            foreach ($contacts as $contact):
                                ?>
                                <tr>
                                    <td><a href="<?php echo site_url('admin/userProfile/' . $contact['userID']) ?>"><?php echo $contact['firstName'] . " " . $contact['lastName'] ?></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </form>
                        <?php } else { ?>
                            <td>No new clients</td>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
