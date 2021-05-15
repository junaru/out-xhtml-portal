<?php

namespace App\Models;
use Carbon\Carbon;
use App\Models\JSONResponse;
use App\Models\LrtHome;

class LRT
{
    public function homeArticles()
    {
        $json = null;
        $articles = [];

        $home = LrtHome::where('retrieved', '>=', Carbon::now()->subHours(1))
            ->orderBy('retrieved', 'desc')
            ->first();

        if ($home) {
            $json = json_decode($home->contents);
            //dd('cached');
        } else {
            $jr = new JSONResponse("https://www.lrt.lt/api/json/home");
            $json = $jr->getJson();

            $home = new LrtHome();
            $home->retrieved = Carbon::now();
            $home->contents = $jr->getResponse();
            $home->save();
        }

        if (isset($json->articles)) {
            $articles = $json->articles;
        }

        foreach ($articles as $key => &$article) {
            if ($article->article_type != '1') {
                unset($articles[$key]);
            }
        }

        return $articles;
    }

    public function getArticle($id)
    {
        $json = null;

        $lrt_article = LrtArticle::where('article_id', '=', $id)->first();

        if ($lrt_article) {
            $json = json_decode($lrt_article->contents);
            //dd('cached article');
        } else {
            $jr = new JSONResponse("https://www.lrt.lt/api/json/article/" . $id);
            $json = $jr->getJson();

            $lrt_article = new LrtArticle();
            $lrt_article->article_id = $id;
            $lrt_article->contents = $jr->getResponse();
            $lrt_article->save();
        }
        
        // TODO: return mock if response wasnt valid json
        return $json->article;
    }
}
