<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function chooser(Request $request) {
        $request->session()->set('locale', $request->input('language'));

        return redirect()->back();

    }
}
