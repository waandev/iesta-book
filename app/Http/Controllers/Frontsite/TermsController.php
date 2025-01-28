<?php

namespace App\Http\Controllers\Frontsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Show the Terms and Conditions page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.frontsite.terms.index');
    }
}
