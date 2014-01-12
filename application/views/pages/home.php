<div id="content" class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <h2>Plymotion</h2>
            <p>Plymotion is a scheme that aims to make it easier for you to get around Plymouth by bus, by bike and on foot.</p>
            <p>We are now a third of the way through the three year scheme which was launched in 2012 to introduce new walking and cycling links connecting the east and west of the city, including the restoration of the former Laira Railway Bridge.</p>

            <p>We are also offering various incentives to encourage you to try greener, cheaper and healthier ways of getting from A to B, as well as providing a third of Plymouth’s households with their very own personal travel advisor.</p>

            <p>In our first year we have completed the Finnigan Road junction upgrade works, delivered the first phase of our personalised travel planning programme for residents and employees in the East End, Mount Gould and St Judes areas, and launched Sky Ride Local rides in Plymouth as well as hosting a Sky Ride City event.</p>
            </p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php if (isset($login) && $login) { ?>
                Hello User
            <?php } else { ?>
                <h2>Login</h2>
                <div class="message">
                    <?php
                    if (isset($register)) {
                        echo $register;
                    }
                    ?>
                </div>
                <?php
                $attributes = array('id' => 'loginForm');
                echo form_open('login', $attributes);
                ?>
                <div>
                    <label id="refNumberLbl">Reference Number:</label>
                    <input id="refNumber" type="text" placeholder="10082643484" name="ref">	
                </div>
                <div>
                    <label id="dobLbl">Date Of Birth:</label>
                    <input id="dob" type="text" placeholder="220587" name="dob">
                </div>
                <div>
                    <input id="bookingCheck" type="submit" class="defult-btn" name="submit" value="Login">
                </div>
                </form>
                <div>
                    <button id="register" class="defult-btn" name="register" data-toggle="modal" data-target="#myModal">Register</button>
                </div>
            <?php } ?>
            <p>Resent activation email?</p>
        </div>
    </div>
    <div id="splitter" class="row">
        <div class="col-md-12">
            <h2>Associated With</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <img src="/plymotion/assets/img/DFT.png">
        </div>
        <div class="col-md-3">
            <img src="/plymotion/assets/img/FGW.png">
        </div>
        <div class="col-md-3">
            <img src="/plymotion/assets/img/COP.png">
        </div>
        <div class="col-md-3">
            <img src="/plymotion/assets/img/NHS.png">
        </div>
    </div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    $attributes = array('id' => 'registerForm');
                    echo form_open('register', $attributes);
                    ?>
                    <label class="bookingFormLbl">First name:</label>
                    <input class="bookingForm" type="text" id="fname" name="fname" placeholder="John">
                    <label class="bookingFormLbl">Last name:</label>
                    <input class="bookingForm" type="text" id="lname" name="lname" placeholder="Doe">
                    <label class="bookingFormLbl">Address:</label>
                    <input class="bookingForm" type="text" id="address" name="address" placeholder="22 Brambledown Road">
                    <label class="bookingFormLbl">Date Of Birth:</label>
                    <input class="bookingForm" type="text" id="dateofbirth" name="dateofbirth" placeholder="220594">
                    <label class="bookingFormLbl">Contact Number:</label>
                    <input class="bookingForm" type="text" id="phone" name="phone" placeholder="012345 67891">
                    <label class="bookingFormLbl">Email:</label>
                    <input class="bookingForm" type="text" id="email" name="email" placeholder="John.Doe@web.com">
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