<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => ['required', 'string', 'min:2'],
            'std_id'     => ['required'],
            'type'       => ['required'],
            'time_count' => ['required'],
            'total_word' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $name      = $request->input('name');
        $stdId     = $request->input('std_id');
        $type      = $request->input('type');
        $time      = $request->input('time_count');
        $totalWord = $request->input('total_word');

        $passage = Passage::where('language_type', $type)->where('total_word', $totalWord)->first();

        if (!$passage):
            return redirect()->back()->with('message', 'Passage not found');
        endif;

        Session::put($stdId, $passage);

        $data['passage']    = $passage->passage;
        $data['name']       = $name;
        $data['stdId']      = $stdId;
        $data['type']       = $type;
        $data['time']       = $time;
        $data['total_word'] = $totalWord;

        Session::get($stdId);

        return response()->json([
            'status' => true,
            'message' => 'Data found',
            'data' => $data,
            'code' => 200
        ]);
    }
}
