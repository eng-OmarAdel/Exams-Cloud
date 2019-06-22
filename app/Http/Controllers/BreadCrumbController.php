<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class BreadCrumbController extends Controller
{
  public function index()
  {
      return response()->json(Session::get("breadcrumb"));
  }

  public function store(Request $request)
  {
    Session::put('breadcrumb', $request->breadcrumb);
    Session::save();
    return response()->json($request->breadcrumb);
  }
}
