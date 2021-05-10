<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plugins;
use Artisan;

use App\Http\Requests\IdValidateRequest;

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
    public function installPlugin(IdValidateRequest $request)
    {
        //  проверка прав
        $idPlugin = $request->input('id');
        $result = Artisan::call('command:installPluginCommand', ['idPlugin' => $idPlugin] );
        return $result;
    }

    /**
     *
     */
    public function deletePlugin(IdValidateRequest $request)
    {
        //  проверка прав
        $idPlugin = $request->input('id');
        $result = Artisan::call('command:deletePluginCommand', ['idPlugin' => $idPlugin] );
        return $result;
    }
}