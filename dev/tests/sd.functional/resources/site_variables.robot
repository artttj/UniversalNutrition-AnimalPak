# Common variables across the sites
*** Variables ***
# Main Variables
${site}                ""
${base_url}            ""
${url}                 ""
${browser}             Chrome
${delay}               3s
${timeout_time}        6s


# Search Variables
${main_content}        css=.page-wrapper
${header_search}       css=.field.search .input-text
${search_text}         ""
${search_button}       css=#search_mini_form button
${search_results}      css=.products.wrapper.grid.products-grid ol


*** Keywords ***
Set Variables For Site
    [Documentation]  To set variables that have different values in specific sites
    Run Keyword If  "${site}" == "bp_prod"  Set Variables For Bryant Park Accelerator
