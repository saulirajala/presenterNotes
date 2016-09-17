# Presenter Notes
Presenter Notes -theme for Wordpress. It's build on top of Sage Roots -theme and uses Twitter Bootstrap and jQuery. , 
This is made especially for preachers and speakers to use as a presenter notes.
This theme allows speaker to easily follow where one is in presentation/sermon and where he is going.
This theme integrates with reveal.js so you can create and control both your presentation and your notes from WordPress 

You can easily add shortcodes to your text by using keyboard shortcut or button in tinyMCE toolbar

Livedemo: http://irajala.com/sermonnotes/2015/08/09/moikka-maailma/ (well…this only demostrate the speaker view, but the remote presentation is same as the small presentation at the right bottom corner)


##Screenshot:
![alt tag](http://irajala.com/wp-content/screenshot-presentationnotes.png)

###Functionalities:
There are three shortcode in theme: 

-With [section]-shortcode you can add sections to your posttext

-With [section_navigation]-shortcode you can print out the navigation of these sections

-With [change]-shortcode you can define, when the changing of slides should trigger

###Installation
Add the following code to your theme, to where you want to echo the navigation:

<?php echo do_shortcode( "[section_navigation]" ); ?>

###Keyboard shortcut:

alt+z => opens dialog box to add [section]-shortcode

###Depencies (WordPress-plugins):
- Advanced Custom Fields (https://www.advancedcustomfields.com/)

###Depencies (js-framework):
- Reveal.js (https://github.com/hakimel/reveal.js)
- Waypoints (http://imakewebthings.com/waypoints/)

##Changelog
= 2.0 = 

Integrate presentation (Reveal.js) with the theme
Add presentation-iframe to notes view

= 1.0 =
 
First publish with basic functionalities