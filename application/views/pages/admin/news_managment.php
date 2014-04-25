<div class="col-md-10">
    <div class="header">
        <h2>News</h2>
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
                    <th>Title</th>
                    <th>Date Created</th>
                    <th>Content</th>
                </tr>

                <?php
                foreach ($news as $item):
                    $date = strtotime($item['date']);
                    $date = date("d-m-Y", $date);
                    ?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?php echo $item['newsID'] ?>" /></td>
                        <td><?php echo $item['title'] ?></td>
                        <td><?php echo $date ?></td>
                        <td><?php echo $item['content'] ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <input type="hidden" id="action" name="action" value="" />
        </form>
    </div>

    <button class="btn btn-default" name="newVenueSubmit" data-toggle="modal" data-target="#newVenueModal">New Post</button>
    <button class="btn btn-default" name="editVenue" id="editVenueSubmit" >Edit Post</button>
    <button class="btn btn-default" name="deleteVenue" id="deleteVenueSubmit" >Delete Post</button>

</div>
</div>
</div>
<?php if (isset($errorMessage)) { ?>
    <script>
        $errorMessage = "<?php echo $errorMessage ?>";
        alert($errorMessage);
    </script>
<?php } ?>
