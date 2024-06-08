<?php

function flash(string $index, string $css = 'error-f') 
{
  if(isset($_SESSION['__flash'][$index])) {
    $message = $_SESSION['__flash'][$index];

    return "<span class='{$css}' >{$message}</span>";
  }
}