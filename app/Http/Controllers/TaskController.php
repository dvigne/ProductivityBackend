<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Auth;
use DB;
use Str;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

/**
 * Task Controller Logic for API Requests
 */

class TaskController extends Controller
{
  public function index() {
    return Task::all();
  }

  public function store(Request $request) {
    $requestData = $request->all();
    $team = Team::firstOrFail()->id;
    return DB::table('tasks')->insert([
      'id' => Str::uuid(),
      'assigned' => $requestData['assigned'],
      'team_id' => $team,
      'name' => $requestData['name'],
      'description' => $requestData['description'],
      'category' => $requestData['category'],
      'status' => $requestData['status'],
    ]);
  }

  public function show($task) {
    return Task::findOrFail($task)->with('comments')->get();
  }

  public function update($task, TaskRequest $request) {
    $validated = $request->validated();

    Task::findOrFail($task)->update([
      'assigned' => $validated['assigned'],
      'name' => $validated['name'],
      'description' => $validated['description'],
      'category' => $validated['category'],
      'status' => $validated['status'],
    ]);

    return Task::find($task);
  }

  public function destroy($task) {
    Task::destroy($task);
  }

  public function addComment(Request $request)
  {
    // TODO
  }

  public function destroyComment($comment)
  {
    // TODO
  }

  public function updateComment($comment, Request $request)
  {
    // TODO
  }
}
