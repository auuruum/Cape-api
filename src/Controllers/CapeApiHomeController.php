<?php

namespace Azuriom\Plugin\CapeApi\Controllers;

use Azuriom\Http\Controllers\Controller;

class CapeApiHomeController extends Controller
{
    /**
     * Show the home plugin page.
     */
    public function index()
    {
        return view('cape-api::index');
    }
}
