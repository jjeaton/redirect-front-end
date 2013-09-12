# Redirect Front-end #

Contributors: jjeaton  
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JKWPDXGYLASCY  
Tags: redirect, dashboard, admin, developer, hide, access, frontend, backend  
Requires at least: 3.6  
Tested up to: 3.6  
Stable tag: 0.1  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  

A small plugin that lets you "hide" the front-end of a site, redirecting to the WP Dashboard.

## Description ##

A small plugin that lets you "hide" the front-end of a site, all front-end requests of logged-in users are redirected to the WP Dashboard (filterable).

Useful mainly for developers, if you're developing a site and want to give users access to see the dashboard while you're working on the front-end. Also can be used if you have a site with no front-end and always want users to stay on the dashboard.

Filters included:

* `rfe_redirect_caps`: Control capabilities required to bypass redirect, lets Administrators access front-end by default (default: `manage_options`)  
* `rfe_redirect_url`: Change the redirect URL (default: `admin_url()`)  

## Installation ##

1. Upload the `redirect-frontend` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. That's it.

## Frequently Asked Questions ##

### Does this do anything else? ###

Nope!

## Changelog ##

### 0.1 ###
* Initial release

## Upgrade Notice ##

### 0.1 ###
* Initial release
