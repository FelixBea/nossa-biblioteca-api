<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BooksController extends Controller {

  protected array $validateArray;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->validateArray = [
      'title' => 'required|unique:books',
      'year' => 'required|integer',
      'author' => 'exists:authors,id'
    ];
  }

  public function list() {
    $books = DB::table('books')->get();
    return response()->json($books);
  }

  public function show($id) {
    $book = DB::table('books')->where('id', $id)->get();
    return response()->json($book);
  }

  public function create(Request $request) {
    $this->validate($request, $this->validateArray);

    $bookId = DB::table('books')->insertGetId([
      'title' => $request->input('title'),
      'year' => $request->input('year'),
      'author' => $request->input('author')
    ]);

    return response()->json(['id' => $bookId]);
  }

  public function update(Request $request, $id) {
    $validateUpdate = $this->validateArray;
    $validateUpdate['title'] = ['required', Rule::unique('books')->ignore($id)];
    $this->validate($request, $this->$validateUpdate);

    $book = DB::table('books')->where('id', $id)->update([
      'title' => $request->input('title'),
      'year' => $request->input('year'),
      'author' => $request->input('author')
    ]);

    return response()->json($book);
  }

  public function delete($id) {
    DB::table('books')->where('id', $id)->delete();
    return response();
  }
}
