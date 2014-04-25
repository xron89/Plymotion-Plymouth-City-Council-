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
        $.get("/plymotion/index.php/admin/venueLocations/" + venueID, function(data) {
            // update the textarea with the time
            $("#venuelocation").html(data);
        });
    });

    $('#editDetailsSubmit').click(function() {
        $('#editDetailsForm').submit();
    });

    $('#editAdditionalSubmit').click(function() {
        $('#editAdditionalForm').submit();
    });

    $('#clientSearchSubmit').click(function() {
        var name = $('#clientSearch').val();
        $.get("/plymotion/index.php/admin/clientSearch/" + name, function(data) {
            // update the textarea with the time
            $("#clients").html(data);
        });
    });

    $('#addClientBookingSubmit').click(function() {
        $('#addClientBookingForm').submit();
    });

    $('#deleteClientBookingSubmit').click(function() {
        $('#editBookingsForm').submit();
    });

    $('#editSessionSubmit').click(function() {
        $('#editSessionForm').submit();
    });

    $('#addNewsSubmit').click(function() {
        $('#addNewsForm').submit();
    });

    $('#sessionSearchSubmit').click(function() {
        var startdate = $('#firstdate').val();
        var enddate = $('#seconddate').val();
        $.get("/plymotion/index.php/admin/sessionSearch/" + startdate + "/" + enddate, function(data) {
            // update the textarea with the time
            $("#sessions").html(data);
        });
    });

    $('#addBookingSubmit').click(function() {
        $('#addBookingForm').submit();
    });

    $('#createSession').click(function() {
        $('#addBookingModal').modal('hide');
        $('#addBookingModal').on('hidden.bs.modal', function(e) {
            $('#newSessionModal').modal('show');
        })
    });
    
    $('#editClient').click(function() {
        $('#clientsForm').submit();
    });
});


