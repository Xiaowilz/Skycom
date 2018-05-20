var keyword = document.getElementById('keyword');
var cari = document.getElementById('cari');
var container = document.getElementById('container');

keyword.addEventListener('keyup',function() 
{

	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if( xhr.readyState == 4 && xhr.status == 200){
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET', 'ajax/customer_search.php?keyword=' + keyword.value, true);
	xhr.send();

});

