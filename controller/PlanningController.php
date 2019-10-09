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
    $calendar = new CalendarService();
    $this->render('planning/edit', ['planning' => $planning, 'calendar' => $calendar]);
  }

  public function update($request)
  {
      $planning = new Planning($request->get('data'));
      $planning->setUser($this->session->getUser());
      $last_id = $planning->save();
      $this->redirect('modification-planning/'.$last_id);
  }

  public function addTimeSlot($request)
  {
      $timeSlot = new TimeSlot($request->getParams());
      //$timeSlot->save();
      echo '<pre>'; print_r($timeSlot); exit;
  }

}
