<?php if(isset($register)) { ?>
<script>
    var register = "<?php echo $register ?>";
    var regMessage = "<?php echo $regMessage ?>";
    alert(regMessage);
</script>
<?php } elseif (isset($activate)) { ?>
<script>
    var activated = "<?php echo $activate ?>";
    var actMessage = "<?php echo $actMessage ?>";
    if (activated === 'true') {
        alert(actMessage);
    } else {
        alert(actMessage);
    }
</script>
<?php } elseif (isset($retrieveDetails)) { ?>
<script>
    var retrieveDetails = "<?php echo $retrieveDetails ?>";
    var retMessage = "<?php echo $retMessage ?>";
    if ($retrieveDetails === 'true') {
        alert(retMessage);
    } else {
        alert(retMessage);
    }
</script>
<?php } elseif (isset($resendEmail)) { ?>
<script>
    var resendEmail = "<?php echo $resendEmail ?>";
    var reMessage = "<?php echo $reMessage ?>";
    if (resendEmail === 'true') {
        alert(reMessage);
    } else {
        alert(reMessage);
    }
</script>
<?php } elseif (isset($authCheck)) { ?>
<script>
    var authCheck = "<?php echo $authCheck ?>";
    var authMessage = "<?php echo $authMessage ?>";
    if (authCheck === 'false') {
        alert(authMessage);
    }
</script>
<?php } ?>

<div id="content" class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Welcome to Plymotion</h2>
            <p>Plymotion is a scheme that aims to make it easier for you to get around Plymouth by bus, by bike and on foot.</p>
            <p>We are now a third of the way through the three year scheme which was launched in 2012 to introduce new walking and cycling links connecting the east and west of the city, including the restoration of the former Laira Railway Bridge.</p>

            <p>We are also offering various incentives to encourage you to try greener, cheaper and healthier ways of getting from A to B, as well as providing a third of Plymouth’s households with their very own personal travel advisor.</p>

            <p>In our first year we have completed the Finnigan Road junction upgrade works, delivered the first phase of our personalised travel planning programme for residents and employees in the East End, Mount Gould and St Judes areas, and launched Sky Ride Local rides in Plymouth as well as hosting a Sky Ride City event.</p>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php //echo $this->session->userdata('logged_in'); //echo $this->session->userdata('auth'); ?>
            <?php if ($this->session->userdata('logged_in') === TRUE && $this->session->userdata('auth') === "user") { ?>
            <h2>Your Control Panel</h2>
            <h4>Hello <?php echo $this->session->userdata('name'); ?></h4>
            <a class="btn btn-default" href="<?php echo site_url('myBookings')?>">View Bookings</a><br/><br/>
            <a class="btn btn-default" href="<?php echo site_url('myProfile/' . $this->session->userdata('userID')) ?>">Manage Profile</a><br/><br/>
            <a class="btn btn-default" href="logout">Logout</a>
            <?php } else { ?>
                <h2>Login</h2>
                <div class="message">
                    <?php
                    if (isset($login) && $login === false) {
                        echo $loginMessage;
                    } elseif (isset($login) && $login === true) { ?>
                    <script>
                        alert("<?php echo $loginMessage; ?>");
                    </script>
                    <?php } ?>
                </div>
                <?php
                $attributes = array('id' => 'loginForm', 'class' => 'form-horizontal', 'role' => 'form');
                echo form_open('clientLogin', $attributes);
                ?>
                <div class="form-group">
                    <label for="ref" class="col-sm-6 control-label">Reference Code:</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="ref" type="text" placeholder="Bob12345" name="ref">
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob" class="col-sm-6 control-label">Date Of Birth:</label>
                    <div class="col-sm-6">
                        <input class="form-control" id="dob" type="date" placeholder="dd-mm-yyyy" name="dob">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button id="bookingCheck" type="submit" class="btn btn-default" name="submit">Login</button>
                        <button id="register" class="btn btn-default" name="register" data-toggle="modal" data-target="#registerModal">Register</button>
                    </div>
                </div>
                </form>

                <p><a id="resendEmail" href="#" data-toggle="modal" data-target="#resendEmailModal">Resend activation email</a></p>
                <p><a id="retrieveDetails" href="#" data-toggle="modal" data-target="#retrieveDetailsModal">Forgotten your details?</a></p>
            <?php } ?>

        </div>
    </div>
    <div id="splitter" class="row">
        <div class="col-md-12">
            <h2>Associated With</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('/assets/img/DFT.png') ?>">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('/assets/img/FGW.png') ?>">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('/assets/img/COP.png') ?>">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('/assets/img/NHS.png') ?>">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('/assets/img/TT.png') ?>">
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <img src="<?php echo base_url('/assets/img/PCB.png') ?>">
        </div>
    </div>

</div>

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body">
                <div id="form">
                    <div class="message"></div>
                    <?php
                    $attributes = array('id' => 'registerForm', 'class' => 'form-horizontal', 'role' => 'form');
                    echo form_open('register', $attributes);
                    ?>
                    <div class="form-group">
                        <label for="fname" class="col-sm-4 control-label">First name:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="fname" name="fname" placeholder="John">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lname" class="col-sm-4 control-label">Last name:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="lname" name="lname" placeholder="Doe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-4 control-label">Address:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="address" name="address" placeholder="22 Brambledown Road">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dateofbirth" class="col-sm-4 control-label">Date Of Birth:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="date" id="dateofbirth" name="dateofbirth" placeholder="dd-mm-yyyy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-4 control-label">Phone Number:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" id="phone" name="phone" placeholder="012345 67891">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-4 control-label">Mobile Number:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="number" id="mobile" name="mobile" placeholder="012345 67891">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="email" id="email" name="email" placeholder="John.Doe@web.com">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="registerSubmit">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="retrieveDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Retrieve Your Login Details.</h4>
            </div>
            <div class="modal-body">
                <div id="form">
                    <div class="message"></div>
                    <?php
                    $attributes = array('id' => 'retrieveDetailsForm', 'class' => 'form-horizontal', 'role' => 'form');
                    echo form_open('retrieveDetails', $attributes);
                    ?>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="email" name="email" placeholder="Bob123">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="retrieveDetailsSubmit">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="resendEmailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Resend Activation Email.</h4>
            </div>
            <div class="modal-body">
                <div id="form">
                    <div class="message"></div>
                    <?php
                    $attributes = array('id' => 'resendEmailForm', 'class' => 'form-horizontal', 'role' => 'form');
                    echo form_open('resendEmail', $attributes);
                    ?>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email:</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="text" id="email" name="email" placeholder="Bob123">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="resendEmailSubmit">Submit</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->