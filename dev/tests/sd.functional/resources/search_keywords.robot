########### Common Search Section Keywords ###########
*** Keywords ***
Check Search Page Functionality
    [Documentation]  To check the search UI functionality
    Set Window Size  1280  1024
    Click Element  ${header_search}
    Input Text  ${header_search}  ${search_text}
    Click Element  ${search_button}
    ${isPresent}=  Run Keyword And Return Status  Page Should Contain Element  ${search_results}
    Pass Execution If  ${isPresent} == False  'Your search returned no results.'
    Wait Until Element Is Visible And Enabled  ${search_results}
    Page Should Contain  '${search_text}'
    Capture Page Screenshot
