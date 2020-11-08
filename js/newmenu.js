$(document).ready(function() {

let arr_ru = ['а', 'б', 'ц', 'д', 'е', 'ф', 'г', 'ш', 'и', 'ж', 'к', 'л', 'м', 'н', 'о', 'п', 'у', 'р', 'с', 'т', 'у', 'в', 'ю', 'икс', 'ю', 'з','ч','ы',' '];
let arr_RU = ['А', 'Б', 'Ц', 'Д', 'Е', 'Ф', 'Г', 'Ш', 'И', 'Ж', 'К', 'Л', 'М', 'Н', 'О', 'П', 'У', 'Р', 'С', 'Т', 'У', 'В', 'Ю', 'ИКС', 'Ю', 'З','Ч','Ы',' '];

let arr_en = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'u', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','се','i','_'];
let arr_EN = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'U', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'CE', 'I', '_'];

let en = arr_en.concat(arr_en);
let ru = arr_ru.concat(arr_RU);
   $('#names').bind('input',function(e) {
function grtReplaceInput(e,en,ru) {
	let d = [];
	let txt = e.target.value.split('');
	//ru
    let df = txt.map(function(x,i) {return ru.indexOf(x)});
   //en
    let dfe = txt.map(function(x,i) {return en.indexOf(x)});
	for (var i = 0; i < 100; i++) {
  	if(en[df[i]] !== undefined){
  		d[i] = en[df[i]];
  	}
  	if(en[dfe[i]] !== undefined){
  		d[i] = en[dfe[i]];
  	}
  }
	if (d.join('') == 'Glavna' || d.join('') == 'glavna'){
		return '/';
	}else{
		return d.join('');
	}

}

$('#alias').val(grtReplaceInput(e,en,ru))
});
$('.new_menu_category_input')
.click(function(e) {
   $('#new_menu_category').css({display:'block'});

   console.log($('#new_menu_category'))
});
$('#new_menu_category div').click(function(e) {
   $('#new_menu_category').css({ display: 'none' });
   $('.new_menu_category_parent_input').val($.trim(e.target.innerText));
   $('.new_menu_category_parent').val($.trim($(this).children('.new_menu_category_linck').text()));


});




});