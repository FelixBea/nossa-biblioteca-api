<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller {

  public function list() {
    $authors = DB::table('authors')->get();
    return response()->json($authors);
  }

  public function show($id) {
    return response()->json();
  }

  public function create(Request $request) {
    $this->validate($request, [
      'name' => 'required',
      'birth' => 'required|date',
      'country' => 'required',
      'gender' => 'required'
    ]);
    return response()->json();
  }

  public function update($id, Request $request) {
    return response()->json();
  }

  public function delete($id) {
    return response();
  }
}
