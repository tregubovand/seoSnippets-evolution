<div id="search_snippet_google">
	<div id="search_snippet_google_title">
		<a href="" id="search_snippet_google_title_link"><?= $title ?></a>
	</div>
	<div id="search_snippet_google_link"><?= $url ?></div>
	<div id="search_snippet_google_desc"><?= $description ?></div>
</div>
<style>
	#search_snippet_google {
	    width: 600px;
	    font-family: Arial;
	    position: fixed;
	    right: 0;
	    bottom: 0;
	    padding: 20px;
	    box-shadow: 2px 2px 10px 3px rgba(0, 0, 0, 0.28);
	    margin: 30px;
	    transition: .5s;
	    /*pointer-events: none;*/
	    opacity: .95;
	}
	#search_snippet_google_title_link {
	    color: #1a0dab;
	    text-decoration: none;
	    font-size: 18px;
	}
	#search_snippet_google_title_link:visited {
	    color: #609;
	}
	#search_snippet_google_title_link:hover {
	    text-decoration: underline;
	}
	#search_snippet_google_link {
	    color: #006621;
	    font-size: 14px;
	}
	#search_snippet_google_desc {
	    font-size: 13px;
	    line-height:18px;
	}
	.sectionBody {
	    margin-bottom: 170px;
	}
</style>