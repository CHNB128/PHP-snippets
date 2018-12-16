<?php

function validate_ip_address ($address) {
  $pattern = '/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/';

  $ip = null;

  if (preg_match($pattern, $address)) {
    $ip = $address;
  } else {
    throw new Exception("Incorrect ip adderss", 1);
  }

  return $ip;
}
