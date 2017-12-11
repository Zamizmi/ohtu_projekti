Feature: User can log in with valid username/password-combination

    Scenario: user can register with correct password
       Given signup is pressed
       When  username "matti" and password "tatti1" are entered
       Then  system will respond with success

    Scenario: user can login with correct password
      Given kirjaudu sisaan is pressed
      When  username "matti" and password "tatti1" are entered
      Then  system will respond with success

    Scenario: user can add and delete kirja
      Given lisaa lukuvinkki is pressed
      When  kirja is selected
      When  correct kirja params submitted
      When  poista is pressed
      Then  system will respond with success

    Scenario: user can add and delete podcast
      Given lisaa lukuvinkki is pressed
      When  podcast is selected
      When  correct podcast params submitted
      When  poista is pressed
      Then  system will respond with success

    Scenario: user can add and delete blogpost
      Given lisaa lukuvinkki is pressed
      When  blogpost is selected
      When  correct blogpost params submitted
      When  poista is pressed
      Then  system will respond with success

    Scenario: user can add and delete video
      Given lisaa lukuvinkki is pressed
      When  video is selected
      When  correct video params submitted
      When  poista is pressed
      Then  system will respond with success
