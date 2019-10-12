<?php

/**
 * TimeSlot controller
 */
class TimeSlotController extends Controller
{

  public function addTimeSlot()
  {
      $timeSlot = new TimeSlot($this->request->getParams());
      $timeSlot = $timeSlot->save();
      $this->renderJson($timeSlot->toArray());
  }

  public function delTimeSlot()
  {
    $manager = new TimeSlotManager();
    $timeSlot = $manager->find($this->request->get('idTimeSlot'));
    $timeSlot->delete();
    $this->renderJson(['message' => 'Plage horaire supprimée']);
  }

}
