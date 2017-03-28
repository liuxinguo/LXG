      $('.server_list').pages('a',{
				size:96
			},'.pubTab',function(c,l,s){
				var str='',r,x,y;
				for(var i=1;i<=c;i++){
					r=$.fn.pages.prototype.get_range(i,c,s);
					x=$(".server_list a"+r[1]+":first").attr('href');
					x=x.substr(x.indexOf('server=') + 8);
					y=$(".server_list a"+r[1]+":last").attr('href');
					y=y.substr(y.indexOf('server=') + 8);
					str+='<a class="pages_each" pages_number="'+i+'" href="javascript:;">'+y+'-'+x+'</a>';
				}
			return str;
			});