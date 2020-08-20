<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorsController extends Controller {

  protected array $validateArray;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->validateArray = [
      'name' => 'required|unique',
      'birth' => 'required|date',
      'country' => 'required',
      'gender' => ['required', Rule::in(['Masculino', 'Feminino', 'Não-binário'])]
    ];
  }

  public function list() {
    $authors = DB::table('authors')->get();
    return response()->json($authors);
  }

  public function show($id) {
    $author = DB::table('authors')->where('id', $id)->get();
    return response()->json($author);
  }

  public function create(Request $request) {
    $this->validate($request, $this->validateArray);

    $authorId = DB::table('authors')->insertGetId([
      'name' => $request->input('name'),
      'birth' => $request->input('birth'),
      'country' => $request->input('country'),
      'gender' => $request->input('gender')
    ]);

    return response()->json(['id' => $authorId]);
  }

  public function update(Request $request, $id) {
    $validateUpdate = $this->validateArray;
    $validateUpdate['name'] = ['required', Rule::unique('authors')->ignore($id)];
    $this->validate($request, $this->$validateUpdate);

    $author = DB::table('authors')->where('id', $id)->update([
      'name' => $request->input('name'),
      'birth' => $request->input('birth'),
      'country' => $request->input('country'),
      'gender' => $request->input('gender')
    ]);

    return response()->json($author);
  }

  public function delete($id) {
    DB::table('authors')->where('id', $id)->delete();
    return response();
  }
}
