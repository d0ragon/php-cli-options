<?php

function cli_get_options ()
{
  global $argv;

  $regex = '/((\-([a-zA-Z])(\s|=)?)|(\-{2}([a-zA-Z]+[a-zA-Z0-9_]*)(\s|=)))([a-zA-Z0-9]+)/';
  preg_match_all($regex, implode(' ', array_slice($argv, 1)), $matches);

  $opts = array();
  foreach ($matches[8] as $i => $val)
  {
    $opts[empty($matches[3][$i]) ? $matches[6][$i] : $matches[3][$i]] = $val;
  }
  return $opts;
}

