<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LRT;
use App\Models\LrtHome;

class LRTController extends Controller
{
    public function index()
    {
        $lrt = new LRT();
        $articles = $lrt->homeArticles();

        return view('lrt.index', compact(['articles']));
    }

    public function show($id)
    {
        $lrt = new LRT();
        $article = $lrt->getArticle($id);
        return view('lrt.show', compact(['article']));
    }
}
