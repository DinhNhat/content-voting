<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusApiController extends Controller
{
    public function __invoke()
    {
        $listStatuses = Status::getCount();

        return response()->json([
            'success' => true,
            'message' => 'Get list of statuses',
            'data' => $listStatuses
        ], 200);
    }
}
