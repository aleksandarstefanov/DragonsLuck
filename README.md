# Dragon's Luck


### Before start

Dragon's Luck tests are based on Codeception with configured WebDriver module. WebDriver requires Selenium server running, to be able to execute tests in a browser environment.

#### 1: Start Selenium server
The selenium server is included in the project. To start it use the following command in the project's root folder:

```bash
java -jar selenium-server-standalone-2.53.0.jar -port 4445
```
In some systems Selenium's server default port 4444 is taken, so in that case the custom port 4445 is selected. WebDriver module is also configured to listen on port 4445 in the api.suite.yml configuration file.

Note:
The WebDriver module is configred to execute testis in Chrome. To run tests in Chrome, it requires chromedriver which is also included in the project (in the root folder).

#### 2: Executing tests

Tests are located in tests/api folder. To execute a test, use the following command in terminal in the projects root folder:

```bash
php vendor/bin/codecept run api TestName.php
```

Note:
Use one of the "--steps" or "-vv" suffixes for better tracking the test requests and responses.

example:

```bash
php vendor/bin/codecept run api TestName.php --steps
```

#### 3: Test Cases:

|Test|Purpose|Test Pattern|
|:---|:------|:----------|
|AvailabilityCept|Checks if the right http methods are available|Assert that only the GET http method is available. It sends all other CRUD methods and checks if the page responds with "Method Not Allowed" (return http code 405)|
|ButtonsCept|Checks if all the buttons work|Checks if all the buttons in the game are working properly. The test clicks on all of them and sees if they respond.|
|GeneralGameCept|Simulates the general game flow|General game test simulates the basic game flow actions - loads the game page, checks if the stake rises at the right steps to 500, gets back to 10 pounds then spins the wheel five times then clicks the pays button and checks if it is currently in the lobby|
|ResponsiveCept|Checks if the game is responsive|Resizes the browser window and checks if the buttons are rearranged.|
|SpendBalanceCept|Spends all the balance and quits|Test raises the stake to the maximum 500 pounds and spins in several times till the ballance isn't enough for another spin and checks if the error dialog window appears.|
|ToggleAutoCept|Starts the autoplay mode, waits, then stops it and clicks pay|Checks if the game's auto mode is working. It activates it, waits for a several spins then stops it and clicks pay.|

Note: There is 16 seconds delay after requesting the game page, so the game will have enough time to load.

Note2: Every test, except the "AvailabilityCept" mutes the game after it is 
loaded.

Note3: In tests/_output are collected the response bodies and screenshots for the last fail for every test.