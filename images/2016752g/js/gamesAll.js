window.onload = function(){
		var s_val={type:'',abc:'',name:''};
var list =$('.game_list li');
var gc_input = $('#gc_search');
var gc_btn = $('#gc_btn');

function choose_game(){
	list.hide();
	list.each(function(){
		var j_type = $(this).attr('j-type');
		j_type = j_type && j_type.toLowerCase();
		var j_abc =$(this).attr('j-abc');
		j_abc = j_abc && j_abc.toLowerCase().substr(0,1);
		if(	(!s_val.abc || (j_abc && s_val.abc.indexOf(j_abc)>-1) ) && (!s_val.type || s_val.type ==j_type) ){
			$(this).show();
		}
	});
}
function choose_game2(){
	var name = s_val.name ? s_val.name.toLowerCase() : '';
	list.hide();
	list.each(function(){
		var j_abc =$(this).attr('j-abc');
		j_abc = j_abc && j_abc.toLowerCase();
		var j_name =$(this).attr('j-name');
		j_name = j_name && j_name.toLowerCase();
		name && j_name && j_name.indexOf(name)>-1 && $(this).show();
		name && j_abc && j_abc.indexOf(name)>-1 && $(this).show();

	});
}
function reset(){
	s_val.type=s_val.abc='';
	$('#game_type li>a').removeClass('selected').eq(0).addClass('selected');
	$('#game_abc li>a').removeClass('selected').eq(0).addClass('selected');
}

inpText(gc_input);
gc_btn.click(function(){
	if(gc_input.val() !='' && gc_input.val()!=gc_input.data('txt')){
		reset();
		s_val.name =gc_input.val();
		choose_game2();
	}
});
reset();
SPnav({nav:$('#game_type li>a'),act:'click',classname:'selected'},function(o){
	s_val.type =$(o).attr('j-data') ? $(o).attr('j-data').toLowerCase() : '';
	choose_game();
});
SPnav({nav:$('#game_abc li>a'),act:'click',classname:'selected'},function(o){
	s_val.abc =$(o).attr('j-data') ? $(o).attr('j-data').toLowerCase() : '';
	choose_game();
});
SPnav({nav:$('.gc_bang .bang-hd').find('li'),tab:$('.gc_bang .tab-arrow'),con:$(".gc_bang .bang-list>ul"),type:'arrow'});
}