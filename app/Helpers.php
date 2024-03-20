<?php

function is_image($filename)
{
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
}

function is_video_file($filename)
{
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    return in_array($extension, ['mp4', 'avi', 'mov', 'mkv']);
}

// generate a unique_code for project
// function unique_code($limit)
// {
//   return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
// }