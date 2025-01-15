<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PassageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Passage::latest();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $editRoute = route('passage.edit', ['id' => $data->id]);
                    $deleteRoute = route('passage.destroy', ['id' => $data->id]);
                    $actionButtons = '
                        <a href="' . $editRoute . '" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger"
                            onclick="showDeleteConfirm(' . $data->id . ', \'' . $deleteRoute . '\')">
                            <i class="fa-solid fa-trash"></i>
                        </button>';
                    return $actionButtons;
                })

                ->rawColumns(['title', 'total_word', 'passage', 'status', 'action'])
                ->make(true);
        }

        return view('admin.passage.index');
    }


    public function create()
    {
        return view('admin.passage.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'language_type' => ['required', 'in:bangla,english'],
            'word-count'   => ['required'],
            'passage-text' => ['required', 'string', 'min:10'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $totalWord = $request->input('word-count');
        $passage   = $request->input('passage-text');
        $type      = $request->input('language_type');

        $passageObj = new Passage();

        $passageObj->title         = 'This is title';
        $passageObj->total_word    = $totalWord;
        $passageObj->passage       = $passage;
        $passageObj->language_type = $type;

        $res = $passageObj->save();

        if ($res) {
            return redirect()->route('passage.list')->with('message', 'Passage create successfully');
        }
    }

    public function edit($id)
    {
        $passage = Passage::find($id);

        return view('admin.passage.edit', compact('passage'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'language_type' => ['required', 'in:bangla,english'],
            'word-count'    => ['required'],
            'passage-text'  => ['required', 'string', 'min:10'],
            'status'        => ['required', 'in:active, inactive'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $id      = $request->input('passage_id');
        $type    = $request->input('language_type');
        $word    = $request->input('word-count');
        $passageText = $request->input('passage-text');
        $status  = $request->input('status');

        $passage = Passage::find($id);

        if (!$passage):
            return redirect()->back()->with('failed', 'Passage not found');
        endif;

        $passage->language_type = $type;
        $passage->total_word    = $word;
        $passage->passage       = $passageText;
        $passage->status        = $status;

        $res = $passage->save();

        if ($res) {
            return redirect()->route('passage.list')->with('message', 'Passage update successfully');
        }
    }

    public function destroy($id)
    {
        $passage = Passage::find($id);

        $passage->delete();

        return response()->json(['success' => true]);
    }
}
