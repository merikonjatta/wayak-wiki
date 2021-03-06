<?php
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename      = "Wayak";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath       = "";
$wgScriptExtension  = ".php";

## The protocol and server name to use in fully-qualified URLs
$wgServer           = "http://wayak.uni-kaji.com";

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "$wgStylePath/common/images/logo.png";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "mediawiki@wayak.uni-kaji.com";
$wgPasswordSender   = "mediawiki@wayak.uni-kaji.com";

$wgEnotifUserTalk      = false; # UPO
$wgEnotifWatchlist     = false; # UPO
$wgEmailAuthentication = true;

## Database settings
//$wgDBtype           = "sqlite";
//$wgDBname           = "wayak";
$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
$wgDBname           = "wayak";
$wgDBuser           = "wayak";
$wgDBpassword       = trim(file_get_contents("$IP/db_password.txt"));
$wgDBprefix         = "mw";
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=utf8";

# SQLite-specific settings
$wgSQLiteDataDir    = "/home/marco/sites/wayak/data";

## Shared memory settings
$wgMainCacheType    = CACHE_ACCEL;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads  = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons  = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "ja";

$wgSecretKey = "07e37e6853da2d971eec051bf642d2aa08a514a04af7c4ca5abec669143ec284";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "9b01587049e00a2b";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "cavendish";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl  = "";
$wgRightsText = "";
$wgRightsIcon = "";
# $wgRightsCode = ""; # Not yet used

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = -1;

########################################################################
# End of automatically generated settings.
# Add more configuration options below.

# Local timezone
$wgLocalTimezone = "Asia/Tokyo";
$wgLocalTZoffset = 9*60;

# Group permissions
# Visitors may only read and create accounts
$wgGroupPermissions['*'] = array();
$wgGroupPermissions['*']['createaccount']    = true;
$wgGroupPermissions['*']['read']             = true;
# Logged in users and the autoconfirmed group can read only,
# unless their email is confirmed
$wgGroupPermissions['autoconfirmed'] = array();
$wgEmailConfirmToEdit = true;

# Upload extensions
$wgFileExtensions = array(
	'png', 'jpg', 'jpeg', 'gif', 'bmp',
	'txt', 'doc', 'docx', 'xls', 'xlsx', 'csv', 'tsv', 'ppt', 'pptx',
	'ps', 'ai', 'pdf', 'epub', 'mobi',
	'zip', 'tar', 'gz', '7z'
);

# API and Error reporting
$wgEnableAPI = true;
$wgEnableWriteAPI = true;
$wgNamespacesWithSubpages[NS_MAIN] = true;
$wgShowExceptionDetails = true;
$wgShowSQLErrors = true;

require_once( "$IP/extensions/SubPageList/SubPageList.php" );
require_once( "$IP/extensions/Cite/Cite.php");
require_once( "$IP/extensions/Validator/Validator.php" );
include_once( "$IP/extensions/SemanticMediaWiki/SemanticMediaWiki.php" );
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );
enableSemantics('wayak.uni-kaji.com');
require_once("extensions/AvbDisqus/avbdisqus.php");
$wgAvbDisqusWebsiteName = strtolower("wayak");

# Cavendish skin settings
$cavendishLogoURL = "$wgStylePath/wayak/logo.png";
$cavendishLogoWidth = 135;
$cavendishLogoHeight = 36;
$cavendishLogoMargin = 20;
$cavendishSiteWith = 960;
