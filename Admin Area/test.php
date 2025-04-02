<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title>Autocomplete with Recent Searches using JavaScript PHP MySQL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="container">
    	<h2 class="text-center mt-4 mb-4">Autocomplete with Recent Searches using JavaScript PHP MySQL</h2>
    	<div class="row mt-5 mb-5">
    		<div class="col col-sm-2">&nbsp;</div>
    		<div class="col col-sm-8">
    			<div class="dropdown">
    				<input type="text" name="search_boxcust" class="form-control form-control-lg" placeholder="Type Here..." id="search_boxcust" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onkeyup="javascript:load_datacust(this.value)" onfocus="javascript:load_search_history()" />
    				<span id="search_resultcust"></span>
    			</div>
    		</div>
    	</div>    	
    </div>
</body>
</html>

<script>
function load_datacust(query)
{
	if(query.length > 2)
	{
		var form_data = new FormData();

		form_data.append('queryc', query);

		var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'process_data.php');

		ajax_request.send(form_data);

		ajax_request.onreadystatechange = function()
		{
			if(ajax_request.readyState == 4 && ajax_request.status == 200)
			{
				var response = JSON.parse(ajax_request.responseText);

				var html = '<div class="list-group">';

				if(response.length > 0)
				{
					for(var count = 0; count < response.length; count++)
					{
						html += '<a href="#" class="list-group-item list-group-item-action" onclick="get_text(this)">'+response[count].cust_name+'</a>';
					}
				}
				else
				{
					html += '<a href="#" class="list-group-item list-group-item-action disabled">No Data Found</a>';
				}

				html += '</div>';

				document.getElementById('search_resultcust').innerHTML = html;
			}
		}
	}
	else
	{
		document.getElementById('search_resultcust').innerHTML = '';
	}
}
function get_textcust(event)
{
	var string = event.textContent;
	
	document.getElementsByName('search_boxcust')[0].value = string;
	
	document.getElementById('search_resultcust').innerHTML = '';

	

	

}
</script>