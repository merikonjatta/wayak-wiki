<?php
 
// AvbDisqus v2
 
if( !defined( 'MEDIAWIKI' ) ) die( -1 );
 
// Disqus settings.
// "Website Name" field in Disqus basic settings for your site.
$wgAvbDisqusWebsiteName = strtolower("");
 
// Register disqus tag.
$wgExtensionFunctions[] = "AvbDisqusExtension";
 
// Add hook on SkinAfterBottomScripts (paste the Disqus comment count code).
$wgHooks['SkinAfterBottomScripts'][] = 'onSkinAfterBottomScripts_AddAvbDisqusScript';
 
 
// ------------ Disqus tag --------------
 
function AvbDisqusExtension() {
    global $wgParser;
    # register the extension with the WikiText parser
    # the first parameter is the name of the new tag.
    # In this case it defines the tag <example> ... </example>
    # the second parameter is the callback function for
    # processing the text between the tags
    $wgParser->setHook( "disqus", "render_AvbDisqus" );
}
 
// Renders Disqus embed code
function render_AvbDisqus($input, $argv, $parser = null) {
  global $wgAvbDisqusWebsiteName;
  if ($wgAvbDisqusWebsiteName == "") {
    echo('Please, set $wgAvbDisqusWebsiteName in LocalSettings.php');
    die(1);
  }
 
 
  if (!$parser) $parser =& $GLOBALS['wgParser'];
  $output = "<!-- avb: AvbDisqus home: http://devwiki.beloblotskiy.com/index.php5?title=AvbDisqus_(MediaWiki_extension) --><div id=\"disqus_thread\"></div><script type=\"text/javascript\" src=\"http://disqus.com/forums/" . $wgAvbDisqusWebsiteName . "/embed.js\"></script><noscript><a href=\"http://" . $wgAvbDisqusWebsiteName . ".disqus.com/?url=ref\">View the discussion thread.</a></noscript><a href=\"http://disqus.com\" class=\"dsq-brlink\">blog comments powered by <span class=\"logo-disqus\">Disqus</span></a>";
  return $output;
}
 
 
// --------------------- Disqus bottom script -------------------------
 
// Event 'SkinAfterBottomScripts': At the end of Skin::bottomScripts()
// $skin: Skin object
// &$text: bottomScripts Text
// Append to $text to add additional text/scripts after the stock bottom scripts.
// Documentation: \mediawiki-1.13.0\docs\hooks.txt
function onSkinAfterBottomScripts_AddAvbDisqusScript($skin, &$text) 
{
        global $wgAvbDisqusWebsiteName;
        if ($wgAvbDisqusWebsiteName == "") {
                echo('Please, set $wgAvbDisqusWebsiteName in LocalSettings.php');
                die(1);
        }
 
        $disqus_bottom_script = "<script type=\"text/javascript\">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '".$wgAvbDisqusWebsiteName."'; // required: replace example with your forum shortname
 
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>";
 
        $text .= $disqus_bottom_script;
        return true;
}
