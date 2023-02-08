<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
  //
  public function me()
  {
    var_dump("in me");
    exit;
  }

  public function register()
  {
    var_dump("In register");
    exit;
  }
  public function login()
  {
    var_dump("In Login");
    exit;
  }
}