<?php

/**
 * Planning controller
 */
class PlanningController extends Controller
{

  public function list()
  {
    $manager = new PlanningManager();
    $plannings = $manager->findAll();
    $this->render('planning/list', ['plannings' => $plannings]);
  }


  public function show()
  {
    $manager = new PlanningManager();
    $planning = $manager->find($this->request->get('id'));
    $this->render('planning/show', ['planning' => $planning]);
  }

  public function create()
  {
    $planning = new Planning();
    $this->render('planning/edit', ['planning' => $planning]);
  }

  public function delete()
  {
    $manager = new PlanningManager();
    $planning = $manager->find($this->request->get('id'));
    $planning->delete();
    $this->redirect('home');
  }


  public function edit()
  {
    $manager = new PlanningManager();
    $planning = $manager->find($this->request->get('id'));
    $selecteds = [];
    foreach($planning->getTimeSlots() as $timeSlot) {
      $selecteds[$timeSlot->getIdGroup()] = $timeSlot;
    }
    if( $planning->getTimeSlots()) {
      if(!$firstDate = $planning->getTimeSlots()[0]->getDateAvailable()->format('Y-m-d')) $firstDate = null;
    } else {
      $firstDate = null;
    }
    $calendar = new CalendarService($firstDate);
    $mode = "calendarEdit.js";
    $this->render('planning/edit', ['planning' => $planning, 'calendar' => $calendar, 'selecteds' => $selecteds, 'mode' => $mode]);
  }

  public function update()
  {
      $planning = new Planning($this->request->get('data'));
      $planning->setUser($this->session->getUser());
      $last_id = $planning->save();
      $this->redirect('modification-planning/'.$last_id);
  }

  public function validateSlug() {

      $manager = new PlanningManager();
      $planning = $manager->findBySlug($this->request->get('slug'));

      ($planning) ? $result = 1 : $result = 0;

      $this->renderString($result);
  }

  public function navCalendar()
  {
      $calendar  = new CalendarService($this->request->get('targetDate'));
      $manager = new PlanningManager();
      $planning = $manager->find($this->request->get('idPlanning'));
      $selecteds = [];
      foreach($planning->getTimeSlots() as $timeSlot) {
        $selecteds[$timeSlot->getIdGroup()] = $timeSlot;
      }
      $mode = "calendar".$this->request->get('mode').".js";

      $this->renderHtml('planning/_calendar', ['planning' => $planning, 'calendar' => $calendar, 'selecteds' => $selecteds, 'mode' => $mode]);
  }

}
