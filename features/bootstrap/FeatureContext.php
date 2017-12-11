<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

require_once 'vendor/autoload.php';
require_once 'Tests/SelTest.php';
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends PHPUnit_Framework_TestCase implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        global $myTest;
        $myTest = new WebTest();
        $myTest->setUp();
    }

    /**
      * @Given /signup is pressed/
      */
    public function signUpIsPressed()
    {
        global $myTest;
        $myTest->buttonIsPressed('signup');
    }

    /**
      * @Given /kirjaudu sisaan is pressed/
      */
    public function kirjauduSisaanIsPressed()
    {
        global $myTest;
        $myTest->buttonIsPressed('login');
    }

    /**
      * @When /username "([^"]+)" and password "([^"]+)" are entered/
      */
    public function usernameAndPassword($username, $password)
    {
        global $myTest;
        $myTest->usernameAndPasswordAreEntered($username, $password);
    }

    /**
      * @Then /system will respond with success/
      */
    public function systemWillRespond()
    {
        global $myTest;
        $myTest->registrationSuccessful();
        $myTest->tearDown();
    }

    /**
      * @Given /lisaa lukuvinkki is pressed/
      */
    public function lisaaLukuvinkkiIsPressed()
    {
        global $myTest;
        $myTest->buttonIsPressed('lisaa');
    }

    /**
      * @When /poista is pressed/
      */
    public function poistaIsPressed()
    {
        global $myTest;
        $myTest->poistaIsPressed();
    }

    /**
      * @When /kirja is selected/
      */
    public function kirjaIsSelected()
    {
        global $myTest;
        $myTest->kirjaIsSelected();
    }

    /**
      * @When /podcast is selected/
      */
    public function podcastIsSelected()
    {
        global $myTest;
        $myTest->podcastIsSelected();
    }

    /**
      * @When /blogpost is selected/
      */
    public function blogpostIsSelected()
    {
        global $myTest;
        $myTest->blogpostIsSelected();
    }

    /**
      * @When /video is selected/
      */
    public function videoIsSelected()
    {
        global $myTest;
        $myTest->videoIsSelected();
    }

    /**
      * @When /correct blogpost params submitted/
      */
    public function correctParamsSubmittedBlogpost()
    {
        global $myTest;
        $myTest->correctParamsPodcast();
    }

    /**
      * @When /correct video params submitted/
      */
    public function correctParamsSubmittedVideo()
    {
        global $myTest;
        $myTest->correctParamsVideo();
    }

    /**
      * @When /correct kirja params submitted/
      */
    public function correctParamsSubmittedKirja()
    {
        global $myTest;
        $myTest->correctParamsKirja();
    }

    /**
      * @When /correct podcast params submitted/
      */
    public function correctParamsSubmittedPodcast()
    {
        global $myTest;
        $myTest->correctParamsPodcast();
    }
}
