
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="http://www.virendrachandak.com/techtalk/wp-content/themes/zbench/favicon.ico" />
	<title>Getting real client IP address in PHP - Demo - Virendra's Techtalk</title>
	<link rel="stylesheet" type="text/css" media="all" href="http://www.virendrachandak.com/techtalk/wp-content/themes/zbench/style.css" />
	<link href="http://www.virendrachandak.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="all" href="http://www.virendrachandak.com/demos/demo.css" />
	<meta name="description" content="Getting real client IP address in PHP - Demo - Virendra's Techtalk" /><link rel="canonical" href="http://www.virendrachandak.com/demos/getting-real-client-ip-address-in-php.php" />	<meta property="article:publisher" content="http://www.facebook.com/pages/Virendras-Techtalk/338923339568884" />
	<meta property="fb:admins" content="676690793" />
	<meta property="twitter:account_id" content="4503599629352810" />
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="@virendrachandak"/>
	<meta name="twitter:domain" content="Virendra&#039;s TechTalk"/>
	<meta name="twitter:creator" content="@virendrachandak"/>
	<link rel="publisher" href="https://plus.google.com/115357318350699889829/"/>
	<link rel="author" href="https://plus.google.com/+VirendraChandak" title="Virendra Chandak on Google+" />
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-32573884-1']);
	_gaq.push(['_gat._forceSSL']);
	_gaq.push(['_setSiteSpeedSampleRate', 100]);
	_gaq.push(['_trackPageview']);
	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();
	</script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
	<!-- BEGIN Tynt Script -->
	<script type="text/javascript">
	if(document.location.protocol=='http:'){
		var Tynt=Tynt||[];Tynt.push('cIw852sN4r44npacwqm_6r');
		(function(){var s=document.createElement('script');s.async="async";s.type="text/javascript";s.src='http://tcr.tynt.com/ti.js';var h=document.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);})();
	}
	</script>
	<!-- END Tynt Script -->
</head>
<body class="home blog">
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5BDV4G"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5BDV4G');</script>
	<!-- End Google Tag Manager -->
	<header id="nav">
		<div id="header1" style="">
			<h1><a href="http://www.virendrachandak.com/techtalk/">Virendra&#039;s TechTalk</a></h1>
		</div>
	</header>
	<section class="article_info_container">
		<div class="article_info clearfix">
			<div class="article_info_text">
				This is a demo page for <span class="demo_article_link"><a href="http://www.virendrachandak.com/techtalk/getting-real-client-ip-address-in-php-2/">Getting real client IP address in PHP</a></span>			</div>
			<div class="article_info_icons">
				<a id="article_link" class="icon fa fa-reply" data-title="Back to article" href="http://www.virendrachandak.com/techtalk/getting-real-client-ip-address-in-php-2/"></a><a id="source_link" class="icon fa fa-download" data-title="Download Source Code" href="http://www.virendrachandak.com/demos/getting-real-client-ip-address-in-php.zip"></a>			</div>
		</div>
	</section>
	<div id="demo-wrapper">
<style>
	.container{margin:0 auto;width:960px;}
	table{border-collapse:collapse;}
	table th, table td{border:1px solid #ccc;padding:3px 10px;text-align:left;vertical-align:top;}
	table th{background:#edeff0;}
</style>
<div class="container entry">
<?php

// Function to get the client ip address
function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}


// Function to get the client ip address
function get_client_ip_server() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

// Get the client ip address
$ipaddress = $_SERVER['REMOTE_ADDR'];

echo 'Your IP address (using $_SERVER[\'REMOTE_ADDR\']) is ' . $ipaddress . '<br />';
echo 'Your IP address (using get_client_ip_env function) is ' . get_client_ip_env() . '<br />';
echo 'Your IP address (using get_client_ip_server function) is ' . get_client_ip_server() . '<br />';
?>
	</div>
	<div class="clear"></div>
	<footer id="footer">
		<div id="footer-inside">
			<p>Copyright &copy; 2014 Virendra&#039;s TechTalk | <a href="http://www.virendrachandak.com/techtalk/disclaimer/">Disclaimer</a> | <a href="http://www.virendrachandak.com/techtalk/privacy/">Privacy</a></p>
			<span id="back-to-top">&uarr; <a href="#" rel="nofollow" title="Back to top">Top</a></span>
		</div>
	</footer>

	<!-- Quantcast Tag -->
	<script type="text/javascript">
	var _qevents = _qevents || [];
	(function() {
		var elem = document.createElement('script');
		elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
		elem.async = true;
		elem.type = "text/javascript";
		var scpt = document.getElementsByTagName('script')[0];
		scpt.parentNode.insertBefore(elem, scpt);
	})();
	_qevents.push({
		qacct:"p-dgZ4_09vZKC4w"
	});
	</script>
	<noscript>
		<div style="display:none;">
			<img src="//pixel.quantserve.com/pixel/p-dgZ4_09vZKC4w.gif" border="0" height="1" width="1" alt="Quantcast"/>
		</div>
	</noscript>
	<!-- End Quantcast tag -->
	<script>
	jQuery('#article_link').on('click', function() {
		ga('send', 'event', 'article', 'http://www.virendrachandak.com/techtalk/getting-real-client-ip-address-in-php-2/', 'go-to-article', 1);
		_gaq.push(['_trackEvent', 'article', 'http://www.virendrachandak.com/techtalk/getting-real-client-ip-address-in-php-2/', 'go-to-article', 1, true]);
	});
	jQuery('#source_link').on('click', function() {
		ga('send', 'event', 'download', 'http://www.virendrachandak.com/demos/getting-real-client-ip-address-in-php.zip', 'download-source', 1);
		_gaq.push(['_trackEvent', 'download', 'http://www.virendrachandak.com/demos/getting-real-client-ip-address-in-php.zip', 'download-source', 1, true]);
	});
	</script>
</body>
</html>
