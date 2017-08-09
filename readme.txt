=== Gameconfs Widget ===
Contributors: jhorneman
Tags: events, gamedev
Requires at least: 4.0
Tested up to: 4.2.1
Stable tag: 1.1
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A widget with a list of game conferences and events from Gameconfs.com.

== Description ==

This plugin provides a widget with a list of game conferences and events from Gameconfs.com.

The widget has several parameters which you can change (in the 'Appearance' / 'Widgets' menu):

* The _title_ of the widget, e.g. 'Upcoming Conferences'.
* The _width_ of the widget, in pixels. Default: 240.
* The _height_ of the widget, in pixels. Default: 400.
* The _place_, i.e. continent, country, state or city you want to show events for. Optional. When empty the default behavior is to show events across the entire world.
* The _number of months_ from today you want to see in the widget. The value has to be between 1 and 12. Optional. The default is 3.

You can also indicate that you want the widget to use your own CSS, rather than Gameconfs's CSS.
This allows you to make the widget look more like it's part of your own website.
This is an advanced option though, as you will have to edit your own CSS for the widget.

(See http://www.gameconfs.com/widget/ for more information about the widget.)

Please note that this widget loads data from Gameconfs.com, an external service. The links in the widget will lead to Gameconfs.com, where more information on each event is available.

== Installation ==

1. Download the Wordpress widget.
2. Put it in the wp-content/plugins directory of your WordPress installation.
3. Activate the plugin through the 'Plugins' menu in the administration interface of your WordPress installation.
4. Add the widget to your site and change its parameters in the 'Appearance' / 'Widgets' menu.

== Changelog ==

= 1.1 =

Made it possible to set the no-css flag from the WordPress administration interface.

= 1.0 =

Adapted for Wordpress.org.
