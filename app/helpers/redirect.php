<?php

    function redirect($path)
    {
        header('Location: ' . DOMAIN . $path);
    }
