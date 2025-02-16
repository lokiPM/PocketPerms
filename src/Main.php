<?php

declare(strict_types=1);

namespace lokiPM\PocketPerms;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use jojoe77777\FormAPI\CustomForm;

class Main extends PluginBase {

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getName() === "pp") {
            if (!$sender->hasPermission("pocketperms.*")) {
                $sender->sendMessage(TextFormat::RED . "You do not have permission to execute this command.");
                return false;
            }

            $this->showCustomForm($sender);
            return true;
        }
        return false;
    }

    public function showCustomForm($player): void {
        $form = new CustomForm(function ($player, $data) {
            // Handle form submission here (optional)
        });

        $form->setTitle("PocketPerms Admin");
        $form->addLabel("Soon");

        $form->sendToPlayer($player);
    }
}
