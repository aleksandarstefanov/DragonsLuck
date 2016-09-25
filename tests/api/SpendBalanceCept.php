<?php 
$I = new ApiTester($scenario);
$I->wantTo('Bet more than I have!!!');

$I->amOnPage('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->wait(16);
$I->switchToIFrame('gameFrame');
//$I->click(['class' => 'container']);
$I->click(['class' => 'volume-btn']); //mutes the game
$I->seeInSource('<div class="icon-main icon-volume volume-btn toggle active">');
$I->wait(3);

//set the total stake to max (500)
for ($iterator = 0; $iterator < 13; $iterator ++){
    $I->click(['class' => 'stake-up']);
    $I->wait(0.5);
}
$I->see('£500.00');
$I->wait(3);

//spin three times
$I->click(['class' => 'spin-btn']);
$I->wait(6);
$I->click(['class' => 'spin-btn']);
$I->wait(6);
$I->click(['class' => 'spin-btn']);
$I->wait(3);

//assert that the error message appears
$I->seeInSource('Your free session is over, please switch to real money play!');
$I->wait(2);

//$I->click(['xpath'=>"//button[contains(@class,'ok')]"]);
//$I->click(['class' => 'btn-primary']);
//todo: find a way to press the close button


//$I->seeInSource('Your free session is over, please switch to real money play!');
$I->click(['class' => 'btn.bf-button-yellow.btn-primary']);
$I->wait(3);
$I->click(['class' => 'pays']);

//see if the bot reached the lobby
$I->seeInSource('spin-btn global-disabled');
$I->seeInSource('stake-up global-disabled');
$I->seeInSource('stake-down global-disabled');