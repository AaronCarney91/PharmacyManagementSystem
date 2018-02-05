<?php

    $config = require __DIR__ . "/config.php";

    function config($config_params) {
        global $config;

        $config_point = explode('.', $config_params);
        $config_type = $config_point[0];
        $config_field = $config_point[1];

        return $config[$config_type][$config_field];
    }