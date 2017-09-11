<?php
if (class_exists('EM_MS_Globals')) {
    vc_map(array(
        "name" => 'Next Event',
        "base" => "cs-next-event",
        "icon" => "cs_icon_for_vc",
        "category" => __('CS Hero', THEMENAME),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __('Title', THEMENAME),
                "param_name" => "title"
            ),
            array(
                "type" => "textfield",
                "heading" => __('Description', THEMENAME),
                "param_name" => "description"
            ),
            array(
                "type" => "textfield",
                "heading" => __('Time Zones', THEMENAME),
                "param_name" => "timezone",
                "value" => "GMT"
            ),
            array(
                "type" => "attach_image",
                "heading" => __('Image', THEMENAME),
                "param_name" => "image"
            )
        )
    ));
}