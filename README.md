
# MilkstateJS Framework

Instructions on using the Milkstate.js Engine.

## About

Milkstate is a Single-page App(SPA) JavaScript Prototyping Engine.

Quickly prototype your applications with complete full-stack capabilities. Unlike other prototyping frameworks, Milkstate allows you to continue developing on the prototype to turn it into a fully functional app. The endpoints are in PHP by default, but can easily be changed.

The main goal of developing this framework was to provide a seemless user experience that avoids flickers and content loading blips like that of popular frameworks.

### Prerequisites

Apache 2.4, PHP Version 5.5.34, MYSQL, Node, Bower

### Installing

- Copy and paste the contents of the unzipped milkstate folder to your applications directory.

- run npm install

- Open and configure .htaccess accordingly.

## VIEW CONTROL - JSON STRUCTURE

The following is the structure of the json file that controls the views of the entire app. This is not a working example, it is only for reference.

Located in /views/views.json.

```javascript
{
    "views/view1" : [ //set your url route
        {
            "data_link" : "/api/view1-api", // can link to a php file or directly to the API
            "url_data" : ["url_data_name", "url_data_name2"], // specific header information posted to API if any
            "title" : "Name of Page", //meta title of view
            "description" : "Description of Page.", // meta description of view
            "sections" :[{ // create as many sections within sections as you wish
                "section-one":[{
                    "sections" :[{
                        "section-one-a":[{
                            "title" : "Name of section", // will override
                            "description" : "Description of section.", // will override previous sections
                            "js" : ["js/urfile.js"],
                            "content_data" : ["data1a"],
                            "run_functions" : ["functionNameToRun"] // functions to run after view is loaded - joined throughout
                        }],
                        "section-one-b":[{ // will override
                            "title" : "Name of section", // will override
                        }],
                    }],
                    "title" : "Section One Title", //meta
                    "description" : "Description of section.", //meta
                    "js" : ["js/contentData.js"], // js files to preload
                    "content_data" : ["data1"], // returned data from files
                    "run_functions" : [] // functions to run after view is loaded
                    }],
                "section-two":[{ // same as above
                    "js" : [],
                    "content_data" : [],
                    "run_functions" : []
                }]
            }],
            "data_error" : "templates/app.data_error.html", // error if data comes back false
            "error_section" : "templates/app.section_error.html", // error when view is invalid
            "css" : ["css/main.css"], // preload multiple css files
            "js" : ["js/file.js"], // preload multiple js files
            "template_data" : ["topMenu"], // content that is outside the view and consistent throughout the app
            "template_functions" : ["slideInMenu"], // functions to run on initial load
            "pre_section_data" :[{ // data to load before loading a section
                "pre_content_data" : ["pageHeader"], // content loaded before the view
                "content_data" : ["pageContent"], // content loaded in the view
                "post_content_data" : ["pageFooter"], // content loaded after the view
                "run_functions" : ["animateAll"], // functions to run after the view is loaded
                "post_run_functions" : [] // post secondary functions to run if needed
            }],
            "landing_page_data" :[{ // if set, this view will have a landing page.
                "pre_content_data" : [], // same as above
                "content_data" : [],
                "post_content_data" : [],
                "run_functions" : [],
                "post_run_functions" : []
            }]
        }
    ]
}
```

## FORMS

forms.js controls the forms on the application.

### FORM MARKUP

```html
<div class="form_area">
    <form form-data="data_val"><!-- pertaining data val -->
        <!-- input text-->
        <div id="data-group"><!-- errors get appended to this area -->
            <div class="input_row">
                <div class="input">
                    <input type="text" tabindex="1" placeholder="Data Name" name="this-data-name" class="ajax js_focus js_placeholder" data-form="this-form-name" data-name="this-data-name" data-error-target="#data-group">
                </div>
            </div>
        </div>
        <!-- submit -->
        <div class="form_controls">
            <span class="form_submit">
                <input type="submit" value="Add Video" class="ajax" data-form="this-form-name" data-url="/controls/" tabindex="2" data-name="submit">
            </span>
        </div>
    </div>
</div>
```

#### Form Scripts

The following are classes that can be added to an input.

**ajax** - required for forms to iterate over and get the value from. Must also be on the form submit button.

**js_focus** - adds 'focus' class to parent input div.

**js_placeholder** - takes the data from placeholder value and removes it to add as a label as the sibling of the input. 

### FORM STYLING

Located in /css/popup.less

### DATA OBJECT

The following are the data object variables available to send through the forms.

