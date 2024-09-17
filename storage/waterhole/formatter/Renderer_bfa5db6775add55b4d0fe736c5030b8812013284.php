<?php

/**
* @package   s9e\TextFormatter
* @copyright Copyright (c) The s9e authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
class Renderer_bfa5db6775add55b4d0fe736c5030b8812013284 extends \s9e\TextFormatter\Renderers\PHP
{
	protected $params=[];
	protected function renderNode(\DOMNode $node)
	{
		switch($node->nodeName){case'EMOJI':$this->out.='<img alt="'.htmlspecialchars($node->textContent,2).'" class="emoji" draggable="false" src="https://cdn.jsdelivr.net/gh/twitter/twemoji@latest/assets/svg/'.htmlspecialchars($node->getAttribute('tseq'),2).'.svg">';break;case'br':$this->out.='<br>';break;case'e':case'i':case's':break;case'html:mark':$this->out.='<mark>';$this->at($node);$this->out.='</mark>';break;case'p':$this->out.='<p>';$this->at($node);$this->out.='</p>';break;default:$this->at($node);}
	}
	/** {@inheritdoc} */
	public $enableQuickRenderer=true;
	/** {@inheritdoc} */
	protected $static=['/html:mark'=>'</mark>','html:mark'=>'<mark>'];
	/** {@inheritdoc} */
	protected $dynamic=[];
	/** {@inheritdoc} */
	protected $quickRegexp='(<(?:(?!/)(EMOJI)(?: [^>]*)?>.*?</\\1|(/?(?!br/|p>)[^ />]+)[^>]*?(/)?)>)s';
	/** {@inheritdoc} */
	protected function renderQuickTemplate($id, $xml)
	{
		$attributes=$this->matchAttributes($xml);
		$html='';switch($id){case'EMOJI':$attributes+=['tseq'=>null];$textContent=$this->getQuickTextContent($xml);$html.='<img alt="'.htmlspecialchars($textContent,2).'" class="emoji" draggable="false" src="https://cdn.jsdelivr.net/gh/twitter/twemoji@latest/assets/svg/'.$attributes['tseq'].'.svg">';}

		return $html;
	}
}