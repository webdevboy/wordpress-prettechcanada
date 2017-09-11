<?php
vc_map(array(
    "name" => 'Booking Table',
    "base" => "cs-booking-form",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', THEMENAME),
    "description" => __('Booking Table', THEMENAME),
    "params" => array(
        array(
            "type" => "checkbox",
            "heading" => __('Phone Number', THEMENAME),
            "param_name" => "phone",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Message', THEMENAME),
            "param_name" => "message",
            "value" => array(
                __("Yes, please", THEMENAME) => true
            )
        )
    )
));