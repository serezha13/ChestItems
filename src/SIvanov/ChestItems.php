<?php

namespace SIvanov;

Class ChestItems extends PluginBase
{

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
}