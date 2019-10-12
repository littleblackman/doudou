<?php

/**
 * Booking controller
 */
class BookingController extends Controller
{
  public function show() {

      $manager = new PlanningManager();
      $planning = $manager->findBySlug($this->request->get('slug'));

      $selecteds = [];
      foreach($planning->getTimeSlots() as $timeSlot) {
        $selecteds[$timeSlot->getIdGroup()] = $timeSlot;
      }
      if(!$firstDate = $planning->getTimeSlots()[0]->getDateAvailable()->format('Y-m-d')) $firstDate = null;
      $calendar = new CalendarService($firstDate);

      $mode = "calendarShow.js";

      $this->setBaseTemplate('public');

      $this->render('booking/show', ['planning' => $planning, 'calendar' => $calendar, 'selecteds' => $selecteds, 'mode' => $mode]);
  }

  public function bookTimeSlot() {

      $timeSlotManager = new TimeSlotManager();
      $personManager   = new PersonManager();

      $timeSlot = $timeSlotManager->find($this->request->get('idTimeSlot'));
      $person   = $personManager->createPerson($this->request->get('bookingFirstname'), $this->request->get('bookingLastname'), $this->request->get('bookingEmail'));

      $timeSlotManager->joinPerson($timeSlot, $person);

      $id = $timeSlot->getDateAvailable()->format('Y-m-d').'.'.$timeSlot->getTimeStart()->format('H:i').'.'.$timeSlot->getPlanningId();

      $this->renderJson(['message' => 'Horaire réservé', 'id' => $id]);

  }

  public function remove() {

      $timeSlotManager = new TimeSlotManager();
      $timeSlot = $timeSlotManager->find($this->request->get('id_time_slot'));

      $personManager = new PersonManager();
      $person = $personManager->find($this->request->get('person_id'));

      $timeSlotManager->removePerson($timeSlot, $person);
      $personManager->delete($person);

      $this->renderJson(['timeSlotId' => $timeSlot->getId()]);

  }
}
