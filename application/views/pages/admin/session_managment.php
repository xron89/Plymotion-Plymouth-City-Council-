<div class="col-md-10">
    <div class="header">
        <h2>Sessions</h2>
    </div>
    
    <div class="tableContainer">
        <?php
            $attributes = array('id' => 'sessionForm', 'role' => 'form');
            echo form_open('admin/manageSessions', $attributes);
        ?>
        <div class="tableOptions">
            <div class="bulkOptions">
                <div class="dropdown">
                    <button class="btn btn-primary" type="button" id="dropdownMenu1" data-toggle="dropdown">
                        Session Status
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('admin/sessionManagment/active') ?>">Active</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('admin/sessionManagment/finished') ?>">Finished</a></li>
                    </ul>
                </div>       
            </div>
        </div>

        <div class="tableContent">
            <table class="table">
                <tr>
                    <th><input id="checkAll" type="checkbox" /></th>
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
                        <td><input type="checkbox" name="selected[]" value="<?php echo $session_item['sessionID'] ?>" /></td>
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
        <input type="hidden" id="action" name="action" value="" />
        </form>
    </div>
    
    <button class="btn btn-default" name="newSessionSubmit" data-toggle="modal" data-target="#newSessionModal">New Session</button>
    <button class="btn btn-default" name="editSession" id="editSessionSubmit" >Edit Session</button>
    <button class="btn btn-default" name="deleteSession" id="deleteSessionSubmit" >Delete Session</button>

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
                        echo form_open('admin/newSession', $attributes);
                        ?>
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
</div>
<?php if(isset($errorMessage)) { ?>
<script>
    $errorMessage = "<?php echo $errorMessage ?>";
    alert($errorMessage);
</script>
<?php } ?>



