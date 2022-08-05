<?php

    function redirect($path)
    {
        header('Location: ' . Config::domain() . $path);
    }
