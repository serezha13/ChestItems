<?php

namespace SIvanov;

use pocketmine\plugin\PluginBase;

Class ChestItems extends PluginBase
{

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getLogger()->info("Автор: vk.com/serezhaivanov14");
    }
}