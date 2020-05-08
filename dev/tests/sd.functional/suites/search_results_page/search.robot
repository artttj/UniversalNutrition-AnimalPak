*** Settings ***
Documentation     Test Search Test Cases
Resource          ../../common/common.robot
Resource          ../../resources/search_keywords.robot
Test Setup        Open The Browser
Test Teardown     Close The Browser
Suite Setup       Set Variables For Site


*** Test Cases ***
Search Bar- Display
    [Tags]  search_results
    [Documentation]  To verify the display of the Search Bar on Homepage
    Check Search Bar display
