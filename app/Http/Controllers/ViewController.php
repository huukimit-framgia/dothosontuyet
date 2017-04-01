<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
    public static function view($view = '', $title = '', $subTitle, array $message = null){
    	if($message != null){
    		return view($view)->with(['title' => $title, MESSAGE => $message, 'subTitle' => $subTitle]);
    	} else {
    		return view($view)->with(['title' => $title, 'subTitle' => $subTitle]);
    	}
    }

    public static function redirect($view = '', array $message = null){
    	if($message != null){
    		return redirect($view)->with([MESSAGE => $message]);
    	} else {
    		return redirect($view);
    	}
    }

    public static function createMessage($message = '', $status = 'success'){
        return [
            'status' => $status,
            'message' => $message
        ];
    }
}
