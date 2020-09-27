$(document).ready(()=>{
    $('.newmenu').click(()=>{
		document.location = '/index.php?page=menu&id=newmenu';
    });

    $('.deletemenu').click(function() {
    	$('#menunain').submit();
    	document.location = '/index.php?page=menu';
    });
})