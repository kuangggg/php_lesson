<?php

if(flock($file, LOCK_EX | LOCK_NB)) {
    sleep(5);
    flock($file, LOCK_UN);
} else {
    echo 'had locked';
}
