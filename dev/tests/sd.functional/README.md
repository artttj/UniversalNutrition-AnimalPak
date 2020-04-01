# Accelerator Automated Tests with Robot Framework

## Directories and structure organization

```sh
functional
├── common
├── custom_libraries
├── resources
│   └── environments
├── suites
│   └── (suite_same)
```

| Directory | Description |
| ------ | ------ |
| functional | Hold the test automation tests project. |
| functional/common | Hold the shared keywords/utility functions. |
| functional/custom_libraries | Hold custom libraries created or updated by the automated test developer. |
| functional/resources | Hold the .robot files where are located then environment directory and custom keywords used across the suites. |
| functional/resources/environments | Hold files where are located all the variables according to the environment and the zone. |
| functional/suites | Hold the directory for each suite. |
| functional/suites/(suite_name) | Hold the test cases for the suite |

## Useful information about the environments
The directory `functional/resources/environments` is a directory created to use specific variables according to the environment to test.

To execute the automated tests in an environment as `https://mercury-w5u2nga-2nbjk2f32jkxo.us-4.magentosite.cloud`, it's needed to create a structure like:

| Directory | Description |
| ------ | ------ |
| functional/resources/environments/accelerator_bp_staging_variables.robot | Hold specific variables for **Bryant Park Stag**. The naming convention for a variable file is as follows {{sitecode}}_{{zonecode}}_{{environment}}_variables.robot |
| functional/resources/site_variables.robot | Hold the keyword **Set Variables For Site**, where we need to add the next condition: `Run Keyword If  "${site}" == "bp_staging"  Set Variables For Bryant Park Accelerator`. The naming convention for that entry is `Run Keyword If  "${site}" == "{{zonecode}}_{{environment}}"  Set Variables For ZONECODE ENVIRONMENT` |

## Installation:
- Download [Python 3](https://www.python.org/ftp/python/3.8.0/python-3.8.0-macosx10.9.pkg)
- If you already have Python with [pip](http://pip-installer.org) installed, you can simply run:

```sh
pip3 install robotframework
pip3 install robotframework-debuglibrary
pip3 install robotframework-requests
pip3 install robotframework-selenium2library
pip3 install robotframework-seleniumlibrary
```

- Install [X-code](https://apps.apple.com/us/app/xcode/id497799835) (Optional- Just install this if you do not already have it on your local).
```sh
ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```

- Install Web drivers (Chrome and Gecko):
```sh
brew cask install chromedriver
brew install geckodriver
```

## Run the Automated tests locally:
- Clone the repo.

```sh
robot  -d results  -v browser:Chrome  -v site:bp_staging  -i search_results  suites/
```

The `-d` is a robot flag to specify where you want to have the test report file.

The `-v browser:(browser)` is optional but gives the option to pass the browser where the user wants the test running without to change it manually in the source code.

The `-v site:(zone_environment)` is a flag used to specify what zone+environment will be tested. This is mandatory, if the user does not specifies what zone (zone code + environment) will be tested, all tests will fail. The ``sd.functional/resources/site_variables.robot`` has all the flags needed according to the zone and environment.

The `-i` is a robot flag which will include all the tests that have the tags of the argument. In this case, we are using a python syntax to get all the tests that have **search_results** tag declared on the test-scenario. You can use all the flags of the robot command-line.

## Run the Automated tests using Docker:
- Install [Docker](https://download.docker.com/mac/stable/Docker.dmg) (Optional- Just install this if you do not already have it on your local).
- There is a script on this root folder called `run.sh` that builds an image and starts a container that runs the automated tests.

```sh
./run.sh --site bp_staging  --headless  -i search_results
```

The `-i` is a robot flag which will include all the tests that have the tags of the argument. In this case, we are using a python syntax to get all the tests that have **search_results** tag declared on the test-scenario. You can use all the flags of the robot command-line.
