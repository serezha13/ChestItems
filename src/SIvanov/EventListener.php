<?php


namespace SIvanov;


use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\block\Chest;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\Item;
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

            $player->getLevel()->setBlock($block->asVector3(), Block::get(0));

            $weapon = array(256, 257, 258, 261, 267, 268, 269, 270, 271, 272, 273, 274, 275, 276, 277, 278, 279);
            $items = array(320, 340, 360, 264, 265, 266, 332, 352);
            $throwable = array(262, 332, 344);
            $blocks = array(1, 4, 5, 46, 35, 45, 98, 24);
            $armor = array(298, 299, 300, 301, 302, 303, 304, 305, 306, 307, 308, 309, 310, 311, 312, 313, 314, 315, 316, 317);

            $player->getLevel()->dropItem($block->asVector3(), Item::get($weapon[array_rand($weapon)], 0, 1));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($items[array_rand($items)], 0, mt_rand(1, 5)));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($items[array_rand($items)], 0, mt_rand(1, 5)));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($items[array_rand($items)], 0, mt_rand(1, 5)));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($throwable[array_rand($throwable)], 0, mt_rand(8, 16)));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($throwable[array_rand($throwable)], 0, mt_rand(8, 16)));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($blocks[array_rand($blocks)], 0, mt_rand(16, 32)));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($blocks[array_rand($blocks)], 0, mt_rand(16, 32)));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($armor[array_rand($armor)], 0, 1));
            $player->getLevel()->dropItem($block->asVector3(), Item::get($armor[array_rand($armor)], 0, 1));

            $particle = new DestroyBlockParticle($block->asVector3(), BlockFactory::get(Block::CHEST));
            $player->getLevel()->addParticle($particle);
        }
    }
}