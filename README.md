DEV CHALLENGE
===============================

### Objective

This is a simple php project that print to console some data read from csv file.
Data read from csv are manipulating and simulate an exchange rate.
Given input param from command line data will be filtered.
Some unit tests try to coverage this small sample project.

### Launch program

To run the program first launch "composer install" and then "docker compose up" and then run to command line "php localhost 1" where 1 identified the params to filter customers

### Run tests

To run tests simply run from command line this command ./vendor/bin/phpunit --verbose tests from local machine or in the docker container.
