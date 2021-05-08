<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Plugins;

class deletePluginCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deletePluginCommand {idPlugin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting plugin.';

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
        Log::debug("TEST: " . __FUNCTION__ . " idPlugin = " . $idPlugin);

        $Plugin = new Plugins();
        $pluginData = $Plugin->getDeleteCommandPlugin($idPlugin);
        $pluginData = $pluginData[0];

        $namePlugin = $pluginData['name'];

        shell_exec( $pluginData['deleteComand'] . " 2>/dev/null &");     
        shell_exec( "./deletePlugin.sh $namePlugin 2>&1");
        
        $Plugin->setStatusPlugin($idPlugin, $Plugin::STATUS_NON_INSTALL);

        return 0;
    }

    protected function getArguments()
    {
        return array(
            array('idPlugin', InputArgument::REQUIRED, 'idPlugin'),
        );
    }
}
