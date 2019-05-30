<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;
use DB;
use PDO;

class InfoController extends Controller
{
    public function __construct() {
        $this->middleware(['role:Super Admin']);
    }
    
    public function index() {

        $laravel              = app();
        // To use it directly in a Blade template, just use {{ App::VERSION() }}
        $php_version = PHP_MAJOR_VERSION . "." . PHP_MINOR_VERSION;

        try {
            $pdo = DB::connection()->getPdo();
            $myDriver = $pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
            $fullMysqlVersion = explode('-', $pdo->getAttribute(PDO::ATTR_SERVER_VERSION));
            $myVersion = $fullMysqlVersion[0];
        } catch(\Exception $e) {
            $myDriver  = 'No SQL Connection';
            $myVersion = 'No Version';
        }

        $infos = array(
            array(
                "title" => "Laravel Version",
                "value" => $laravel::VERSION
            ),
            array(
                "title" => "SAPI",
                "value" => PHP_SAPI
            ),
            array(
                "title" => "PHP Version",
                "value" => $php_version
            ),
            array(
                "title" => "Max File Size",
                "value" => ini_get('post_max_size')
            ),
            array(
                "title" => "Operating System",
                "value" => PHP_OS
            ),
            array(
                "title" => "Host Name",
                "value" => gethostname()
            ),
            array(
                "title" => "PHP Memory Limit",
                "value" => ini_get('memory_limit')
            ),
            array(
                "title" => $myDriver,
                "value" => $myVersion
            ),
            array(
                "title" => "Utenti",
                "value" => User::count()
            ),
            array(
                "title" => "Ruoli",
                "value" => Role::count()
            ),
            array(
                "title" => "Permessi",
                "value" => Permission::count()
            ),
            array(
                "title" => "Entrate nei Logs",
                "value" => Activity::count()
            )
        );

        return view('info', compact('infos'));
    }

    public function phpinfo() {
        return view('phpinfo');
    }
}
