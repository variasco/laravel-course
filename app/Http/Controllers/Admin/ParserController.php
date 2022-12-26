<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Resource;

class ParserController extends Controller
{
    public function index()
    {
        foreach (Resource::all() as $resource) {
            NewsParsing::dispatch($resource->source);
        }

        return redirect()->route("admin.news.index");
    }
}
