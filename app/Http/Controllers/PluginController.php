<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plugins;
use Artisan;

class PluginController extends Controller
{

    private $Plugin;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct()
    {
        $this->middleware('auth');
        $this->Plugin = new Plugins();
    }

    /**
     *  Возвращает страницу с таблицей всех плагинов
     */
    public function plugins()
    {
        return view('plugins');
    }

    /**
     *
     */
    public function getAllPlugins()
    {
        //  проверка прав

        $data = $this->Plugin->getAllPlugins();
        $data = json_encode($data);
        return $data;
    }

    /**
     *
     */
    public function installPlugin(Request $request)
    {
        //  проверка прав
        $idPlugin = $request->input('id');
        Artisan::call('command:installPluginCommand', ['idPlugin' => $idPlugin] );
    }

    /**
     *
     */
    public function deletePlugin(Request $request)
    {
        //  проверка прав
        $idPlugin = $request->input('id');
        Artisan::call('command:deletePluginCommand', ['idPlugin' => $idPlugin] );
    }
}