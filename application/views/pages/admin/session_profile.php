<div class="col-md-10">
    <div class="headerText">
        <h2><?php echo "Session No. " . $session->sessionID; ?></h2>
    </div>
</div>
</div>
</div>
<?php if(isset($errorMessage)) { ?>
<script>
    $errorMessage = "<?php echo $errorMessage ?>";
    alert($errorMessage);
</script>
<?php } ?>

