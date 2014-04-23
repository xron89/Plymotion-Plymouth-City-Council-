$(window).resize(function() {
    divCenter();
});

function divCenter()
{
    $('.content').css({
        position: 'absolute',
        left: ($(window).width() - $('.content').outerWidth()) / 2
    });
}

$(document).ready(function() {

    $('.container_content').load(divCenter());
    $(window).resize();

    $('#registerSubmit').click(function() {
        $('#registerForm').submit();
    });

    $('#adminSubmit').click(function() {
        $('#adminForm').submit();
    });

    $('#newAdminSubmit').click(function() {
        $('#adminRegForm').submit();
    });

    $('#retrieveDetailsSubmit').click(function() {
        $('#retrieveDetailsForm').submit();
    });

    $('#resendEmailSubmit').click(function() {
        $('#resendEmailForm').submit();
    });

    $('#newVenueSubmit').click(function() {
        $('#newVenueForm').submit();
    });

    $('#editVenueSubmit').click(function() {
        $('#action').val("edit");
        $('#venueForm').submit();
    });

    $('#deleteVenueSubmit').click(function() {
        $('#action').val("delete");
        $('#venueForm').submit();
    });
    
    $('#editVenueSubmit').click(function() {
        $('#editVenueForm').submit();
    });
    
    $('#addLocationSubmit').click(function() {
        $('#addLocationForm').submit();
    });
    
    $('#editVenueSubmit').click(function() {
        $('#editVenueForm').submit();
    });
    
    $('#deleteVenueLocation').click(function() {
        $('#deleteLocationForm').submit();
    });
    
    $('#newSessionSubmit').click(function() {
        $('#newSessionForm').submit();
    });

    $('#editSessionSubmit').click(function() {
        $('#action').val("edit");
        $('#sessionForm').submit();
    });

    $('#deleteSessionSubmit').click(function() {
        $('#action').val("delete");
        $('#sessionForm').submit();
    });
    
    $('#venue').change(function() {
        var venueID = $('#venue').val();
        $.get("../venueLocations/" + venueID, function (data) {
          // update the textarea with the time
          $("#venuelocation").html(data);
        });
    });
});


