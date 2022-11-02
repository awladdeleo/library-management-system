<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function lang_change($lang=null)
    {
        App::setLocale($lang);
        session()->put('lang_code',$lang);
        return redirect()->back();
    }
}
