<?php

namespace App\Http\Controllers;

use App\Models\Passage;
use App\Models\TypeResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    public function test()
    {
        return 1100000;
    }

    public function calculateResult(Request $request)
    {
        $stdId       = $request->input('std_id');
        $name        = $request->input('name', 'Unknown');
        $typedText   = $request->input('typed_text');
        $passageText = $request->input('passage');
        $category    = $request->input('category');
        $timeLimit   = $request->input('time_count', 1) * 60;

        $typedWords   = array_filter(explode(' ', $typedText));
        $passageWords = array_filter(explode(' ', $passageText));

        $totalTypedWords   = count($typedWords);
        $totalPassageWords = count($passageWords);

        $correctWords = 0;
        $wrongWords = [];
        $doubleWords = [];
        $skippedWords = [];

        // Compare words
        foreach ($passageWords as $index => $word) {
            if (isset($typedWords[$index])) {
                if ($typedWords[$index] === $word) {
                    $correctWords++;
                } else {
                    $wrongWords[] = $typedWords[$index];
                }
            } else {
                $skippedWords[] = $word;
            }
        }

        // Check for duplicates in typed words
        $typedWordCounts = array_count_values($typedWords);
        foreach ($typedWordCounts as $word => $count) {
            if ($count > 1) {
                $doubleWords[$word] = $count;
            }
        }

        $grossWPM = $totalTypedWords / ($timeLimit / 60);
        $netWPM   = $correctWords / ($timeLimit / 60);
        $accuracy = $totalTypedWords > 0 ? ($correctWords / $totalTypedWords) * 100 : 0;

        $data = [
            'name'          => $name,
            'gross_wpm'     => number_format($grossWPM, 2),
            'net_wpm'       => number_format($netWPM, 2),
            'accuracy'      => number_format($accuracy, 2) . '%',
            'double_words'  => $doubleWords,
            'skipped_words' => $skippedWords,
            'wrong_words'   => $wrongWords,
        ];

        $typeResultObj = new TypeResult();

        $typeResultObj->name            = $data['name'];
        $typeResultObj->std_id          = $stdId;
        $typeResultObj->gross_wpm       = $data['gross_wpm'];
        $typeResultObj->net_wpm         = $data['net_wpm'];
        $typeResultObj->accuracy        = $data['accuracy'];
        $typeResultObj->double_words    = is_array($data['double_words']) ? implode(',', $data['double_words']) : $data['double_words'];
        $typeResultObj->skipped_words   = is_array($data['skipped_words']) ? implode(',', $data['skipped_words']) : $data['skipped_words'];
        $typeResultObj->wrong_words     = is_array($data['wrong_words']) ? implode(',', $data['wrong_words']) : $data['wrong_words'];
        $typeResultObj->typing_category = $category;
        $typeResultObj->duration        = $timeLimit;


        $res = $typeResultObj->save();

        if($res){
            return response()->json([
                'status' => true,
                'data'   => $typeResultObj
            ]);
        }
    }


    /**
     * @api {get} /get-passage Get a random passage for given category and total word count
     * @apiName GetPassage
     * @apiGroup Passage
     * @apiParam {String} name Student name
     * @apiParam {String} stdId Student ID
     * @apiParam {String} category Passage category
     * @apiParam {Integer} total_word Total words in passage
     * @apiSuccess {Boolean} status Status of the response
     * @apiSuccess {String} passage Passage text
     * @apiSuccess {Integer} time Time in seconds
     * @apiError {String} message No passages found for the selected category
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 404 Not Found
     *     {
     *       "status": false,
     *       "message": "No passages found for the selected category."
     *     }
    */
    public function getPassage(Request $request)
    {
        $request->validate([
            'name'       => 'required|string',
            'stdId'      => 'required',
            'category'   => 'required|string',
            'total_word' => 'required|integer',
        ]);

        $user = User::where('std_id', $request->input('stdId'))->first();

        if(!$user){
            $userObj = new User();

            $userObj->name     = $request->input('name');
            $userObj->email    = $request->input('name').'@gmail.com';
            $userObj->std_id   = $request->input('stdId');
            $userObj->password = Hash::make('123456');
            $userObj->role     = 'user';
            $userObj->status   = 'active';

            $userObj->save();
        }

        $category  = $request->input('category');
        $totalWord = $request->input('total_word');

        $passage = Passage::where('language_type', $category)
            ->where('total_word', $totalWord)
            ->inRandomOrder()
            ->first();

        if (!$passage) {
            return response()->json([
                'status' => false,
                'message' => 'No passages found for the selected category.',
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => [
                'passage' => $passage->passage,
                'time' => ceil($totalWord / 200),
            ],
        ]);
    }
}
