<div class="col-md-10">
    <div class="header">
        <h2>Users</h2>
    </div>

    <div class="tableContainer">
        <?php
        $attributes = array('id' => 'clientsForm', 'role' => 'form');
        echo form_open('admin/manageClients', $attributes);
        ?>

        <div class="tableContent">
            <table class="table">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Mobile Number</th>
                    <th>Email Number</th>
                </tr>

                <?php
                foreach ($clients as $item):?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?php echo $item['userID'] ?>" /></td>
                        <td><?php echo $item['firstName'] . " " . $item['lastName'] ?></td>
                        <td><?php echo $item['phoneNumber'] ?></td>
                        <td><?php echo $item['mobileNumber'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <input type="hidden" id="action" name="action" value="" />
        </form>
    </div>

    <button class="btn btn-default" name="newVenueSubmit" data-toggle="modal" data-target="#newVenueModal">New Client</button>
    <button class="btn btn-default" name="editClient" id="editClient" >Edit Client</button>
    <button class="btn btn-default" name="deleteVenue" id="deleteVenueSubmit" >Delete Client</button>

</div>
</div>
</div>
<?php if (isset($errorMessage)) { ?>
    <script>
        $errorMessage = "<?php echo $errorMessage ?>";
        alert($errorMessage);
    </script>
<?php } ?>

