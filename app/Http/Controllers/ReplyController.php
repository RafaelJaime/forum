<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ValidReply;
use App\Reply;

class ReplyController extends Controller
{
    public function store(){
        $this->validate(request(),[
            'reply'=>['required',new ValidReply]
        ]);

        Reply::create(request()->input());
        return back()->with('message', ['success', __('Respuesta añadida correctamente')]);
    }
}
