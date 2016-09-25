<?php 

$I = new ApiTester($scenario);
$I->wantTo('The General Game Flow');

$I->amOnPage('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->wait(16);
//$I->click(['class' => 'container']);
$I->switchToIFrame('gameFrame');
$I->click(['class' => 'volume-btn']); //mutes the game
$I->seeInSource('<div class="icon-main icon-volume volume-btn toggle active">');
$I->wait(7);

//see that the bet equals 2 in the beginning
$I->see('£2.00');

//rise the stake to the maximum 500 pounds to assert that the rise steps are right
$I->click(['class' => 'stake-up']);
$I->see('£4.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£6.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£8.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£10.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£20.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£40.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£60.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£80.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£100.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£200.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£300.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£400.00');
$I->wait(0.5);
$I->click(['class' => 'stake-up']);
$I->see('£500.00');
$I->wait(0.5);

//get back to 10 pounds
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->click(['class' => 'stake-down']);
$I->wait(0.2);
$I->see('£10.00');

//spins five times (or less if there are prices)
$I->click(['class' => 'spin-btn']);
$I->wait(3);
$I->click(['class' => 'spin-btn']);
$I->wait(3);
$I->click(['class' => 'spin-btn']);
$I->wait(3);
$I->click(['class' => 'spin-btn']);
$I->wait(3);
$I->click(['class' => 'spin-btn']);
$I->wait(15);

//click pays
$I->click(['class' => 'pays']);
$I->wait(3);
//see if the bottom buttons are disabled (which should assert that the test is currently passing trough the lobby)

$I->seeInSource('spin-btn global-disabled');
$I->seeInSource('stake-up global-disabled');
$I->seeInSource('stake-down global-disabled');
//ends
$I->wait(3);
