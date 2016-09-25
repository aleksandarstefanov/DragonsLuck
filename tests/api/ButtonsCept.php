<?php 
$I = new ApiTester($scenario);
$I->wantTo('Test if all the Buttons work');

$I->amOnPage('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->wait(16);
$I->switchToIFrame('gameFrame');
//$I->click(['class' => 'container']);
$I->click(['class' => 'volume-btn']); //mutes the game
$I->seeInSource('<div class="icon-main icon-volume volume-btn toggle active">');
//tests stake-up button
$I->click(['class' => 'stake-up']);
$I->see('£4.00');
$I->wait(1);
//tests stake-down button
$I->click(['class' => 'stake-down']);
$I->see('£2.00');
$I->wait(1);
//tests help button and see if the help text appears
$I->click(['class' => 'help-btn']);
$I->see('SPECIAL SYMBOLS AND FEATURES');
$I->wait(1);
//close help and assert that the help text isn't visible any more
$I->click(['class' => 'close-trigger']);
$I->wait(2);
$I->dontSee('SPECIAL SYMBOLS AND FEATURES');
$I->wait(1);
//tests auto button and assert that the Autoplay menu appears
$I->click(['class' => 'toggle']);
$I->see('AUTOPLAY');
$I->wait(1);
//closes auto menu
$I->click(['class' => 'close-trigger']);
$I->wait(2);
$I->dontSee('AUTOPLAY');
$I->wait(1);
//tests pay button
$I->click(['class' => 'pays']);
$I->wait(5);