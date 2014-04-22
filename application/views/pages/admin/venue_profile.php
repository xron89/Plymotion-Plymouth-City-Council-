<div class="col-md-10">
    <div class="headerText">
        <h2><?php echo $venue->name . " Venue"; ?></h2>
    </div>
    <div id="form">
        <div class="message"></div>
        <?php
        $attributes = array('id' => 'editVenueForm', 'class' => 'form-horizontal', 'role' => 'form');
        echo form_open('admin/editVenue', $attributes);
        ?>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $venue->name; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="opening" class="col-sm-2 control-label">Opening:</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" id="opening" name="opening" value="<?php echo $venue->opening; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address:</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" id="address" name="address" value="<?php echo $venue->address; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone:</label>
            <div class="col-sm-5">
                <input class="form-control" type="tel" id="phone" name="phone" value="<?php echo $venue->phone; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-5">
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $venue->email; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="website" class="col-sm-2 control-label">Website:</label>
            <div class="col-sm-5">
                <input class="form-control" type="url" id="website" name="website" value="<?php echo $venue->website; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="mapLink" class="col-sm-2 control-label">Map Link:</label>
            <div class="col-sm-5">
                <input class="form-control" type="url" id="mapLink" name="mapLink" value="<?php echo $venue->mapLink; ?>">
            </div>
        </div>
        <div class="formCheckBoxes">
            <div class="form-group">
                <div class="checkbox-inline">
                    <label>
                        <input type="checkbox" name="toilets" value="1" <?php if($venue->toilets == 1) { ?>checked<?php } ?>>
                        Toilets
                    </label>
                </div>
                <div class="checkbox-inline">
                    <label>
                        <input type="checkbox" name="bikePark" value="1" <?php if($venue->bikePark == 1) { ?>checked<?php } ?>>
                        Bike Park
                    </label>
                </div>
                <div class="checkbox-inline">
                    <label>
                        <input type="checkbox" name="changing" value="1" <?php if($venue->changing == 1) { ?>checked<?php } ?>>
                        Changing
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox-inline">
                    <label>
                        <input type="checkbox" name="lockers" value="1" <?php if($venue->lockers == 1) { ?>checked<?php } ?>>
                        Lockers
                    </label>
                </div>
                <div class="checkbox-inline">
                    <label>
                        <input type="checkbox" name="carPark" value="1" <?php if($venue->carPark == 1) { ?>checked<?php } ?>>
                        Car Park
                    </label>
                </div>
                <div class="checkbox-inline">
                    <label>
                        <input type="checkbox" name="refreshments" value="1" <?php if($venue->refreshments == 1) { ?>checked<?php } ?>>
                        Refreshments
                    </label>
                </div>
                <input type="hidden" name="venueID" value="<?php echo $venue->venueID; ?>">
            </div>
        </div>
        </form>
    </div>
    
    <div class="row venueLocations">
        <div class="header">
            <h4>Locations</h4>
        </div>
        <div class="col-md-5 tableContent" id="locationTable">           
            <table class="table" style="width: 400px;">
                <tr>
                    <th><input id="checkAll" type="checkbox" /></th>
                    <th>Location</th>
                </tr>
                <?php if ($venueLocations != null) {
                      $attributes = array('id' => 'deleteLocationForm', 'class' => 'form-horizontal', 'role' => 'form');
                      echo form_open('admin/deleteLocation', $attributes);
                      foreach ($venueLocations as $venue_location):?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?php echo $venue_location['locationID'] ?>" /></td>
                        <td><?php echo $venue_location['name'] ?> </td>
                    </tr>
                <?php endforeach; ?>
                    <input type="hidden" name="venueID" value="<?php echo $venue->venueID; ?>">
                    </form>
                <?php } else { ?>
                    <td></td>
                    <td>No Locations Stored for this Venue</td>
                <?php } ?>
            </table>
        </div>
        <div class="col-md-1 locationButtons">
            <div>
                <button type="button" class="glyphicon glyphicon-plus" id="addVenueLocation" data-toggle="modal" data-target="#addLocationModal" title="Add Location"></button>
            </div>
            <div>
                <button type="button" class="glyphicon glyphicon-minus" id="deleteVenueLocation" title="Delete Location"></button>
            </div>
        </div>
    </div>
    
    <div class="formButtons">
        <button type="button" class="btn btn-primary" id="editVenueSubmit">Submit</button>
        <a href="<?php echo site_url('admin/venueManagment') ?>">
            <button type="button" class="btn btn-default" id="cancelVenueEdit">Back</button>
        </a>
    </div>
    
    <div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">New Location</h4>
                </div>
                <div class="modal-body">
                    <div id="form">
                        <div class="message"></div>
                        <?php
                        $attributes = array('id' => 'addLocationForm', 'class' => 'form-horizontal', 'role' => 'form');
                        echo form_open('admin/addLocation', $attributes);
                        ?>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="name" name="name" placeholder="South Side">
                            </div>
                        </div>
                        <input type="hidden" name="venueID" value="<?php echo $venue->venueID; ?>">
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
</div>
<?php if(isset($errorMessage)) { ?>
<script>
    $errorMessage = "<?php echo $errorMessage ?>";
    alert($errorMessage);
</script>
<?php } ?>

