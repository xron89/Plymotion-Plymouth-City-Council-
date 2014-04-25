<<<<<<< HEAD
<div class="col-md-10">
    <div class="row stats">
=======
<div class="col-md-8">
    <div class"row stats">
>>>>>>> FETCH_HEAD
         <div class="col-md-4">
            <div class="panel panel-sucess">
                <i class="fa fa-pencil fa-3x"></i>
                <small>News Posts</small>
                <h2>36,288</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-alert">
<<<<<<< HEAD
                <i class="fa fa-users fa-3x"></i>
                <small>Total Clients</small>
                <h2>288</h2>
=======
                <i class="fa fa-pencil fa-3x"></i>
                <small>News Posts</small>
                <h2>36,288</h2>
>>>>>>> FETCH_HEAD
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
<<<<<<< HEAD
                <i class="fa fa-building-o fa-3x"></i>
                <small>Cycle Venues</small>
                <h2>7</h2>
=======
                <i class="fa fa-pencil fa-3x"></i>
                <small>News Posts</small>
                <h2>36,288</h2>
>>>>>>> FETCH_HEAD
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <div class="row">
        <div class="col-md-6 tableContent" id="locationTable">
            <div class="header">
                <h4>Process Que</h4>
                <hr>
            </div>
            <table id="processQue" class="table">
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Name</th>
                </tr>
                <?php
                if ($contacts != null) {
                    $attributes = array('id' => 'contactForm', 'class' => 'form-horizontal', 'role' => 'form');
                    echo form_open('admin/viewContact', $attributes);
                    foreach ($contacts as $contact):
                        ?>
                        <tr>
                            <td>1.</td>
                            <td><p class="tblPending">Pending</p></td>
                            <td><a href="<?php echo site_url('admin/userProfile/' . $contact['userID']) ?>"><?php echo $contact['firstName'] . " " . $contact['lastName'] ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </form>
                <?php } else { ?>
                    <td>No new contacts</td>
                <?php } ?>
            </table>
        </div>
        <div class="col-md-6 tableContent" id="locationTable">
            <div class="header">
                <h4>Upcoming Courses</h4>
                <hr>
            </div>
            <table id="processQue" class="table">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td><p>Devon Port</p></td>
                    <td>08/05/2014</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td><p>Plymouth Hoe</p></td>
                    <td>11/05/2014</td>
                </tr>
            </table>
        </div>
    </div>
=======
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
>>>>>>> FETCH_HEAD
</div>

</div>
</div>

