<?php 
$I = new ApiTester($scenario);
$I->wantTo('If the window is responsive');

$I->amOnPage('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->wait(16);
$I->switchToIFrame('gameFrame');
//$I->click(['class' => 'container']);
$I->click(['class' => 'volume-btn']); //mutes the game
$I->seeInSource('<div class="icon-main icon-volume volume-btn toggle active">');
$I->wait(3);

$I->seeInSource('class="btn pays"');
$I->seeInSource('class="btn toggle auto"');
//resize the game and check if the buttons are rearranged
$I->resizeWindow(200,700);
$I->seeInSource('class="btn responsive-column first pays"');
$I->seeInSource('class="btn responsive-column first toggle auto"');
$I->wait(3);
$I->resizeWindow(700,400);
$I->seeInSource('class="btn responsive-column first pays"');
$I->seeInSource('class="btn responsive-column first toggle auto"');
$I->wait(3);
