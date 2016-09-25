<?php 
$I = new ApiTester($scenario);
$I->wantTo('Test the toggle Auto Button and stops it after a while');

$I->amOnPage('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->wait(16);
$I->switchToIFrame('gameFrame');
//$I->click(['class' => 'container']);
$I->click(['class' => 'volume-btn']); //mutes the game
$I->seeInSource('<div class="icon-main icon-volume volume-btn toggle active">');
$I->wait(2);

//configure the auto and start it
$I->click(['class' => 'toggle']);
$I->click(['class' => 'show-more']);
$I->click(['class' => 'start']);

//Sees in there is number of spins left to assure that it is in auto mode
$I->seeInSource('<b class="num-spins">(');

$I->wait(10);
//stop the auto button
$I->click(['class' => 'toggle']);

//see that there is no spins to auto spin
$I->seeInSource('<b class="num-spins"></b>');
$I->wait(3);
//click pays
$I->click(['class' => 'pays']);
//see if the bot reached the lobby
$I->seeInSource('spin-btn global-disabled');
$I->seeInSource('stake-up global-disabled');
$I->seeInSource('stake-down global-disabled');
$I->wait(3);
