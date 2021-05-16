<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Plugins;

class installPluginCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:installPluginCommand {idPlugin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installing plugin.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $idPlugin = intval($this->argument('idPlugin'));

        $Plugin = new Plugins();
        $pluginData = $Plugin->getInstallCommandPlugin($idPlugin);
        $pluginData = $pluginData[0];

        shell_exec( $pluginData['requireComand'] . " 2>/dev/null &");   

        $nameSideFile = "@include('layouts.".$pluginData['sideFile']. "" .$pluginData['name']."')";

        if (file_exists(__DIR__ . "/../resources/views/layouts/sidePlugins.blade.php")) {
            file_put_contents("../resources/views/layouts/sidePlugins.blade.php", $nameSideFile, FILE_APPEND);
        }
        

        $Plugin->setStatusPlugin($idPlugin, $Plugin::STATUS_INSTALL);
        return true;
    }

    protected function getArguments()
    {
        return array(
            array('idPlugin', InputArgument::REQUIRED, 'idPlugin'),
        );
    }
}
