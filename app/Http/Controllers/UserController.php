<?php

namespace App\Http\Controllers;
use App\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    return view('users.index');
  }

  public function indexData()
  {
    $users = User::all();
    return Datatables::of($users)
    ->addColumn('action', function ($user) {
      return '<a href="#edit-'.$user->id.'" class="btn btn-sm btn-primary"> Edit</a>';
    })
    ->editColumn('id','ID: {{ $id }}')
    ->removeColumn('password')
    ->make(true);
  }
}
