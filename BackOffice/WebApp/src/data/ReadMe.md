### Data Fields / Table Headers

#### GENERAL PROPERTIES
***
- **field** (string)
    -- Must Correspond to the field name from the graphql schema
- **title** (string)
    -- Name of field to display
- **varType** (string)
    -- Must Correspond to the variable type from gthe graphql schema
    -- Add "!" if required for mutation (forms)
- **isRequired** (bool)
    -- If true, the field will be added to the gql query
    -- Default: false

#### TABLE PROPERTIES
***
- **type** (string)
    -- How the field's value will be displayed on the table listing
    -- Acceptable values:
    - text (default)
    - link - Requires 'link' and 'params' properties
    - boolean - 
        -- Shown as an icon
        -- Requires 'boolOptions' property
    - action
        -- Shown as an icon with a link
        -- 'field' must be empty
        -- Requires 'actions' array of object property
        * An object must include { title, link, params } properties
    - status
        -- Shown as a text with a background color corresponding to the status
    - currency
    - Other: lookup
- **sortable** (bool)
    -- Default: true
    -- If false, field will not be sortable
- **boolOptions** (array of string)
    -- Accepts ‘True/False’ or ‘Active/Inactive’
- **link** (string)
    -- Required if **type** is set to link
- **params** (array)
    -- Required if **type** is set to link, 
    -- Array values must correspond to graphql schema fields

#### FORM / SEARCH PROPERTIES
***
- **searchType** (string)
    -- Type of input field to output <input type="*" />
    -- Accepted values:
    - text (default, if not defined)
    - number
    - select
    - checkbox
    - date
    -- Optionally, requires 'searchModeAsync' field
- **searchOptions** (array of name/value objects)
- **searchOptionKey** (string)
    - The name of field to show as the select option's label
    - Optional, if searchOptions is an enum type.
- **searchModeAsync** (bool)
- **form** (object)
    - **defaultValue** (string)
    - **readOnly** (object)
        - **add** (bool | string)
        - **edit** (bool | string)
        -- Default: false
        -- If string, this will translated as an executable function
- Additional props for Search Filter Component
    - **searchExpression** (string)
        - Values: CONTAINS (default), EQUALS, IN-BETWEEN, etc...

#### VISIBILITY PROPERTIES
***
- **hidden** (object)
    - **searchFieldSelection** (bool) - If true, field will be hidden from list of possible search fields
    - **tableColumnSelection** (bool) - If true, field will be hidden from list of possible table columns
    - **list** (bool) - If true, field will not displayed on the table listing
    - **detail** (bool) - If true, field will not displayed on the detail view page
    - **form** (object)
        - **search** (bool) - If true, field will not displayed as a search field
        - **add** (bool) - If true, field will not displayed on the add form page
        - **edit** (bool) - If true, field will not displayed on the edit form page

#### DEPRECATED PROPERTIES
****
- **shouldMap**, **mapTo**
- **showDefault**, **showFormDefault**, **showSearchDefault**