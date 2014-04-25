<div class="col-md-10">
    <div class="header">
        <h2>Instructors</h2>
    </div>

    <div class="tableContainer">
        <?php
        $attributes = array('id' => 'newsForm', 'role' => 'form');
        echo form_open('admin/manageNews', $attributes);
        ?>

        <div class="tableContent">
            <table class="table">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                </tr>

                <?php
                foreach ($instructors as $item): ?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?php echo $item['instructorID'] ?>" /></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php if($item['phoneNo'] === null) { echo "N/A"; } else { echo $item['phoneNo']; } ?></td>
                        <td><?php if($item['mobileNo'] === null) { echo "N/A"; } else { echo $item['mobileNo']; } ?></td>
                        <td><?php if($item['email'] === null) { echo "N/A"; } else { echo $item['email']; } ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <input type="hidden" id="action" name="action" value="" />
        </form>
    </div>

    <button class="btn btn-default" name="newVenueSubmit" data-toggle="modal" data-target="#newVenueModal">New Instructor</button>
    <button class="btn btn-default" name="editVenue" id="editVenueSubmit" >Edit Instructor</button>
    <button class="btn btn-default" name="deleteVenue" id="deleteVenueSubmit" >Delete Instructor</button>

</div>
</div>
</div>
<?php if (isset($errorMessage)) { ?>
    <script>
        $errorMessage = "<?php echo $errorMessage ?>";
        alert($errorMessage);
    </script>
<?php } ?>

