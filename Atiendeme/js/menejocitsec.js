$(document).ready(function() {


    $('#addDoctorModal').on('shown.bs.modal', function(e) {
        $('#centros-modal-select').select2();

        $('#especialidades-modal-select').select2();

        $("#doctores-modal-select").select2();
    })

});