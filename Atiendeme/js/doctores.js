$(document).ready(function() {


    $('#addDoctorModal').on('shown.bs.modal', function(e) {
        $('#centros-modal-select').select2();

        $('#especialidades-modal-select').select2();
    })
    

    
    function isInRange(dayValue, startValue,endValue, startRange, endRange, dayRange) {
        var inRange =
        dayValue === dayRange &&
        ((startValue >= startRange && startValue <= endRange) ||
            (endValue >= startRange && endValue <= endRange));
        return inRange;

    }

    var arr = [];
    $("#btnAddScheduleToList").on("click", function(e){
        e.preventDefault();
        var startTimeInput = $("#startTime");
        var endTimeInput = $("#endTime");
        var daySelect = $("#days");

        if(startTimeInput.val() != "" && endTimeInput.val() != ""){

          if(startTimeInput.val() <= endTimeInput.val()){

            var timeIsAlredyAdded = false;
            arr.forEach(_arr => {
                if(!timeIsAlredyAdded){
                 timeIsAlredyAdded = isInRange(
                   _arr.day,
                   _arr.startTime,
                   _arr.endTime,
                   startTimeInput.val(),
                   endTimeInput.val(),
                   daySelect.val()
                 );
                }
            })


//Force
            if (!timeIsAlredyAdded) {
                $("#table-doctors-body").append(
                  `<tr>
                        <td>${daySelect.val()}</td>

                        <td>${startTimeInput.val()}</td>
                        <td>${endTimeInput.val()}</td>
                        <td>
                            <a href="#" class="delete d-block "  index="${arr.length}"   style="text-align: center" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    `
                );

                //Force with the length before push will give you the next position in the array
                arr.push({
                day: daySelect.val(),
                startTime: startTimeInput.val(),
                endTime: endTimeInput.val(),
                });

               
            } else {
                 toastr["error"]("Existe una hora para este rango.");   
            }
          }else{
            toastr["error"](
              "La hora de inicio debe de ser menor que la fecha de fin."
            );  

          }

        }else{
            toastr["error"]("Seleccione las horas."); 
        }
        
    })


    function recreateTable(){

        $("#table-modal-doctors tbody tr").remove();
        arr.forEach((x, index) => {
    
            $("#table-doctors-body").append(
              `<tr>
                    <td>${x.day}</td>

                    <td>${x.startTime}</td>
                    <td>${x.endTime}</td>
                    <td>
                        <a href="#" class="delete d-block" index="${index}" style="text-align: center" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>`
            );

        })
    }
 
    $("#table-modal-doctors").on("click", ".delete.d-block", function () {

       var arrayElementIndex = parseInt(this.attributes.index.value);
       //remove element fron the array
      arr.splice(arrayElementIndex, 1);

      $(this).closest("tr").remove();
      recreateTable();

    });
 
});