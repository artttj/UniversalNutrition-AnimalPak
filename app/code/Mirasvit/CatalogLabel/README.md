# How to add Badges to Products

## Product Data

- Pick an attribute you want to use to determine whether
a badge is displayed for a product or not.
    - It must be a dropdown or multi select attribute
    - For consistency, we should use the `badge` attribute.
- Ensure that the attribute you chose is set for all products
that should have badges

## Placeholder

- In the admin, go to Marketing > Promotions > Product Labels. 
- In the "Manage Labels" dropdown, select "Manage Placeholders"
- To create a label, a placeholder is needed. If there aren't placeholders
you'll need to create a new one.
- Click "Add New"
- Fill out the fields. For more info, visit 
[this page](https://mirasvit.com/docs/module-cataloglabel/current/p)
- Save the placeholder

## Label

- Go to "Manage Labels" from the dropdown
- Click "Add New"
- Fill out the fields. For more info, visit 
   [this page](https://mirasvit.com/docs/module-cataloglabel/current/p)
    - Choose "Attribute" as the "Relation Type"
- Click "Continue"
- Fill out the fields under "General Information". For more info, visit 
   [this page](https://mirasvit.com/docs/module-cataloglabel/current/p)
    - Make sure to select the proper customer groups
    (use all groups for most purposes)
- Click "Save and Continue Edit"
- Go to the "Gallery" tab on the sidebar
- There should be a row for each option in the attribute you picked.
This is where you determine the content for the badge.
    - For a simple badge, just set the title
- Flush the Magento cache