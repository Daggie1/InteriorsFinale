<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends BaseController
{
 public function index(){
     $this->setPageTitle('Users','All Users');
$users= User::all();
return view('admin.users.index',compact('users'));
 }
    public function indexAdmin(){
        $this->setPageTitle('Admins','All admins');
        $users= Admin::all();
        return view('admin.admins.index',compact('users'));
    }
}
