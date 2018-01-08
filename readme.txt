=== WP-VR-view - Add Photo Sphere, 360 video to Wordpress ===
Contributors: tumanob
Tags: virtual, vr, 360, interactive, streetview, Goolge cardboard, cardboard, virtual reality, 360-degree, android, equirectangular, google, panoramas, Photo Sphere, photos, 360 video
Requires at least: 3.9
Tested up to: 4.9.1
Stable tag: 2.2
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Add Photo Sphere, VR images and 360 Video to Wordpress. Virtual tour, Virtual reality Wordpress experience with Google cardboard compatibility.

== Description ==

WP-VR-view is a plugin that allows you to **display Photo Sphere images and 360 video on wordpress** pages, posts, etc.
Website visitors will be able to navigate through your panoramas.
Smartphone users can use Google cardboard  to look through in Virtual reality way.

= Quick Video Demo =
http://www.youtube.com/watch?v=DWkLce9M-h0

= Demos =

* [Wodpress example photo and video](http://www.alexander-tumanov.name/wp-vr-view/ "Photo Sphere wordpress demo")
* [Photo Sphere sterio image](https://plugins.svn.wordpress.org/wp-vr-view/trunk/asset/pano/andes_2048.jpg "Photo Sphere sterio image")


If you want to contact me for any reason, feel free to email me at tumanob@gmail.com or contact me on:
**[Facebook](https://www.facebook.com/alexander.tumanov)**, **[GitHub](https://github.com/tumanob)**


= Shortcode parameters =
* video - url to 360 video .mp4 file (required if you add video)
* img - url to photosphere image (required if you add photosphere)
* pimg -  preview image URL
* width - in pixels or percent
* height - in pixels or percent
* stereo - value 'true' or 'false'
* yaw -  angle shift option. Values from -360 to 360
* hascontrols - value 'true' or 'false'  -  for video player to add controls buttons

= Short codes examples: =
1. **[vrview img="URL for photosphere image"]**
1. **[vrview video="URL for 360 video .mp4 file"]**
1. **[vrview video="URL for 360 video .mp4 file" img="URL for video preview image"]**
1. **[vrview img="URL for photosphere" pimg="Optional URL preview photosphere photo for faster load"]**
1. **[vrview img="URL for photosphere" width="500" height="300"]**
    width="500" - set width to 500 pixels wide. if you want full/100% width you can use width="100%"
1. **[vrview img="URL for photosphere" stereo="true"]**
    stereo image - default value is false.


= Supported Platforms =
  * Web - modern versions of chrome,Firefox, Safari, IE 11 and Edge
  * Native - iOS 8 and higher , Android 4.4 (Kit Kat) and higher

== Installation ==
= Install from WordPress Dashboard =
Log into WordPress dashboard then click Plugins > Add new > Then under the title "Install Plugins" click Upload > choose the zip > Activate the plugin!

= Install from WordPress Dashboard plugin Search =
Log into WordPress dashboard then click Plugins > Add new > Then do search for "WP VR view" > choose "Install" > Activate the plugin!


= Install from FTP =
Extract the zip file and drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.


After activation you can use short codes to insert your Photo Sphere images to any post or page.


== Frequently Asked Questions ==

Do you have questions or issues with plugin? Use forum or email tumanob@gmail.com.

=  How can I create a panorama? =
   The easiest way to create a panorama would be using a mobile device.
   There are a lot of panorama-shooting applications

=  What library is used? =

  https://developers.google.com/cardboard/vrview

= Image Specifications =
  * VR View images can be stored as png, jpeg, or gif. We recommend you use jpeg for improved compression.
  * For maximum compatibility and performance, image dimensions should be powers of two (e.g. 2048 or 4096).
  * Mono images(default) should be 2:1 aspect ratio (e.g. 4096 x 2048).
  * Stereo images should be 1:1 aspect ratio (e.g. 4096 x 4096).

= Additional information =

 https://support.google.com/cardboard/answer/6383058?p=vrview&rd=1

=Default width and height =
* width 640px  - height - 360px

= Minimum image width =
* Image should be minimum 2048 px wide

== Screenshots ==
1. Image on Wordpress page from Browser
2. Full Screen View
3. Cardboard View
4. Button to add Shortcode
5. Shortcode Form


== Changelog ==

= 2.1 =
* Updated engine
* Added Play/stop, Mute buttons for Video player
* added option to shift view starting point

= 1.6 =
* checked WP version 4.6.1 support

= 1.4 =
* added support for 360 video
* added buttons for WYSIWYG editor
* Shorcode generation forms for 360 images and video

= 1.3 =
* added editor button to make shortcodes


= 1.2 =
* added screenshots. readme.txt and banners

= 1.0 =
* first version of plugin
