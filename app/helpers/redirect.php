<?php

    function redirect($path)
    {
        header('Location: ' . Config::getDomain() . $path);
    }
