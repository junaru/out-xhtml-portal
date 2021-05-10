<?php

namespace App\Models;
use App\Models\JSONResponse;

class LRT
{
    public function homeArticles()
    {
        $jr = new JSONResponse("https://www.lrt.lt/api/json/home");
        
        $articles = $jr->getJson()->articles;
        foreach ($articles as $key => &$article) {
            if ($article->article_type != '1') {
                unset($articles[$key]);
            }
        }
        return $articles;

    }

    public function getArticle($id)
    {
        $jr = new JSONResponse("https://www.lrt.lt/api/json/article/" . $id);
        return $jr->getJson()->article;
    }
}
