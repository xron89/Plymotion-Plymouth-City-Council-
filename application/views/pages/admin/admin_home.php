<div class="col-md-8">
    <div class"row stats">
         <div class="col-md-4">
            <div class="panel panel-sucess">
                <i class="fa fa-pencil fa-3x"></i>
                <small>News Posts</small>
                <h2>36,288</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-alert">
                <i class="fa fa-pencil fa-3x"></i>
                <small>News Posts</small>
                <h2>36,288</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <i class="fa fa-pencil fa-3x"></i>
                <small>News Posts</small>
                <h2>36,288</h2>
            </div>
        </div>
    </div>

    <div class"row stats">
         <div class="col-md-10 col-md-offset-1">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at dolor mollis, sollicitudin metus ut, sodales elit. Nunc quis congue urna, non imperdiet leo. Sed porta lectus ac enim iaculis interdum. Ut cursus, erat eu feugiat ornare, nisl augue dignissim erat, et aliquet felis nulla tristique est. Mauris sit amet.</p>
        </div>
    </div>
</div>

<div class="col-md-2 tableContent" id="locationTable">
    <div class="header">
        <h4>New Contacts</h4>
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
            <td>No new contacts</td>
        <?php } ?>
    </table>
</div>

</div>
</div>

