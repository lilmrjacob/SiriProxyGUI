<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="assets/style.css"/>
<title>SiriProxy Gui</title>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/SiriProxyGui.js" type="text/javascript"></script>
<script>
	$(document).ready(function(e) {
		init();
		get_logs();
		setInterval("get_logs();", 50);
       	setInterval("init();",600);
    });
</script>
</head>

<body>
	<div class="container">
    	<div class="window">
        <div class="window_inner">
    	<div class="top">
        	<p>SiriProxy Gui</p>
        </div>
        <div class="middle">
        	<table style="width:100%; text-align:center;">
            	<tr>
                    <th width="50%">SiriProxy</th>
                </tr>
                <tr>
                    <td id="proxy_stats"></td>
                </tr>
                <tr>
                    <td><div class="inline"><input type="button" onmouseup="startProxy()" value="Start Server" /><input type="button" onmouseup="killall()" value="Stop Server" /></div><div id="proxyLoad" class="inline spinner"></div></td>
                </tr>
                <tr>
                    <td><div id="proxyData" class="konsole"></div><input type="button" onmouseup="clear_log()" value="Clear" /></td>
                </tr>
            </table>
        </div>
        <hr />
    	<div class="bottom">
        	<h3 style="text-align:left;">SiriProxy Tools</h3>
            <div id="certs_exists"></div>
            <div id="checker"></div>
            <div><input type="button" onmouseup="wipe_keys()" value="Wipe Keys" /></div>
            <div></div>
			<br />	
            <h3 style="text-align:left;">Certificate Generator</h3>
            <div class="para">Enter the internal IP address/external IP address/host name of your server</div>
            <div id="checker"></div>
            <div class="inline"><input type="text" id="server_text_in" style="padding:7px; border:1px solid #000; width:190px;" placeholder="myserver.mydomain.com" /><input type="button" onmouseup="gen_cert_conf()" value="Generate Config File" /></div>
            <div class="green inline" id="server_text_result"></div>
            <div class="para"><a href="#">Click here for certificates how to</a></div>
            <div></div>
			<br />
			<h3 style="text-align:left;">DNS Generator</h3>
            <div class="para">Enter the internal IP of this server (this will be used to capture 4S certificates)</div>
            <div id="checker"></div>
            <div class="inline"><input type="text" id="dns_text_in" style="padding:7px; border:1px solid #000; width:190px;" placeholder="192.168.0.32" /><input type="button" onmouseup="gen_dns_conf()" value="Generate DNS Config" /></div>
            <div class="green inline" id="dns_text_result"></div>
            <div></div>
        </div>
        </div>
        </div>
        </div>
        <div class="hidden" id="temp"></div>
        <div class="hidden" id="temp2"></div>
        <div class="footer">SiriProxyGui - Nick Whyte 2011 - nickwhyte.com</div>
    </div>
</body>
</html>