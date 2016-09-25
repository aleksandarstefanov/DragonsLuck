<?php 
$I = new ApiTester($scenario);
$I->wantTo('Assert that the right http methods are allowed');
//Only the GET method should be allowed from the all the crud methods {GET, POST, PUT, PATCH, DELETE}

//The GET method should be allowed
$I->lookForwardTo('Assert that GET method is allowed');
$I->sendGET('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->seeResponseCodeIs(200);

//Assert that the POST method is not allowed
$I->lookForwardTo('Assert that POST method is NOT allowed');
$I->sendPOST('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true',['TestKey' => 'TestValue']);
$I->seeResponseCodeIs(405);

//Assert that the PUT method is not allowed
$I->lookForwardTo('Assert that PUT method is NOT allowed');
$I->sendPUT('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->seeResponseCodeIs(405);

//Assert that the PATCH method is not allowed
$I->lookForwardTo('Assert that PATCH method is NOT allowed');
$I->sendPATCH('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->seeResponseCodeIs(405);

//Assert that the DELETE method is not allowed
$I->lookForwardTo('Assert that DELETE method is NOT allowed');
$I->sendDELETE('/gcm/ob-gcm-launcher/launcher/launcher.html?gameName=Dopamine_DragonsLuck&channel=I&lang=en&playMode=demo&device=desktop&clientType=html5&skip=true');
$I->seeResponseCodeIs(405);