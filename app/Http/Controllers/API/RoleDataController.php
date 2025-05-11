<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleDataController extends Controller
{
    public function adminData() {
        return response()->json(['message' => 'Admin data']);
    }
    
    public function userData() {
        return response()->json(['message' => 'User data']);
    }
    
}
