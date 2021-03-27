<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusControler extends Controller
{
    public function getListFromStatus($id){
        return Status::with('devices')->where('id',$id)->get();
    }
}
