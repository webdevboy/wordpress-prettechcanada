<?php
vc_map(array(
    "name" => 'Google Map V3',
    "base" => "cs-extra-map",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', THEMENAME),
    "description" => __('Map API V3 Unlimited Style', THEMENAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('Title', THEMENAME),
            "param_name" => "title",
            "description" => __('Title of Map', THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Heading size", THEMENAME),
            "param_name" => "heading_size",
            "value" => array(
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6"
            ),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Title Color', THEMENAME),
            "param_name" => "title_color",
            "description" => ''
        ),
        array(
            "type" => "textfield",
            "heading" => __('API Key', THEMENAME),
            "param_name" => "api",
            "value" => '',
            "description" => __('Enter you api key of map, get key from (https://console.developers.google.com)', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Address', THEMENAME),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => __('Enter address of Map', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Coordinate', THEMENAME),
            "param_name" => "coordinate",
            "value" => '',
            "description" => __('Enter coordinate of Map, format input (latitude, longitude)', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Click Show Info window', THEMENAME),
            "param_name" => "infoclick",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('Click a marker and show info window (Default Show).', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Coordinate', THEMENAME),
            "param_name" => "markercoordinate",
            "value" => '',
            "description" => __('Enter marker coordinate of Map, format input (latitude, longitude)', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Title', THEMENAME),
            "param_name" => "markertitle",
            "value" => '',
            "description" => __('Enter Title Info windows for marker', THEMENAME)
        ),
        array(
            "type" => "textarea",
            "heading" => __('Marker Description', THEMENAME),
            "param_name" => "markerdesc",
            "value" => '',
            "description" => __('Enter Description Info windows for marker', THEMENAME)
        ),
        array(
            "type" => "attach_image",
            "heading" => __('Marker Icon', THEMENAME),
            "param_name" => "markericon",
            "value" => '',
            "description" => __('Select image icon for marker', THEMENAME)
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Marker List', THEMENAME),
            "param_name" => "markerlist",
            "value" => '',
            "description" => __('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Info Window Max Width', THEMENAME),
            "param_name" => "infowidth",
            "value" => '200',
            "description" => __('Set max width for info window', THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Type", THEMENAME),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => __('Select the map type.', THEMENAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style Template", THEMENAME),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Custom" => "custom",
                "Light Monochrome" => "light-monochrome",
                "Blue water" => "blue-water",
                "Midnight Commander" => "midnight-commander",
                "Paper" => "paper",
                "Red Hues" => "red-hues",
                "Hot Pink" => "hot-pink"
            ),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Custom Template', THEMENAME),
            "param_name" => "content",
            "value" => '',
            "description" => __('Get template from http://snazzymaps.com', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Zoom', THEMENAME),
            "param_name" => "zoom",
            "value" => '13',
            "description" => __('zoom level of map, default is 13', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width', THEMENAME),
            "param_name" => "width",
            "value" => 'auto',
            "description" => __('Width of map without pixel, default is auto', THEMENAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height', THEMENAME),
            "param_name" => "height",
            "value" => '350px',
            "description" => __('Height of map without pixel, default is 350px', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scroll Wheel', THEMENAME),
            "param_name" => "scrollwheel",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Pan Control', THEMENAME),
            "param_name" => "pancontrol",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('Show or hide Pan control.', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Zoom Control', THEMENAME),
            "param_name" => "zoomcontrol",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('Show or hide Zoom Control.', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scale Control', THEMENAME),
            "param_name" => "scalecontrol",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('Show or hide Scale Control.', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Map Type Control', THEMENAME),
            "param_name" => "maptypecontrol",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('Show or hide Map Type Control.', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Street View Control', THEMENAME),
            "param_name" => "streetviewcontrol",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('Show or hide Street View Control.', THEMENAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Over View Map Control', THEMENAME),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            ),
            "description" => __('Show or hide Over View Map Control.', THEMENAME)
        )
    )
));