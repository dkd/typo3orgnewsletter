Todo:
1. create page structure
create following page structure:
|- direct_mail storage
	|- newsletter
	|- direct_mail categories

2. If TV: create new Template Object
* Title: [Page] Newsletter
* HTML: typo3conf/ext/typo3org_newsletter/Resources/Private/Templates/base_boxed_body_image_2column_query.html
* DS: typo3conf/ext/typo3org_newsletter/Configuration/templavoila/[Page] Newsletter.xml
DS must(?) be copied to typo3conf/ext/t3org_base/templavoila/page/

2.1 FCE for the 2 col images
* Title : [Page Newsletter] 2-col image FCE
* HTML: EXT:typo3org_newsletter/Resources/Private/Templates/base_boxed_body_image_2column_query.html
* DS: typo3conf/ext/typo3org_newsletter/Configuration/templavoila/fce/[Page Newsletter] 2-col image FCE.xml
DS must(?) be copied to typo3conf/ext/t3org_base/templavoila/fce/

3. add PageTS to the direct_mail SysFolder
<pre>
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/page-ts/newsletter.txt">
</pre>

following TS need to be put in the root page:
<pre>
TCEFORM.fe_users.module_sys_dmail_category.disabled = 0
TCEFORM.sys_dmail_group.select_categories.disabled = 0
TCEFORM.fe_users.module_sys_dmail_category.PAGE_TSCONFIG_IDLIST = XYZ
TCEFORM.sys_dmail_group.select_categories.PAGE_TSCONFIG_IDLIST = XYZ
</pre>
put the UID of the "direct_mail categories" page:

4. Create a new template in the SysFolder and set following:

4.1 Constant
<pre>
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/constants/constants.txt">
</pre>

4.2 Setup
<pre>
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/setup/page.txt">
</pre>
* column Border is the event in the footer

if TemplaVoila:
<pre>
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/setup/page-tv.txt">
</pre>

4.3 activate "Clear Constants and Setup"
4.4 Include Static
* css_styled_content
* Direct Mail Content Boundaries (direct_mail)
* Direct Mail Plain Text (direct_mail)
* gridelements (if it's classic template, then it will be needed)
