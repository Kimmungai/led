function submit_form(id) {
  event.preventDefault();
  $("#"+id).submit();
}
function calculator_calculate()
{
  event.preventDefault();
  $("#equalsButton").click();
}
