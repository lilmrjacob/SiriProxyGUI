function init() {
		proxy_stat();
		checkcerts();
		
		//console.log('init was called');
	}
	function setpassword() {
		pass = $('#newpass').val();
		$.post('assets/php/updateht.php', {password:pass}, function(e) {
			history.go(0)
		}); 
	}
	function startProxy() {
		$("#proxyLoad").html('<img src="assets/images/load.gif" />');
		
		$.get('assets/php/startProxy.php', function(e) {
			setTimeout("$('#proxyLoad').html('');",1000);
			$("#captureData").html('');
			$("#proxyData").html('');
			get_logs()
			
		});	
	}
	function killall() {
		$("#captureLoad, #proxyLoad").html('<img src="assets/images/load.gif" />');
		$.get('assets/php/killall.php', function(e) {
			setTimeout("$('#captureLoad, #proxyLoad').html('');",1000);
		});	
	}
	function nl2br_js(myString){
		return myString.replace( /\n/g, '<br />\n' );
	}
	function get_logs() {
		console.log('Logs are being loaded.. Please Wait');
		$.get('SiriProxy/log.txt', function (content) {
				content = nl2br_js(content);
				$('#temp2').html(content);	
				display = $("#proxyData").html();
				temp = $("#temp2").html()
				if (display == temp) {
					//console.log('We don\'t need to update');
					//well what we have already, is fine, no need to update
				}
				else {
					console.log('it doesnt match. We need to update the logs');
					$('#proxyData').html(content);
					$('#proxyData').animate({ scrollTop: ($('#proxyData')[0].scrollHeight + 200) }, "fast");	
				}
		});
	}
	function proxy_stat() {
		$.get('assets/php/proxystatus.php',function(data) {
			if (data == '1') {
			value = '<p class="green">Online</p>';
			}
			else {
			value = '<p class="red">Offline</p>';	
			}
			$('#proxy_stats').html(value)	
		});
		
	}
	function gen_cert_conf() {
		var val  = $('#server_text_in').val();
		$.post('/assets/php/generate_openssl.php', {commonname:val}, function(e) {
			//alert(e);
			$('#server_text_in').val('')
			$('#server_text_result').html('Done!')		
		});
	}
	function clear_log() {
		$.get('assets/php/clearlog.php');
	}
	function wipe_keys() {
		$.get('assets/php/wipekeys.php');
	}
	function gen_dns_conf()  {
	var addr  = $('#dns_text_in').val();
		$.post('/assets/php/generate_dns.php', {addr:addr}, function(e) {
		$('#dns_text_in').val('')
		$('#dns_text_result').html('Done!')		
	});
	}
	function checkcerts() {
			$.get('assets/php/check.php', function(data) {
					if (data == 1) {
						result = 'iPhone 4S Certificates: <p class="green inline">Present</p><p class="note shaddow">Yay! This means you can use these on other devices now!</p><p id="copy_result" class="inline"></p>'
					}
					else {
						result = 'iPhone 4S Certificates: <p class="red inline">Do not exist</p><p class="note shaddow">Are you sure you have redirected your iPhone 4S to your SiriCapture Server?</p>'
					}
					$('#checker').html(result)
			});
	}
