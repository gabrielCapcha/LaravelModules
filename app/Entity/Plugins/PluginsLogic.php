<?php
namespace App\Entity\Plugins;

use App\Models\Plugins;

class PluginsLogic
{
    #private functions
    #public functions

    public function getPluginsList($params = [])
    {
        $list = Plugins::select(Plugins::TABLE_NAME . '.*')
            ->whereNull(Plugins::TABLE_NAME . '.deleted_at')
            ->get();
        return $list;
    }
    public function deletePlugins($id)
    {
        $object = Plugins::find($id);
        $object->flag_active = Plugins::STATE_INACTIVE;
        $object->deleted_at = date("Y-m-d H:i:s");
        $object->save();
        return $object;
    }
}