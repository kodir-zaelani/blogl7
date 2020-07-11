<?php
function month_name($month)
{
    $months = ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    return isset($months[$month - 1]) ? $months[$month - 1] : null;
}
