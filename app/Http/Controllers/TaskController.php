<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * Task Controller Logic for API Requests
 */

class TaskController extends Controller
{
  public function index() {
    return "index";
  }

  public function create() {
    return "create";
  }

  public function show() {
    return "show";
  }

  public function update() {
    return "update";
  }

  public function destroy() {
    return "destroy";
  }

}
