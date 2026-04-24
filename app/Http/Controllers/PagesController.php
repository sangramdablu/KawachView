<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends Controller
{
    public function showServices(){
        $services = Page::with('service')
            ->published()
            ->byType('service')
            ->get();

        return view('pages.services', compact('services'));
    }
}
