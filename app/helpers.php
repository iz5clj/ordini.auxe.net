<?php

if (!function_exists('notifyOrder')) {
    function notifyOrder()
    {
        // create a signed url with order number
        $link = URL::signedRoute('conferma');

        // check all orders with status CREATO and grouped by supplier
        
    }
}


