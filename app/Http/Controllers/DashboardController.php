<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Passage;
use App\Models\TypeResult;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['totalUser'] = TypeResult::select('std_id')->groupBy('std_id')->get();

        $data['recent_result'] = TypeResult::latest()->limit(10)->get();

        $data['todayTypeTest'] = TypeResult::whereBetween('created_at', [
            Carbon::today()->startOfDay(),
            Carbon::today()->endOfDay(),
        ])->count();

        $data['total_passage'] = Passage::where('status', 'active')->count();

        return view('admin.dashboard')->with($data);
    }
}
