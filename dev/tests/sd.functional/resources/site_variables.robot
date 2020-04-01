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
    Run Keyword If  "${site}" == "bp_staging"  Set Variables For Bryant Park Staging
