$( document ).ready(function() {


      $('.clearBooking').click(function() {


      console.log('hello');

        let datas = $(this).attr('id');
        let id_time_slot = datas.split('-')[0];
        let person_id    = datas.split('-')[1];

        let deleteName = $('#detailsName-'+id_time_slot).text();
        let deleteInfo = $('#li-info-'+id_time_slot).text();

        $('#modal2').show();

        $('#deleteIdTimeSlot').val(id_time_slot);
        $('#deletePersonId').val(person_id);

        $('#deleteName').html('<b>'+deleteName+'</b>');
        $('#deleteDate').html('<b>'+deleteInfo+'</b>');

      })


      $('.closeModalButton2').click(function() {
        $('#modal2').hide();
      })

      $('#deleteBooking').click(function() {

              let urlRemove    = HOST+'removeBooking';
              let id_time_slot = $('#deleteIdTimeSlot').val();
              let person_id    = $('#deletePersonId').val();

              $.ajax({
                  url : urlRemove,
                  type : 'POST',
                  data : 'id_time_slot=' + id_time_slot + '&person_id=' + person_id,
                  dataType : 'json',
                  success : function(result, statut){
                    let target = 'details-'+result.timeSlotId;
                    let liId   = 'li-'+result.timeSlotId;
                    let myLi   = document.getElementById(liId);
                    let mySpan = document.getElementById(target);
                    myLi.classList.remove("booked");
                    mySpan.innerHTML = "";
                 }
              });
      })

});
