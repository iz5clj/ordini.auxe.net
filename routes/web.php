<?php
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\URL;
use App\Order;
use App\Line;
use App\Supplier;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('users', 'UserController@index')->name('users');
    Route::get('/user/create', 'UserController@create')->name('userCreateForm');
    Route::post('/user/store', 'UserController@store')->name('userStore');
    Route::get('/user/{user}', 'UserController@modify')->name('userModify');
    Route::put('/user/{user}', 'UserController@update')->name('userUpdate');
    Route::delete('/user/{user}', 'UserController@destroy')->name('userDestroy');


    Route::get('roles', 'RoleController@index')->name('roles');
    Route::get('/role/create', 'RoleController@create')->name('roleCreateForm');
    Route::post('/role/store', 'RoleController@store')->name('roleStore');
    Route::get('/role/{role}', 'RoleController@modify')->name('roleModify');
    Route::put('/role/{role}', 'RoleController@update')->name('roleUpdate');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('roleDestroy');

    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('/permission/create', 'PermissionController@create')->name('permissionCreateForm');
    Route::post('/permission/store', 'PermissionController@store')->name('permissionStore');
    Route::get('/permission/{permission}', 'PermissionController@modify')->name('permissionModify');
    Route::put('/permission/{permission}', 'PermissionController@update')->name('permissionUpdate');
    Route::delete('/permission/{permission}', 'PermissionController@destroy')->name('permissionDestroy');

    Route::resources([
        'agents'    => 'AgentController',
        'articles'  => 'ArticleController',
        'suppliers' => 'SupplierController',
        'orders'    => 'OrderController',
        'lines'     => 'Linecontroller'
    ]);

    Route::get('sendemail', function(){
        
        Mail::to('ms@auxe.net')->queue(new TestMail());

        return redirect(route('home'));

    })->name('test.sendmail');

    Route::get('logs', 'LogController@index')->name('logs');

    Route::get('info', 'InfoController@index')->name('info');
    Route::get('phpinfo', 'InfoController@phpinfo')->name('phpinfo');

    Route::get('profile', 'UserController@profile')->name('profile.show');
    Route::put('profile({user}', 'UserController@profileUpdate')->name('profile.update');

    Route::get('/ajax/find', 'AjaxController@find');

});

Auth::routes();

Route::get('conferma', 'OrderController@conferma')->name('conferma')->middleware('signed');

Route::get('test1', function(){
    $orders = Order::creato()->with('lines.article.supplier.agent')->get(); 
    
    $flat = $orders->flatten(4);
    return $flat;

    $grouped = $orders->groupBy([
        'stato',
        function ($item) {
            return $item['lines'];
        },
    ], $preserveKeys = true);
    return $grouped;

    foreach ($orders as $order) {
        foreach( $order->lines as $line) {
            echo $line->article->nome . ' da ' . $line->article->supplier->nome . '<br>';
        }
    }
});

Route::get('test2', function(){

    $lines = DB::table('lines')
        ->join('articles', 'lines.article_id', '=', 'articles.id')
        ->join('suppliers', 'articles.supplier_id', '=', 'suppliers.id')
        ->join('agents', 'suppliers.agent_id', '=', 'agents.id')
        ->join('orders', 'lines.order_id', '=', 'orders.id')
        ->where('lines.stato', '=', 1)
        ->orderBy('suppliers.id')
        ->groupBy('articles.id')
        ->select('lines.id AS line', 'orders.id AS order', 'articles.nome', 'lines.quantita', 'agents.email')
        ->get();

    return $lines;

});

Route::get('test3', function(){

    $lines = Line::creata()->with('article.supplier.agent')->get(); 
    $grouped = $lines->groupBy('agent', function($item) {
        return $item['supplier'];
    }, $preserveKeys = true);
    return $grouped;

});

Route::get('test4', function(){

    $articles = DB::table('articles')
        ->join('lines', 'lines.article_id', '=', 'articles.id')
        ->join('suppliers', 'articles.supplier_id', '=', 'suppliers.id')
        ->where('lines.stato', '=', Line::CREATA)
        ->orderBy('suppliers.id', 'desc')
        ->groupBy('suppliers.id')
        ->select('suppliers.nome AS fo_nome')
        ->get();

    return $articles;

});