```php
//settings - set to value 1 or 0. Do not use true or false;
$data['success'] = 1;
$data['live_update'] = 1; //REQUIRES: 'success'
$data['remove_popup'] = 1; //remove popup if exists
$data['update_content'] = 1; //REQUIRES: 'live_update'
$data['update_amount'] = 1; //REQUIRES: 'live_update'
$data['update_title'] = 1; //REQUIRES: 'live_update'
$data['live_remove'] = 0; //REQUIRES: 'live_update'
$data['clear_content'] = 0; //clears content of live target id

//content
$data['update_txt'] = "Content has been added."; //REQUIRES: 'success' - Will show without 'live_update'.
$data['live_pre_data']  = "<div></div>";
$data['live_data'] = "<div></div>";
$data['live_data_amount'] = $data_amount; //current amount of data after insertion
$data['empty_content'] = "<p class='no_content'>No videos.</div>"; //REQUIRES: 'success' - Will show without 
$data['live_remove_id'] = $video_id; // REQUIRES: 'live_remove'

//id's
$data['live_content_id'] = "scene_content"; // content area id - REQUIRES: 'update_content'
$data['live_target_id'] = "case_content"; // id to place live data - REQUIRES: 'update_content'
$data['live_amount_id'] = "scene_count"; // id where amount takes place - REQUIRES: 'update_amount'
$data['live_title_id'] = "scene_title"; // id where title takes place - REQUIRES: 'update_title'

//live values
$data['live_values'] = null; //see below for details

//scripts to run
//
//cases.js
$data['cases'] = 1;
$data['case_target'] = "videos_case";
$data['case_width'] = 222;
$data['case_height'] = 124;

//iscroll
$data['main_iscroll'] = 1; //reinstate main content iscroll

//jcrop
$data['jcrop'] = 0;
$data['jcrop_id'] = "jcrop-img-id";
$data['jcrop_width'] = 0;
$data['jcrop_height'] = 0;
$data['jcrop_ratio_w'] = 0;
$data['jcrop_ratio_h'] = 0;

```

#### Live Values

Below is the variable structure required in using live values. This targets an id and sets the value for that specific item. You can have as many values as needed.

```
//live values
$live_values = array();

//set value
$live_values['id'] = "bg-img-src";
$live_values['value'] = $path2;
$data_live_values[] = $live_values;

//set second value
$live_values['id'] = "bg-img-src";
$live_values['value'] = $path2;
$data_live_values[] = $live_values;
```

## POPUPS (AKA MODALS)

Located in /js/popups.js.

### USING POPUPS

Any item defined with the class **"popup"** will instantiate an onclick for it.

The following are attributes involved. No order is required, and of course it must be on the same item where the popup is defined.

| Attribute          | Description                                        | Required      | Post Data     | Default       |
| ------------------ |:--------------------------------------------------:|:-------------:| -------------:| -------------:|
| data-popup-id      | `ID of pertaining item.`                           | N             |      data_val |          null |
| data-popup-res     | `Addition ID(resource) of pertaining item.`        | N             |      data_res |          null |
| data-popup-title   | `Title of popup.`                                  | N             |               |          null |
| data-popup-size    | `Size of the popup.`                               | N             |               |         large |
| data-popup-toggle  | `Initiate whether popup is in toggle mode.`        | N             |               |          null |
| data-popup-fixed   | `Popup becomes fixed width with inner scrolling.`  | N             |               |          null |

#### What is toggle mode?

Toggle mode adds two toggle buttons to the top that only appear at a certain resolution. It adds major mobility function to two columned popup content. It requires **"data-popup-fixed"** to function properly on all devices.

##### Toggle Markup

The following is the markup you will need to add within the popup view for toggling.

```html
<div class="pop_toggle_header">
    <div><a href="#" class="pop_toggle selected toggle" data-toggle="1">Option 1</a></div>
    <div><a href="#" class="pop_toggle toggle" data-toggle="2">Option 2</a></div>
</div>
<div class="pop_content toggle_container" id="pop-content">
    <div class="toggle_box active toggle_1">
        <div class="scroll_wrap pop_scroll" id="pop-scroll">
            <div class="scroll_content">
                Content in here will be scrolled
            </div>
        </div>
    </div>
    <div class="toggle_box toggle_2">
        <div class="scroll_wrap pop_scroll" id="pop-scroll2">
            <div class="scroll_content">
                Content in here will be scrolled
            </div>
        </div>
    </div>
</div>
```

### POPUP IMAGE PRELOADING

Just as the main view loader does, all images should be preloaded because the UI framework is highly depended on iscroll.

To do this, you need to add the attribute **"data-pre-img"** with the url of the image on any item. In most cases you will only be adding this to the img tag and be using the same src url.

### POPUP STYLING

Located in /css/popup.less.

## PUSH

push.js is a script that sends data with one click. It can be tied into groups or done singular(i.e. 'follow' button).

Located in /js/push.js.

##### PUSH MARKUP

```html
<div class="push" data-push-url="/controls/push-item" data-push-form="form_name">
    <button class="push_item" name="item_name" data-push-form="form_name" data-push-name="item_name" data-push-id="1" data-push-res="1">Item 1</button>
</div>
```
