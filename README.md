
# MilkstateJS Framework

Instructions on using the Milkstate.js Engine.

## About

Milkstate is a Single-page App(SPA) JavaScript Prototyping Engine.

Quickly prototype your applications with complete full-stack capabilities. Unlike other protoyping frameworks, Milkstake allows you to continue devloping on the prototype to turn it into a fully functional app.

### Prerequisites

Apache 2.4, PHP Version 5.5.34, MYSQL, Node, Bower

### Installing

- Copy and paste the contents of the unzipped milkstate folder to your applications directory.

- run npm install

- Open and configure .htaccess accordingly.

## VIEW CONTROL - JSON STRUCTURE

The following is the structure of the json file that controls the views of the entire app.

Located in /views/views.json. **View1** contains sections, **View2** contains sub sections.

```javascript
{
    "view1" : [
        {
            "view_link" : "/views/view_name.php", //link to where you get the post url data
            "url_data" : ["url_data_name", "url_data_name2"], //url data posted to view_link to get data
            "title" : "Name of Page", //meta title of view
            "description" : "Description of Page.", //meta description of view
            "sections" :[{ //sections within view if any
                "sectionOneName":[{
                    "content_data" : ["loadContentName","loadContentName",], //section data to load - returned html from function
                    "run_functions" : ["runFunctionName","runFunctionName2"] //functions to run after appended html
                }],
                "sectionTwoName":[{
                }]
            }],
            "error_link" : "/views/errors/view_error.html", //error if view item is not valid
            "error_section" : "/views/errors/section_error.html", //error if the section within view is not valid
            "landing_page" : "/views/view.php", //landing page of view if there is one
            "css" : ["/css/master.css","/css/fonts.css"], //css to load
            "js" : ["/js/main.js","/js/controls/menu.js"], //js files to preload
            "content_data" : ["loadContentName","loadContentName2"] //view data to load - returned html from function
        }
    ],
    "view2" : [
        {
            "view_link" : "/views/view_name.php", //link to where you get the post url data
            "url_data" : ["url_data_name", "url_data_name2"], //url data posted to view_link to get data
            "title" : "Name of Page", //meta title of view
            "description" : "Description of Page.", //meta description of view
            "sections" :[{ //sections within view if any
                "sectionOneName":[{
                    "content_data" : ["loadContentName","loadContentName",], //section data to load - returned html
                    "run_functions" : ["runFunctionName","runFunctionName2"] //functions to run after appended html
                }],
                "sectionTwoName":[{
                    "sub_sections" : [{ //sub sections if there is any
                        "subSectionName":[{
                            "content_data" : ["loadContentName"], //sub section data to load - returned html
                            "run_functions" : ["runFunctionName"] //functions to run after appended html from content_data
                        }],
                        "subSectionTwoName":[{
                            "content_data" : ["loadContentName"], //sub section data to load - returned html
                            "run_functions" : ["runFunctionName"] //functions to run after appended html from content_data
                        }]
                    }],
                    "content_data" : ["loadContentName"], //section data to load - returned html from function
                    "run_functions" : ["runFunctionName"] //functions to run after appended html - runs before but in sequence with sub section functions
                }]
            }],
            "error_link" : "/views/errors/view_error.html", //error if view item is not valid
            "error_section" : "/views/errors/section_error.html", //error if the section within view is not valid
            "landing_page" : "/views/view.php", //landing page of view if there is one, otherwise directed to error_link
            "css" : ["/css/master.css","/css/fonts.css"], //css to load
            "js" : ["/js/main.js","/js/controls/menu.js"], //js files to preload
            "content_data" : ["loadContentName","loadContentName2"] //view data to load - returned html from function
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

### PHP JSON OBJECT

The following is the php json object data needed to send back to the form.

```php
//settings - set to value 1 or 0. JavaScript does not read 'true' or 'false' from php.
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

Below is the structure required in using live values. This targets an id and sets the value for that specific item. You can have as many values as needed.

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

Any item defined with the class **"popup"** will instantiate an on click for it.

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
