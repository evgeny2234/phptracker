var data;
	function onAjaxSuccess(data) {
	  // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
	    function loadJSON(callback) {
		    var request = new XMLHttpRequest();
		    request.overrideMimeType("application/json");
		    request.open('GET', 'mail_source.json', true);
		    request.onreadystatechange = function() {
		        if (request.readyState == 4 && request.status == "200")
		        {
		            callback(request.responseText);
		        }
		    }
		request.send(null);
		}
		loadJSON(function(response) {
			data = JSON.parse(response);
			console.log(data);
			function creTable() {
			    //var mass = ['as','city','country','countryCode','isp','lat','lon','org','query','region','regionName','status','timezone','referer','date'];
			    var mass = ['as','city','country','countryCode','isp'/*,'lat','lon'*/,'org','query','region','regionName','status','timezone','referer','date'];
				for(i=0;i<data.length;i++) {
					$('#myTable').append('<tr></tr>');
					for(j=0;j<13;j++) {
				        $('#myTable > tr:last').append('<td>'+data[i][mass[j]]+'</td>');
					}
				}
			}
			creTable();
		});
	}
	onAjaxSuccess();