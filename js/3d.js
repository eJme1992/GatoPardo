var Conclave=(function(){
	var buArr =[],arlen;
	return {
		init:function(){
			this.addCN();
			this.clickReg();
		},
		addCN:function(){
			var buArr=["holder_bu_center","holder_bu_awayL1","holder_bu_awayR1"];
			$('.conclave').each(function( index ) {
				con = 'c'+(index+1);
				$(this).attr('data-conc',con);
				buArr[con]=["holder_bu_center","holder_bu_awayL1","holder_bu_awayR1"];
				var cont = $(this);
				var nodes = cont.find('.tresds').length;
				for(var i=1;i<=nodes;++i){
					if(i==1){
						cont.find("#bu"+i).removeClass().addClass("holder_bu_center holder_bu");
					}else if(i == 2){
						cont.find("#bu"+i).removeClass().addClass("holder_bu_awayR1 holder_bu");
					}else if(i == nodes){
						cont.find("#bu"+i).removeClass().addClass("holder_bu_awayL1 holder_bu");
					}else{
						cont.find("#bu"+i).removeClass().addClass("holder_none holder_bu");
					}
				}
			}).promise().done( function(){$(this).fadeIn() } );
		},
		clickReg:function(){
			/* $('.conclave').each(function( index ) {
				var con = $(this).attr('data-conc');
				$(this).find(".holder_bu").each(function(){
					buArr[con].push($(this).attr('class'));
				});
				arlen=buArr[con].length;
				for(var i=0;i<arlen;++i){
					buArr[con][i]=buArr[con][i].replace(" holder_bu","")
				};
			})
			$(".holder_bus").click(function(buid){
				var con = $(this).parent().prev().attr('data-conc');
				var me=this,id=this.id||buid,joId=$("#"+id),joCN=joId.attr("class").replace(" holder_bu","");
				var cpos=buArr.indexOf(joCN),mpos=buArr.indexOf("holder_bu_center");
				if(cpos!=mpos){
					tomove=cpos>mpos?arlen-cpos+mpos:mpos-cpos;
					while(tomove){
						var t=buArr.shift();
						buArr.push(t);
						for(var i=1;i<=arlen;++i){
							$("#bu"+i).removeClass().addClass(buArr[con][i-1]+" holder_bu");
						}
						--tomove;
					}
				}
			}) */
		},
		auto:function(){
			for(i=1;i<=1;++i){
				$(".holder_bu").delay(4000).trigger('click',"bu"+i).delay(4000);
				console.log("called");
			}
		}
	};
})();

$(document).ready(function(){
	window['conclave']=Conclave;
	Conclave.init();
	$('.next_3d').click(function(){
		var conc = $(this).parent().prev();
		var flag=0;
		var nume = conc.find('.holder_bu_center').attr('id');
		nume = parseInt(nume.replace('bu',''));
		var nodes = conc.find('.holder_bu').length;
		conc.find('.holder_bu').each(function( index ) {
			index++;
			if(nume < (nodes-1)){
				if(index == nume){
					$(this).removeClass().addClass("holder_bu_awayL1 holder_bu");
				}else if(index == (nume+1)){
					$(this).removeClass().addClass("holder_bu_center holder_bu");
				}else if(index == (nume+2)){
					$(this).removeClass().addClass("holder_bu_awayR1 holder_bu");
				}else{
					$(this).removeClass().addClass("holder_none holder_bu");
				}
			}else if(nume == (nodes-1)){
				if(index == nume){
					$(this).removeClass().addClass("holder_bu_awayL1 holder_bu");
				}else if(index == (nume+1)){
					$(this).removeClass().addClass("holder_bu_center holder_bu");
				}else if(index == (1)){
					$(this).removeClass().addClass("holder_bu_awayR1 holder_bu");
				}else{
					$(this).removeClass().addClass("holder_none holder_bu");
				}
			}else if(nume == nodes){
				if(index == nume){
					$(this).removeClass().addClass("holder_bu_awayL1 holder_bu");
				}else if(index == (1)){
					$(this).removeClass().addClass("holder_bu_center holder_bu");
				}else if(index == (2)){
					$(this).removeClass().addClass("holder_bu_awayR1 holder_bu");
				}else{
					$(this).removeClass().addClass("holder_none holder_bu");
				}
			}
		});
	});
	$('.prev_3d').click(function(){
		var conc = $(this).parent().prev();
		var nume = conc.find('.holder_bu_center').attr('id');
		nume = parseInt(nume.replace('bu',''));
		var nodes = conc.find('.holder_bu').length;
		conc.find('.holder_bu').each(function( index ) {
			index++;
			if(nume <= nodes && nume > 2){
				if(index == nume){
					$(this).removeClass().addClass("holder_bu_awayR1 holder_bu");
				}else if(index == (nume-1)){
					$(this).removeClass().addClass("holder_bu_center holder_bu");
				}else if(index == (nume-2)){
					$(this).removeClass().addClass("holder_bu_awayL1 holder_bu");
				}else{
					$(this).removeClass().addClass("holder_none holder_bu");
				}
			}else if(nume == 2){
				if(index == nume){
					$(this).removeClass().addClass("holder_bu_awayR1 holder_bu");
				}else if(index == (nume-1)){
					$(this).removeClass().addClass("holder_bu_center holder_bu");
				}else if(index == nodes){
					$(this).removeClass().addClass("holder_bu_awayL1 holder_bu");
				}else{
					$(this).removeClass().addClass("holder_none holder_bu");
				}
			}else if(nume == 1){
				if(index == nodes-1){
					$(this).removeClass().addClass("holder_bu_awayL1 holder_bu");
				}else if(index == nodes){
					$(this).removeClass().addClass("holder_bu_center holder_bu");
				}else if(index == (nume)){
					$(this).removeClass().addClass("holder_bu_awayR1 holder_bu");
					
				}else{
					$(this).removeClass().addClass("holder_none holder_bu");
				}
			}
		});
	});
	$('.click_th').click(function(){
		var item = $(this).attr('data-id');
		var flag = true;
		do{
			var next = $('.holder_bu_awayR1').attr('id');
			$('#next_3d').trigger('click').delay(10000);
			if(next == item){
				flag = false;
			}
		}while(flag==true)
		/*var now = $('.holder_bu_center').attr('id');
		now = now.replace('bu','');
		
		var item = $(this).attr('data-id');
		$('#'+item).trigger('click');*/
	})
})