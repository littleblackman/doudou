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

  public function update($request)
  {
      $planning = new Planning($request->get('data'));
      $planning->setUser($this->session->getUser());
      $planning->save();
      $this->redirect('modification-planning/'.$planning->getId());
  }

}
