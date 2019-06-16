<?php

namespace App\Http\Controllers;

use App\Order;
use App\Line;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('lines.article')->get();

        return view('order.index')->with([
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order  = new Order;

        return view('order.createModify')->with([
            'order'  => $order,
            'action' => 'create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request is not empty
        if($request->filled('article_list')){
            // add a new order.
            $order            = new Order;
            $order->user_id   = Auth::user()->id;
            $order->creato_il = Carbon::now();
            $order->stato     = $order::CREATO;
            $order->save();
            
            $articles = $request->article_list;
            $quantities = $request->qta;

            // loop throught the list
            foreach($articles as $index => $article){
                // insert the line of the order if quantity is not null or zero
                if($quantities[$index] != 0){
                    // insert the record
                    $line             = new Line;
                    $line->order_id   = $order->id;
                    $line->article_id = $articles[$index];
                    $line->quantita   = $quantities[$index];
                    $line->stato      = Line::CREATA;
                    $line->save();
                }
            }

            // send the link to the responsable of confirming
            notifyOrder();
        }

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
        ->route('orders.index')
        ->with('success','Ordine eliminato.');
    }

    public function conferma()
    {
        return 'Ordine inviato';
    }
}
