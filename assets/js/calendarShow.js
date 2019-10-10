var idPlanning = $('#idPlanningJs').val();

$('.navCalendar').click(function() {
  let url = HOST+'navCalendar/';
  let targetDate = $(this).attr('id').split('.')[1];
  url = url+idPlanning+'/'+targetDate+'/Show';
  $('#calendarTimeSlot').load(url);
})

$('.selected').click(function() {

  if( $(this).hasClass('booked') )
  {
      return false;
  }
  let id = $(this).attr('id');
  let element = id+'.timeSlotId';
  let target = document.getElementById(element);

  let timeSlotId = target.value;
  let dateAvailable = target.dataset.dateavailable;
  let timeStart = target.dataset.timestart;
  let timeEnd = target.dataset.timeend;

  $('#bookingTimeSlot').val(timeSlotId);

  $('#modal2-informations').text(dateAvailable+' - '+timeStart+' à '+timeEnd);
  $('#modal2').show();
})

$('.closeModalButton2').click(function() {
  $('#modal2').hide();
})


$('#submitBooking').click(function() {

  let urlBook = HOST+'bookTimeSlot';
  console.log(urlBook);

  let idTimeSlot  = $('#bookingTimeSlot').val();
  let bookingFirstname = $("#bookingFirstname").val();
  let bookingEmail = $("#bookingEmail").val();
  let bookingLastname = $("#bookingLastname").val();


  $.ajax({
      url : urlBook,
      type : 'POST',
      data : 'idTimeSlot=' + idTimeSlot + '&bookingFirstname=' + bookingFirstname + '&bookingEmail=' + bookingEmail + '&bookingLastname=' + bookingLastname,
      dataType : 'json',
      success : function(result, statut){

        console.log(result);

        let target = result.id;
        console.log(target);
        let myDiv = document.getElementById(target);
        myDiv.classList.add("booked");
        myDiv.classList.remove("selected");


     }
  });
})
