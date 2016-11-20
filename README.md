# Presenter Notes
Presenter Notes -theme for WordPress, that keeps your notes and presentations at the same place.

1. Create your notes
2. Create your presentation
3. See your presentation changing on big screen, while you scroll your notes on iPad. No need for separate remote controls, etc.

Theme is build on top of Sage Roots -theme and uses Twitter Bootstrap and jQuery. 

You can easily add shortcodes to your text by using keyboard shortcut or button in tinyMCE toolbar

##Screenshot:
![alt tag](http://irajala.com/wp-content/screenshot-presentationnotes.png)

###Functionalities:
There are three shortcode in theme: 

-With [section]-shortcode you can add sections to your posttext

-With [section_navigation]-shortcode you can print out the navigation of these sections

-With [change]-shortcode you can define, when the changing of slides should trigger

###How to use?
For reveal.js multiplexing to work you need socket.io server (see https://github.com/hakimel/reveal.js#multiplexing)
You can add tokens to theme-folder/tokens.php using following variables:<br>
`$socket_secret = 'YOUR_SOCKET_SECRET';`<br>
`$socket_id = 'YOUR_SOCKET_ID';`

1. Add horizontal slides for your presentations
2. Attach horizontal slides to your notes
3. Mark your note as On Air => correct slides will show in presentations
4. Add pages for master-show (using template "Slideshow template") and for your slave-show (using template "Show Template")

###Keyboard shortcut:

alt+z => opens dialog box to add [section]-shortcode

###Depencies (WordPress-plugins):
- CMB2 (https://fi.wordpress.org/plugins/cmb2/)
- CMB2 Field Type: Attached Posts (https://github.com/WebDevStudios/cmb2-attached-posts)

###Depencies (js-framework):
- Reveal.js (https://github.com/hakimel/reveal.js)
- Waypoints (http://imakewebthings.com/waypoints/)

##Changelog
= 2.1 = 

Move from ACF to CMB2 in slides-admin
Add template for horizontal-slide single view

= 2.0 = 

Integrate presentation (Reveal.js) with the theme
Add presentation-iframe to notes view

= 1.0 =
 
First publish with basic functionalities