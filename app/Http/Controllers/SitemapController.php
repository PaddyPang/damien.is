<?php

namespace Damien\Http\Controllers;

use Carbon\Carbon;
use Sitemap;

class SitemapController extends Controller
{
    public function index()
    {
        // Get a general sitemap.
        Sitemap::addTag('/', Carbon::createFromTimestamp(filemtime(resource_path('views/home.blade.php'))), 'monthly', '1');

        return Sitemap::render();
    }
}
