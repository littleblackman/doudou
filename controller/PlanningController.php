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
    $this->render('home', ['plannings' => $plannings]);
  }


  public function show($request)
  {
    $manager = new PlanningManager();
    $planning = $manager->find($request->get('id'));
    $this->render('show', ['planning' => $planning]);
  }

}
