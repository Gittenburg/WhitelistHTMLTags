<?php
class WhitelistHTMLTags {
	public static function onParserFirstCallInit( Parser &$parser ) {
		global $wgWhitelistedHTMLTags;
		foreach ($wgWhitelistedHTMLTags as $tag){
			$parser->setHook($tag, function($input, $args, $parser, $frame) use ($tag) {
				return self::renderTag($input, $args, $parser, $frame, $tag);
			});
		}
	}

	public static function renderTag($text, $args, $parser, $frame, $tag){
		return "<$tag>".$parser->recursiveTagParse($text, $frame)."</$tag>";
	}
}
