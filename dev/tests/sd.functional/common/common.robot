*** Settings ***
Documentation     Common Keywords
Resource          ../resources/site_variables.robot
Resource          ../resources/environments/bryantpark_us_staging_variables.robot
Library           Selenium2Library
Library           ../custom_libraries/CSVLibrary.py


########### Common Site Section Keywords ###########
*** Keywords ***
Open The Browser
    [Documentation]  To open the headless browser
    ${browse}=  Get Variable Value  ${HEADLESS}  Chrome
    Run Keyword If  '${browse}'=='headless'  Run Tests on Headless Mode
    ...  ELSE  Open Browse Page
    Maximize Browser Window

Open Browse Page
    [Documentation]  To open the browser in regular view
    Open Browser  ${url}  ${browser}  options=add_argument("--ignore-certificate-errors")

Close The Browser
    [Documentation]  To close the broswer
    Close Browser

Run Tests on Headless Mode
    [Documentation]  Keyword to run the tests in Headless Mode (without see the windows)
    ${chrome_options}=  Evaluate  sys.modules['selenium.webdriver'].ChromeOptions()  sys, selenium.webdriver
    Call Method  ${chrome_options}  add_argument  --disable-extensions
    Call Method  ${chrome_options}  add_argument  --start-maximized
    Call Method  ${chrome_options}  add_argument  --no-sandbox
    Call Method  ${chrome_options}  add_argument  --headless
    Call Method  ${chrome_options}  add_argument  --disable-dev-shm-usage
    Call Method  ${chrome_options}  add_argument  --ignore-certificate-errors
    Create Webdriver  Chrome  chrome_options=${chrome_options}
    Set Window Size  1920  1080
    Go To  ${url}

Wait Until Element Is Visible And Enabled
    [Documentation]  Keyword to wait until element is visible and enabled in the page.
    [Arguments]  ${element}
    Wait Until Element Is Enabled  ${element}  timeout=${timeout_time}
    Wait Until Element Is Visible  ${element}  timeout=${timeout_time}
