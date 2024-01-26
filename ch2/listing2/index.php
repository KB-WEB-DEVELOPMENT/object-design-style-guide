<?php

// A FileLogger Service with a depedency which needs a config value
$logger = new FileLogger(new DefaultFormatter(),'path/to/logfile');

$logger->log('A message');