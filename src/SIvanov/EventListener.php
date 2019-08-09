<?php


namespace SIvanov;


use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\block\Chest;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\level\particle\DestroyBlockParticle;
use pocketmine\math\Vector3;

class EventListener implements Listener
{

    public $plugin;

    public function __construct(ChestItems $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onInteract(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $block = $event->getBlock();

        if ($block instanceof Chest) {
            $event->setCancelled(true);
            $tile = $player->getLevel()->getTile($block->asVector3());

            foreach ($tile->getInventory()->getContents() as $item) {
                $player->getLevel()->setBlock($block->asVector3(), Block::get(0));

                $player->getLevel()->dropItem($block->asVector3(), $item);

                $particle = new DestroyBlockParticle($block->asVector3(), BlockFactory::get(Block::CHEST));
                $player->getLevel()->addParticle($particle);
            }
        }
    }
}