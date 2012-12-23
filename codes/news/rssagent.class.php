<?php

class RssAgent {
	
	public $title = array();
	public $link = array();
	public $description = array();
	public $category = array();
	public $guid = array();
	public $pubDate = array();
	
  function __construct( $urlFeed = NULL ) {
	$content = @file_get_contents( $urlFeed ); // Get the content from URL
	$x = new SimpleXmlElement( $content ); // Parse XML using SimpleXmlElement Class
	foreach( $x->channel->item as $entry ) // Fill the arrays with the rss feed
	{
		array_push( $this->title, $entry->title ); // Append title
		array_push( $this->link, $entry->link ); // Append link
		array_push( $this->description, strip_tags( $entry->description ) ); // Strip HTML tags and append description
		array_push( $this->category, $entry->category ); // // Append category
		array_push( $this->guid, $entry->guid ); // // Append guid
		array_push( $this->pubDate, $entry->pubDate ); // Append pubDate
	}
   }
}	