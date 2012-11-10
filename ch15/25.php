<?php

$item = 'Web Publishing';

$books = array('Expert Networking', 
               'Web Publishing', 
               'Joomla! Ecommerce with VirtueMart',
               'Joomla! with Flash',
               'Joomla! Top Extension Cookbook');

if ( in_array($item, $books) ) {
    echo "We have found the book $item .";
  } else {
    echo "Sorry, we have not found the book $item.";
}
