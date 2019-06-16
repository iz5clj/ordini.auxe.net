<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = new Article;

        $article->ref              = '123456';
        $article->nome             = 'Latte piu di 1,5Lt';
        $article->quantitaximballo = 1;
        $article->quantitaminima   = 1;
        $article->prezzo           = 2.50;
        $article->supplier_id      = 1;

        $article->save();

        $article = new Article;

        $article->ref              = 'yogbio';
        $article->nome             = 'yogurt Bio bianco 125ml';
        $article->quantitaximballo = 1;
        $article->quantitaminima   = 1;
        $article->prezzo           = 0.98;
        $article->supplier_id      = 1;

        $article->save();

        $article = new Article;

        $article->ref              = '2312';
        $article->nome             = 'Yogurt Bio mirtilli';
        $article->quantitaximballo = 1;
        $article->quantitaminima   = 1;
        $article->prezzo           = 1.00;
        $article->supplier_id      = 1;

        $article->save();

        $article = new Article;

        $article->ref              = '324544';
        $article->nome             = 'Croissants congelati';
        $article->quantitaximballo = 1;
        $article->quantitaminima   = 1;
        $article->prezzo           = 0.25;
        $article->supplier_id      = 2;

        $article->save();
    }
}
