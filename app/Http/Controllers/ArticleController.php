<?php

namespace App\Http\Controllers;

use App\Article;
use App\Supplier;
use App\Http\Requests\StoreArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('supplier')->get();

        return view('article.index')->with([
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // check if any supplier exists, if not return to suppliers list
        if (!Supplier::count()) {
            return redirect()
            ->route('suppliers.index')
            ->with('warning','Devi inserire almeno un fornitore prima di creare un articolo.');
        }

        $article        = new Article;
        $suppliers      = Supplier::all()->pluck('nome', 'id')->toArray();
        $actualSupplier = 0;

        return view('article.createModify')->with([
            'article'        => $article,
            'suppliers'      => $suppliers,
            'actualSupplier' => $actualSupplier,
            'action'         => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticle $request)
    {
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $name = Str::camel($request->input('nome'));
            $filename = $name . time() . '.' . $foto->getClientOriginalExtension();
            Image::make($foto)->fit(200)->save( public_path('/uploads/foto/' . $filename ) );
        } else {
            $filename = "default.png";
        }

        $article = new Article;

        $article->ref              = $request->input('ref');
        $article->nome             = $request->input('nome');
        $article->descrizione      = $request->input('descrizione');
        $article->supplier_id      = $request->input('supplier_id');
        $article->prezzo           = $request->input('prezzo');
        $article->active           = $request->has('active') ? true : false;
        $article->quantitaminima   = $request->input('quantitaminima');
        $article->quantitaximballo = $request->input('quantitaximballo');
        $article->foto             = $filename;

        $article->save();

        return redirect()
        ->route('articles.index')
        ->with('success','Articolo creato corretamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $nome = $article->nome;

        $article->delete();

        return redirect()
        ->route('articles.index')
        ->with('success', $nome . ': articolo eliminato.');
    }
}
