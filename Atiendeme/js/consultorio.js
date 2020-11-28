$(document).ready(function() {


    $('#addConsultorioModal').on('shown.bs.modal', function(e) {
        $('#doctores-modal-select').select2();

        $('#especialidades-modal-select').select2();
    })


});

