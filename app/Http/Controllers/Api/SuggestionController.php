<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mode\suggestions;
use App\Models\Suggestion;
use Illuminate\Support\Facades\Validator;


class SuggestionController extends Controller
{
    public function suggestions(Request $request)
    {
        $rules = [
            'email'                      => 'required|email' ,
            'suggestion'                 => 'required' ,
        ];

        $messages = [
            'email.required'              => __('lang.email-required'),
            'email.email'                 => __('lang.email-invalid'),
            'suggestion.required'         => __('lang.suggestion-required'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ( $validator->fails() ) {
            return response()->json( [
                'status'    => 'failed',
                'message'   => $validator->errors()->first(),
            ] , 422 );
        }

        $data = Suggestion::create([
            'email'            => $request->email,
            'suggestion'       => $request->suggestion,
        ]);

        return response()->json([
            'staus'     => 'true',
            'data'      => $data ,
            'Message'   => __('lang.suggestion-added')
        ] , 200 );
    }
}
