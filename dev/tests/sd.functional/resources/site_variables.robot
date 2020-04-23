# Common variables across the sites
*** Variables ***
# Core Variables
${site}            ""
${base_url}        ""
${url}             ""
${browser}         Chrome
${delay}           3s
${timeout_time}    6s
${main_content}    css=.page-wrapper
${header_search}   css=.field.search .input-text
${search_button}   css=#search_mini_form button
${search_results}  css=.products.wrapper.grid.products-grid ol


# Data Variables
${search_text}     ""


*** Keywords ***
Set Variables For Site
    [Documentation]  To set variables that have different values in specific sites
    Log to console   Using Base URL ${base_url}
    Run Keyword If  "${site}" == "bp_staging"  Set Variables For Bryant Park Staging
    Run Keyword If  "${site}" == "cli"  Set CLI Variables
                
    
Set CLI Variables
    [Documentation]  Set variables to the CLI parameters
    Log to console   Using Base URL ${base_url}
    Set Suite Variable  ${url}          ${base_url}
    