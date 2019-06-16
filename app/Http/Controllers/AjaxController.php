<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class AjaxController extends Controller
{
    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $articles = Article::query()->where('nome', 'LIKE', "%{$term}%")->limit(10)->get();

        $formatted_articles = [];

        foreach ($articles as $article) {
            $formatted_articles[] = ['id' => $article->id, 'text' => $article->nome];
        }

        return \Response::json($formatted_articles);
    }
}
