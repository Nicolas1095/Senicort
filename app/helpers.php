<?php
    function setActive(...$name)
    {
        return request()->routeIs($name) ? 'active' : '';
    }
?>