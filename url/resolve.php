<?php

function resolve_url($path)
{
    // Array to build a new path from the good parts
    $parts = array();
    // Replace backslashes with forwardslashes
    $path = str_replace('\\', '/', $path);
    // Combine multiple slashes into a single slash
    $path = preg_replace('/\/+/', '/', $path);
    // Collect path segments
    $segments = explode('/', $path);
    // Initialize testing variable
    $test = '';

    foreach($segments as $segment)
    {
        if($segment != '.')
        {
            $test = array_pop($parts);
            if(is_null($test))
                $parts[] = $segment;
            else if($segment == '..')
            {
                if($test == '..')
                    $parts[] = $test;

                if($test == '..' || $test == '')
                    $parts[] = $segment;
            }
            else
            {
                $parts[] = $test;
                $parts[] = $segment;
            }
        }
    }

    return implode('/', $parts);
}