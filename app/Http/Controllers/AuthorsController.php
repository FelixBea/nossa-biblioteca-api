<?php

namespace App\Http\Controllers;

class AuthorsController extends Controller {

  public function list() {
    return response()->json();
  }

  public function show($id) {
    return response()->json();
  }

  public function create(Request $request) {
    return response()->json();
  }

  public function update($id, Request $request) {
    return response()->json();
  }

  public function delete($id) {
    return response();
  }
}
