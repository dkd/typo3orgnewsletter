Todo:
1. add PageTS to the direct_mail SysFolder
<pre>
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/page-ts/newsletter.txt">
</pre>

2. Create a new template in the SysFolder and set following:
2.1 Constant
<pre>
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/constants/constants.txt">
</pre>
2.2 Setup
<pre>
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/setup/page.txt">
</pre>
2.3 activate "Clear Constants and Setup"
2.4 Include Static
* css_styled_content
* Direct Mail Content Boundaries (direct_mail)
* Direct Mail Plain Text (direct_mail)
* gridelements


PS:
# column Border is the event in the footer