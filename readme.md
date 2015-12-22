The Skivvy Decree
- Less is More.
- Consistent Structure
- Reduce rabbit holing
- Clear and ordered function files
- Fully flexible
- Minimilist core

----

## CSS Helper Classes

Located in 'css/func.css', are a couple helper classes. Each in detail are below

##### .clear
````html
<div>
	<div style="float:left;"></div>
	<div style="float:right;"></div>
	<div class="clear"></div>
</div>
````
Resource: http://sonspring.com/journal/clearing-floats
Set just before the closing tag of a div so the container does not collapse due to floated children


##### .clearfix or .group
````html
<div class="clearfix">
	<div style="float:left;"></div>
	<div style="float:right;"></div>
</div>
````
Resource: http://www.yuiblog.com/blog/2010/09/27/clearfix-reloaded-overflowhidden-demystified & http://css-tricks.com/snippets/css/clear-fix/
Set to the class of a container so it does not collapse on its freaky, floating children. '.group' is a cleaner version that works IE8 and up.

##### .preloader
````html
<div class="preloader">
	<img src="img/whateves.jpg">
	<img src="img/whateves2.jpg">
</div>
````
This preloads images just after the opening of the body tag in defaul Skivvy. This helps with css loaded hover effects, to not 'pop' on loading.

##### .redalert
````html
<div class="preloader">
	Whatever content here
</div>
````
Class to draw attention to. Maybe for quick notice or for developing troubleshooting

##### .screenreader
````html
<div class="extrabgclass screenreader">
	Example text can be read by screen readers to describe a missing css background image
</div>
````
Image replacement of text. screenreader throws text way behind the screen, stage left. Set the background image in one class and add screen reader to have description text to be friendly to screen readers.

##### .hide or .hidden
````html
<div class="hide">
	Will not be seen... EVER... AGAIN!
</div>
````
'nuff said, dontcha think?



##### .textleft / .textright / .textcenter / .textjustify
````html
<div class="textleft">
	I'm left aligned.
</div>
<div class="textright">
	I'm right aligned.
</div>
<div class="textcenter">
	I'm in the middle!
</div>
<div class="textjustify">
	I'm justified in my actions!
</div>
````
Text alignment is such a common CSS element... I think it's insane that it's not it's own class.


##### .textleft / .textright / .textcenter / .textjustify
````html
<div class="group">
	<div class="alignleft">
		I'm left aligned.
	</div>
	<div class="alignright">
		I'm right aligned.
	</div>
	<div class="aligncenter">
		I'm in the middle!
	</div>
</div>
````
Default classes to Wordpress's image alignment. Also helpful for floating left and right. The center element is a block element.



##### .greyscale
````html
<img src="whateves.jpg" class="greyscale">
````
[EXPERIMENTAL]
Contains SVG filters that applies to an image or HTML content. There is little browser support for these and should be used on decorative items.

----
##### .blurry
````html
<img src="whateves.jpg" class="blurry">
````
[EXPERIMENTAL]
Contains SVG filters that clurs the content, Either image or text. The resource.svg contains the value of the blur as  stdDeviation="1"

----

## FUNCTIONS

##### the_snippet($length=55,$readmore='Read More')
   Usable alternate to the "the_excerpt()"
````php
<?php the_snippet($length=55,$readmore='Read More'); ?>
````


#### get_the_thumbnail_caption()
   Returns the caption for attached featured image featured image
````php
<?php echo get_the_thumbnail_caption(); ?>
````
