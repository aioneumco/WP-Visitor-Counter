=== Visitor Counter ===
Contributors: https://aioneum.com/
Tags: counter, visitors, unique visitors, statistics
Requires at least: 4.0
Tested up to: 6.0
Stable tag: 1.0
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Visitor Counter is a simple WordPress plugin that counts and displays the total number of unique visitors to your website.
It uses cookies to track whether a visitor has been to your site before, ensuring only unique visits are counted.

You can display the unique visitor count anywhere on your site using the [visitor_count] shortcode.

== Installation ==

1. Upload the plugin to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. After activation, go to the 'Settings > Visitor Counter' to manage settings and reset the visitor count.
4. Use the [visitor_count] shortcode to display the unique visitor count anywhere on your site.

== Frequently Asked Questions ==

= How does the visitor count work? =

The plugin uses cookies to identify if a visitor is new to the site. If the visitor has not visited before, they are counted as a unique visitor. Each unique visit increases the count stored in the WordPress database.

= How can I reset the visitor count? =

You can reset the visitor count by visiting the 'Settings > Visitor Counter' page in the WordPress admin area. There will be an option to reset the counter.

= Is this plugin compatible with caching plugins? =

Yes, the visitor count is stored in the WordPress database, and caching plugins will not interfere with it.

== Screenshots ==

1. **Settings Page**: The settings page allows you to reset the visitor count.
2. **Shortcode Example**: The visitor count can be displayed anywhere using the shortcode `[visitor_count]`.

== Changelog ==

= 1.0 =
* Initial release with functionality to count unique visitors and display them via a shortcode.

== Upgrade Notice ==

= 1.0 =
This is the first version of the Visitor Counter plugin. Upgrade if you want to track unique visitors to your site.
