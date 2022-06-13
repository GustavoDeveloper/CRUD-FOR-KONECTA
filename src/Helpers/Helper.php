<?php

function redirect($page)
{
    header('Location:' .URL. $page);
    echo URL.$page;
}