typo3org_newsletter
==================

What is this
------------

it's the TYPO3 Newsletter template in an extension.


How to setup this extension
---------------------------

1. create page structure:
	create following page structure:
	<pre>
		|- direct_mail storage<br />
		&nbsp;&nbsp;	|- newsletter<br />
		&nbsp;&nbsp;	|- direct_mail categories<br />
	</pre>

2. add PageTS to the direct_mail SysFolder
	<pre>
		&lt;INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/page-ts/newsletter.txt"&gt;
	</pre>
	following TS need to be put in the root page:
	<pre>
		TCEFORM.fe_users.module_sys_dmail_category.disabled = 0
		TCEFORM.sys_dmail_group.select_categories.disabled = 0
		TCEFORM.fe_users.module_sys_dmail_category.PAGE_TSCONFIG_IDLIST = XYZ
		TCEFORM.sys_dmail_group.select_categories.PAGE_TSCONFIG_IDLIST = XYZ
	</pre>
	put the UID of the "direct_mail categories" page:

3. If TemplaVoila:

	1. create new Template Object
		* Title: [Page] Newsletter
		* HTML: typo3conf/ext/typo3org_newsletter/Resources/Private/Templates/base_boxed_body_image_2column_query.html
		* DS: typo3conf/ext/typo3org_newsletter/Configuration/templavoila/[Page] Newsletter.xml
		* DS must(?) be copied to typo3conf/ext/t3org_base/templavoila/page/
	2. FCE for the 2 col images
		* Title : [Page Newsletter] 2-col image FCE
		* HTML: EXT:typo3org_newsletter/Resources/Private/Templates/base_boxed_body_image_2column_query.html
		* DS: typo3conf/ext/typo3org_newsletter/Configuration/templavoila/fce/[Page Newsletter] 2-col image FCE.xml
		* DS must(?) be copied to typo3conf/ext/t3org_base/templavoila/fce/

4. Create a new template in the SysFolder and set following:
	1. Constant
		<pre>
			&lt;INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/constants/constants.txt"&gt;
		</pre>
	2. Setup
		<pre>
			&lt;INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/setup/page.txt"&gt;
		</pre>
		column Border is the event in the footer
		if TemplaVoila:
		<pre>
			&lt;INCLUDE_TYPOSCRIPT: source="FILE:EXT:typo3org_newsletter/Configuration/TypoScript/setup/page-tv.txt"&gt;
		</pre>
	3. activate "Clear Constants and Setup"
	4. Include Static
		* css_styled_content
		* Direct Mail Content Boundaries (direct_mail)
		* Direct Mail Plain Text (direct_mail)
		* gridelements (if it's classic template, then it will be needed)

PS: and don't forget to configure the direct_mail extension