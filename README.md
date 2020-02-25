# WhitelistHTMLTags

This MediaWiki extension lets you enable certain HTML tags, MediaWiki does not support.

Content of the whitelisted tags is parsed as regular wikitext.

All HTML attributes that MediaWiki supports for `<div>` tags are supported (and sanitized).

**IF YOU ALLOW <script>, YOU WILL BE VULNERABLE TO XSS.**

Usage example:

```
wfLoadExtension('WhitelistHTMLTags');
$wgWhitelistedHTMLTags = ['details', 'summary'];
```
