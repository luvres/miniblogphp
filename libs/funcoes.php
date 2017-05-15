<?php

function tStr($string) {
  return addcslashes(htmlentities(utf8_decode(trim($string))));
}
