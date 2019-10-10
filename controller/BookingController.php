<?php

/**
 * Booking controller
 */
class BookingController extends Controller
{
  public function show($request) {

      $manager = new PlanningManager();
      $planning = $manager->findBySlug($request->get('slug'));

      $selecteds = [];
      foreach($planning->getTimeSlots() as $timeSlot) {
        $selecteds[$timeSlot->getIdGroup()] = $timeSlot;
      }
      if(!$firstDate = $planning->getTimeSlots()[0]->getDateAvailable()->format('Y-m-d')) $firstDate = null;
      $calendar = new CalendarService($firstDate);

      $mode = "calendarShow.js";

      $this->render('booking/show', ['planning' => $planning, 'calendar' => $calendar, 'selecteds' => $selecteds, 'mode' => $mode]);
  }

  public function bookTimeSlot($request) {

      $timeSlotManager = new TimeSlotManager();
      $personManager   = new PersonManager();

      $timeSlot = $timeSlotManager->find($request->get('idTimeSlot'));
      $person   = $personManager->createPerson($request->get('bookingFirstname'), $request->get('bookingLastname'), $request->get('bookingEmail'));

      $timeSlotManager->joinPerson($timeSlot, $person);

      $id = $timeSlot->getDateAvailable()->format('Y-m-d').'.'.$timeSlot->getTimeStart()->format('H:i').'.'.$timeSlot->getPlanningId();

      $this->renderJson(['message' => 'Horaire réservé', 'id' => $id]);

  }
}
