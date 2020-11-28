// ------------step-wizard-------------
$(document).ready(function () {
  $(".nav-tabs > li a[title]").tooltip();

  //Wizard
  $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
    var target = $(e.target);

    if (target.parent().hasClass("disabled")) {
      return false;
    }
  });

  $(".prev-step").click(function (e) {
    var active = $(".wizard .nav-tabs li.active");
    prevTab(active);
  });
});

 function validateForm() {
   // This function deals with validation of the form fields
   var x,
     y,
     i,
     valid = true;
   x = document.getElementsByClassName("tab-pane");
   y = x[currentTab].getElementsByTagName("input");
   // A loop that checks every input field in the current tab:
   for (i = 0; i < y.length; i++) {
     // If a field is empty...
     if (y[i].value == "") {
       // add an "invalid" class to the field:
       y[i].className += " is-invalid";
       // and set the current valid status to false
       valid = false;
     }
   }
   return valid; // return the valid status
 }

var currentTab = 0;
function nextTab(elem) {
    
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab-pane");
  // Exit the function if any field in the current tab is invalid:
  if (elem == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + elem;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    return false;
  }
  showTab(currentTab);
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i,
    x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab-pane");
  x[n].style.display = "block";
  fixStepIndicator(n);
}

function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}

$('#depentiente').on('change', function(){
    var val = $(this).val();
    if(val === "NO"){
        $("#dependienteDiv").hide();
    }else{
         $("#dependienteDiv").show();
         $("#dependienteNadaOption").prop("selected", false);
    }
})