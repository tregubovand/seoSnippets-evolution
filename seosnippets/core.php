<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
	/**
	* Seo Snippets core class 
	*/
	class SeoSnippets
	{
		private $api, $docId, $docInfo, $title, $url, $descripton, $titleTV, $descriptionTV;
		const INTOTEXT_LENGTH = 250;

		function __construct($api){
			$this->api = $api;

			$this->docId = $api->documentObject['id'];
			$this->docInfo = $api->documentObject;

			$this->titleTV = $api->event->params['titleTV'];
			$this->descriptionTV = $api->event->params['descriptionTV'];

			$this->render();
			

		}

		private function getField(string $field){
			return $this->api->runSnippet('DocInfo',['docid'=>$this->docId,'field'=>$field]);
		}

		private function prepareData(){
			$this->url = $this->api->makeUrl($this->docId, '', '', 'full');

			$tvTitle = $this->placeholder($this->getField($this->titleTV));
			$tvIntro =  $this->placeholder($this->getField($this->descriptionTV));

			$this->title = strlen($tvTitle) > 0 ? $tvTitle : $this->docInfo['pagetitle'];
			$description = strlen($tvIntro) > 0 ? $tvIntro : $this->docInfo['introtext'];

			$this->description = strlen($description) > self::INTOTEXT_LENGTH ? substr($description,0,self::INTOTEXT_LENGTH) . '...' : $description;
		}

		private function placeholder(string $tvValue){
			preg_match("/\[\*(.+)\*\]/",$tvValue,$preg);
			if (!isset($preg[1])) {
				return $tvValue;
			}else{
				return $this->getField($preg[1]);
			}
		}
		private function render(){
			$this->prepareData();
			$title = $this->title;
			$description = strlen($this->description)>0 ? $this->description : "<i>Добавьте описание страницы</i>";
			$url = $this->url;
			echo <<<END
			<link rel="stylesheet" href="/assets/plugins/seosnippets/template/style.css">
			<div id="search_snippet_google">
				<div id="search_snippet_google_title">
					<a href="$url" id="search_snippet_google_title_link">$title</a>
				</div>
				<div id="search_snippet_google_link">$url</div>
				<div id="search_snippet_google_desc">$description</div>
			</div>
END;
		}
	}
?>


