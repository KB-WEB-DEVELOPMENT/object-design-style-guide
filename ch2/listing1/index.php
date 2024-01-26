<?php

//  A FileLogger Service
$logger = new FileLogger(new DefaultFormatter());

$logger->log('A message');