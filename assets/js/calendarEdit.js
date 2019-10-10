var idPlanning = $('#idPlanningJs').val();

$('.navCalendar').click(function() {
  let url = HOST+'navCalendar/';
  let targetDate = $(this).attr('id').split('.')[1];
  url = url+idPlanning+'/'+targetDate+'/Edit';
  console.log(url);
  $('#calendarTimeSlot').load(url);
})

$('.timeSlot').click(function() {

    if( $(this).hasClass('booked') )
    {
        return false;
    }
    let urlDel = HOST+'delTimeSlot';

    let data = $(this).attr('id');
    let date_available = data.split('.')[0];
    let time_start = data.split('.')[1];
    let duration = '45';
    let time_end = time_start.split(':')[0]+':'+duration;

    // delete timeSlot
    if($(this).hasClass('selected')) {
      $(this).removeClass('selected');
      let target = date_available+'.'+time_start+'.'+idPlanning+'.timeSlotId';
      let idTimeSlot = document.getElementById(target).value;
      $.ajax({
          url : urlDel,
          type : 'POST',
          data : 'idTimeSlot=' + idTimeSlot,
          dataType : 'html',
          success : function(result, statut){
              console.log(result);
         },
         error : function(resultat, statut, erreur){
            console.log(erreur);
         }
      });

    } else {
      // open modal
      $('#time_slot_time_start').val(time_start);
      $('#time_slot_time_end').val(time_end);
      $('#time_slot_date_available').val(date_available);
      $('#modal1').show();
    }
})

$('.closeModalButton').click(function() {
  $('#modal1').hide();
})

$('#submitTimeSlot').click(function() {

  let urlAdd = HOST+'addTimeSlot';

  let time_start = $('#time_slot_time_start').val();
  let time_end = $('#time_slot_time_end').val();
  let date_available = $('#time_slot_date_available').val();

  $.ajax({
      url : urlAdd,
      type : 'POST',
        data : 'date_available=' + date_available + '&time_start=' + time_start + '&time_end=' + time_end + '&planning_id='+idPlanning,
      dataType : 'json',
      success : function(result, statut){
          let target = result.dateAvailable+'.'+result.timeStart+'.'+result.planningId;
          let timeS = document.getElementById(target);
          timeS.classList.add("selected");
          document.getElementById(target+'.timeSlotId').value = result.idTimeSlot;
     }
  });
})
