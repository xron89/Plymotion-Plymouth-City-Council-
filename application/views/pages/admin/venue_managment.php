<div class="col-md-10">
    <div class="header">
        <h2>New Contacts</h2>
    </div>

    <div class="tableContent">
        <table>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Website</th>
            </tr>

            <?php foreach ($venues as $venue_item): ?>
                <tr>
                    <td><?php echo $venue_item['name'] ?></td>
                    <td><?php echo $venue_item['phone'] ?></td>
                    <td><?php echo $venue_item['website'] ?></td>
                    <td><button class="btn btn-default" id="venue<?php echo $venue_item['venueID'] ?>">Details</button></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    
    <button class="btn btn-default" name="newVenue" data-toggle="modal" data-target="#newVenueModal">New Venue</button>

    <div class="modal fade" id="newVenueModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New Venue</h4>
                </div>
                <div class="modal-body">
                    <div id="form">
                        <div class="message"></div>
                        <?php
                        $attributes = array('id' => 'newVenueForm', 'class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('admin/newVenue', $attributes);
                        ?>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name" placeholder="Hide Park">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="opening" class="col-sm-2 control-label">Opening:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="opening" name="opening" placeholder="South Side">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Address:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="address" name="address" placeholder="2 South Hay, Plymouth">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Phone:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" id="phone" name="phone" placeholder="01395 458965">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="email" name="email" placeholder="jack@hotmail.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website" class="col-sm-2 control-label">Website:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" id="website" name="website" placeholder="www.wedurl.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mapLink" class="col-sm-2 control-label">Map Link:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" id="mapLink" name="mapLink" placeholder="www.googlemap.com">
                            </div>
                        </div>
                        <div class="formCheckBoxes">
                            <div class="form-group">
                                <div class="checkbox-inline">
                                    <label>
                                        <input type="checkbox" name="toilets" value="1">
                                        Toilets
                                    </label>
                                </div>
                                <div class="checkbox-inline">
                                    <label>
                                        <input type="checkbox" name="bikePark" value="1">
                                        Bike Park
                                    </label>
                                </div>
                                <div class="checkbox-inline">
                                    <label>
                                        <input type="checkbox" name="changing" value="1">
                                        Changing
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-inline">
                                    <label>
                                        <input type="checkbox" name="lockers" value="1">
                                        Lockers
                                    </label>
                                </div>
                                <div class="checkbox-inline">
                                    <label>
                                        <input type="checkbox" name="carPark" value="1">
                                        Car Park
                                    </label>
                                </div>
                                <div class="checkbox-inline">
                                    <label>
                                        <input type="checkbox" name="refreshments" value="1">
                                        Refreshments
                                    </label>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="newVenueSubmit">Submit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</div>
</div>

