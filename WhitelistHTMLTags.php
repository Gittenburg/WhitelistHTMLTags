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
		return Html::openElement($tag, Sanitizer::validateTagAttributes($args, 'div'))
			. $parser->recursiveTagParse($text, $frame) . Html::closeElement($tag);
	}
}
