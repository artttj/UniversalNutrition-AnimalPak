*** Settings ***
Documentation     Test Search Test Cases
Resource          ../../common/common.robot
Resource          ../../resources/search_keywords.robot
Test Setup        Open Browser  ${url}  ${browser}
Test Teardown     Close All Browsers
Suite Setup       Set Variables For Site


*** Test Cases ***
Search Results Page- Display
    [Tags]  search_results
    [Documentation]  To verify the display and functionality of the search results page
    Check Search Page Functionality
