*** Settings ***
Documentation     Common Keywords
Resource          ../resources/site_variables.robot
Resource          ../resources/environments/accelerator_bp_prod_variables.robot
Library           Selenium2Library


########### Common Site Section Keywords ###########
*** Keywords ***
Wait Until Element Is Visible And Enabled
    [Documentation]  Keyword to wait until element is visible and enabled in the page.
    [Arguments]  ${element}
    Wait Until Element Is Enabled  ${element}  timeout=${timeout_time}
    Wait Until Element Is Visible  ${element}  timeout=${timeout_time}
