<?php

function get_Key($array, $search_value)
    {
        $result = array_keys($array, $search_value);
        return ($result);
    }