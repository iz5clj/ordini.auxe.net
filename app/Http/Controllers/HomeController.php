<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Line;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Lines created but not confirmed yet by the responsable
        $suppliers = DB::table('articles')
        ->join('lines', 'lines.article_id', '=', 'articles.id')
        ->join('suppliers', 'articles.supplier_id', '=', 'suppliers.id')
        ->join('agents', 'suppliers.agent_id', '=', 'agents.id')
        ->where('lines.stato', '=', Line::CREATA)
        ->orderBy('suppliers.id', 'desc')
        ->groupBy('suppliers.id')
        ->select( 'suppliers.id AS fo_id', 'suppliers.nome AS fo_nome', 'agents.nome AS ag_nome')
        ->get();

        $lines = Line::with('article.supplier')->where('stato', '=', Line::CREATA)->get();


        return view('home')->with([
            'suppliers' => $suppliers,
            'lines'     => $lines,
        ]);
    }
}
