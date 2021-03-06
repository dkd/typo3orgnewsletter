<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dkd-kartolo
 * Date: 8/22/13
 * Time: 4:25 PM
 * To change this template use File | Settings | File Templates.
 */

include_once (t3lib_extMgm::extPath('typo3org_newsletter').'Classes/Lib/CssToInlineStyles/CssToInlineStyles.php');

use \TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

/**
 * Class tx_typo3orgnewsletter
 */
class tx_typo3orgnewsletter {

	/**
	 * This method is called by the frontend rendering hook contentPostProc-output
	 *
	 * @param $content
	 * @param $pObj
	 */
	public function parseFE(&$content,$pObj) {
		if ($pObj->tmpl->setup['config.']['tx_typo3org_newsletter.']['inlineCSS'] && ($pObj->type == 0) ) {
			$content['pObj']->content = $this->parseContent($content['pObj']->content);
		}

	}

	/**
	 * parsing the content. Search for linked CSS and make it inline
	 *
	 * @param $html
	 * @return string
	 */
	protected function parseContent($html){

		$css = '';

		// loop if multiple css link is found
		while (preg_match('/(?i)(<link)+?.[^>]*(href|src)=(\"??)([^\" >]*?)\\3[^>]*>/siU', $html,$match)) {
			// read the css
			$css .= t3lib_div::getURL(t3lib_div::getIndpEnv('TYPO3_SITE_URL').$match[4]);

			// remove <link /> from the HTML
			$html = str_replace($match[0], '', $html);
		}

		$cssToInlineStyles = new CssToInlineStyles();

		$cssToInlineStyles->setHTML($html);
		$cssToInlineStyles->setCSS($css);

		// convert them
		return $cssToInlineStyles->convert();
	}

	/**
	 * rendering plaintext for the gridelements
	 * @param $pObj		the parent object from the tx_directmail_pi1
	 * @param $content	the content, usually empty
	 * @return array	array of the rendered content
	 */
	public function renderPlainText($pObj, $content) {
		if ($pObj->cObj->data['CType'] == 'gridelements_pi1') {
			$local_TS = array(
				'select.' => array(
					'pidInList' => $pObj->cObj->data['pid'],
					'where' => ' tx_gridelements_container='.$pObj->cObj->data['uid']
				),
				'table' => 'tt_content',
				'renderObj' => '< plugin.tx_directmail_pi1'
			);
			$renderedContent  = $pObj->cObj->cObjGetSingle('CONTENT',$local_TS);

		}
		return array($renderedContent );
	}
}