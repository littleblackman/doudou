<?php

/**
 * TimeSlot controller
 */
class TimeSlotController extends Controller
{

  public function addTimeSlot($request)
  {
      $timeSlot = new TimeSlot($request->getParams());
      $timeSlot = $timeSlot->save();
      $this->renderJson($timeSlot->toArray());
  }

  public function delTimeSlot($request)
  {
    $manager = new TimeSlotManager();
    $timeSlot = $manager->find($request->get('idTimeSlot'));
    $timeSlot->delete();
    $this->renderJson(['message' => 'Plage horaire supprimée']);
  }

}
