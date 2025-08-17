<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCOntroller extends Controller
{
    public function homepage()
    {
        return redirect()->route('/all-mcqs');
    }
}
