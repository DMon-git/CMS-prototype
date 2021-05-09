<?php

namespace App\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class Plugins extends Model
{

	protected $table = 'plugins';

	public const STATUS_INSTALL = 1;
	public const STATUS_NON_INSTALL = 0;

	public function getAllPlugins()
	{
        $columns = ['id', 'name', 'description', 'status'];


        $data = $this->select($columns)
                     ->get()
                     ->toArray();

        return $data;
	}

	public function getInstallCommandPlugin($idPlugin)
	{
        $columns = ['id', 'name', 'requireComand', 'sideFile'];


        $data = $this->select($columns)
        			 ->where('id', '=', $idPlugin)
                     ->get()
                     ->toArray();

        return $data;
	}

	public function getDeleteCommandPlugin($idPlugin)
	{
        $columns = ['id', 'name', 'deleteComand', 'sideFile'];


        $data = $this->select($columns)
        			 ->where('id', '=', $idPlugin)
                     ->get()
                     ->toArray();

        return $data;
	}

	public function setStatusPlugin($idPlugin, $status)
	{
		$result =  $this->where('id', '=', $idPlugin)
                        ->update([
                            'status'   => $status
                        ]);
        return $result;
	}
}
