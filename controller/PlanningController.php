<?php

/**
 * Planning controller
 */
class PlanningController extends Controller
{

  public function list($request)
  {
    $manager = new PlanningManager();
    $plannings = $manager->findAll();
    $this->render('planning/list', ['plannings' => $plannings]);
  }


  public function show($request)
  {
    $manager = new PlanningManager();
    $planning = $manager->find($request->get('id'));
    $this->render('planning/show', ['planning' => $planning]);
  }

  public function create($request)
  {
    $planning = new Planning();
    $this->render('planning/edit', ['planning' => $planning]);
  }

  public function delete($request)
  {
    $manager = new PlanningManager();
    $planning = $manager->find($request->get('id'));
    $planning->delete();
    $this->redirect('home');
  }


  public function edit($request)
  {
    $manager = new PlanningManager();
    $planning = $manager->find($request->get('id'));
    $selecteds = [];
    foreach($planning->getTimeSlots() as $timeSlot) {
      $selecteds[$timeSlot->getIdGroup()] = $timeSlot;
    }
    if(!$firstDate = $planning->getTimeSlots()[0]->getDateAvailable()->format('Y-m-d')) $firstDate = null;
    $calendar = new CalendarService($firstDate);
    $mode = "calendarEdit.js";
    $this->render('planning/edit', ['planning' => $planning, 'calendar' => $calendar, 'selecteds' => $selecteds, 'mode' => $mode]);
  }

  public function update($request)
  {
      $planning = new Planning($request->get('data'));
      $planning->setUser($this->session->getUser());
      $last_id = $planning->save();
      $this->redirect('modification-planning/'.$last_id);
  }

  public function navCalendar($request)
  {

      $calendar  = new CalendarService($request->get('targetDate'));
      $manager = new PlanningManager();
      $planning = $manager->find($request->get('idPlanning'));
      $selecteds = [];
      foreach($planning->getTimeSlots() as $timeSlot) {
        $selecteds[$timeSlot->getIdGroup()] = $timeSlot;
      }
      $mode = "calendar".$request->get('mode').".js";

      $this->renderHtml('planning/_calendar', ['planning' => $planning, 'calendar' => $calendar, 'selecteds' => $selecteds, 'mode' => $mode]);
  }

}
