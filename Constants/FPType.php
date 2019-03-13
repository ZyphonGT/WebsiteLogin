<?php
class FPType{
  const LEFT_THUMB = 0;
  const RIGHT_THUMB = 1;
  const LEFT_INDEX = 2;
  const RIGHT_INDEX = 3;
  const LEFT_MIDDLE = 4;
  const RIGHT_MIDDLE = 5;
  const LEFT_RING = 6;
  const RIGHT_RING = 7;
  const LEFT_PINKY = 8;
  const RIGHT_PINKY = 9;
  public static function get_string(int $fp_type) : string {
    $constants = array_flip((new ReflectionClass(__CLASS__))->getConstants());
    if(array_key_exists($fp_type, $constants))
      return $constants[$fp_type];
    else
      return 'INVALID';
  }
}