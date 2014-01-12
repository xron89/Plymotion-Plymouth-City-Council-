<div class="content">
    <div class="row">
        <div class="col-md-4">
            <h2>Register</h2>
        </div>
    </div>
    <div class="row">
        <div id="form">
            <div class="message">
                <?php echo validation_errors(); ?>
            </div>
            <?php echo form_open('register') ?>
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
                <input type="submit" value="submit" name="submit">
            </form>
        </div>
    </div>
</div>