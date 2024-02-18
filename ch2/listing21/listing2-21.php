<?php

// EntityManager which saves only a single object at a time - not very useful

$user = new User(/* ... */);
$comment = new Comment(/* ... */);
$entityManager = new EntityManager($user);
$entityManager->save();
$entityManager = new EntityManager($comment);
$entityManager->save();
