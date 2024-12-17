	 $(document).on('click','.sch_ads_sub',function(event){
		var add_std=$('.sch_ads').serialize();
		var flag2=0;
		event.preventDefault();
		$('.sch_ads').find('.mando').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag2++;
			
			}
		});
		$('.sch_ads').find('.mando').each(function(){
			if($(this).val()=="default"){
				flag2++;
			}
		});
		var phoneNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
		var inputpn=$('.inputpn').val();
		//console.log(phoneNumber.test(inputpn));
		if((phoneNumber.test(inputpn)==false)){  
			alert('Enter valid Phone Number');  
			return false;
        }  
		if(flag2==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/add_std.php',
			data:{
				add_std:add_std
				}
		}).done(function(data){
			var arr=JSON.parse(data)
		  //  console.log(arr);
			if((arr['status'])!='GRN'){
				alert(arr['status']);
				//window.location.href = window.location.href;
			}
			else{
				alert('GR/SR number already exists please choose a new one')
			}
		})
		}
		else{
			alert('fll all the details');
		}
	});
	/* school>> show update for class*/
	 $(document).on('click','.sch_updc_show_sub',function(event){
		var sch_updc_show=$('.sch_updc_show').serialize();
		event.preventDefault();
		var flag1=0;
		event.preventDefault();
		$('.sch_updc_show').find('input').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag1++;
			
			}
		});
		$('.sch_updc_show').find('select').each(function(){
			if($(this).val()=="default"){
				flag1++;
			}
		});
		if(flag1==0){
			$.ajax({
				type:'POST',
				datatype:'html',
				url:'db/updc_show.php',
				data:{
					sch_updc:sch_updc_show
					}
			}).done(function(data){
				$('div.updc_show_div').html(data);
			})
		}
		else{
			alert('please fill required fields');
		}
	});
	$(document).on('click','.check-select-all',function(){
		 var checkboxes = new Array();
		 var val=$(this).val();
		  $('input[name='+val+']').attr('checked', this.checked);
	});
	
	/* updating the class*/
	$(document).on('click','.updc_class',function(event){
		var id=$(this).attr('id');
		var check = new Array();
		$("input[name="+id+"]:checked").each(function() {
		   check.push($(this).val());
		});
		var nclass=$("div."+id+" select[name='update-to']").val();
		var nmdm=$("div."+id+" select[name='update-mdm']").val();
		var nsec=$("div."+id+" select[name='update-sec']").val();
		event.preventDefault(event);
		if(check.length === 0){
				alert('please select Students');
		}
		else{
			$.ajax({
				type:'POST',
				datatype:'json',
				url:'db/updc.php',
				data:{
					updc:check,
					nclass:nclass,
					nmdm:nmdm,
					nsec:nsec
					}
			}).done(function(data){
				var sta=JSON.parse(data);
				alert(sta['status']);
				if(sta['status']=='suceed'){
				window.location.href = window.location.href;
				}
				})
		}
	});
		/* add fee */
	$(document).on('click','.sch_fee_grn_sub',function(event){
		event.preventDefault();		
		var fee_grn=$('.sch_fee_grn').serialize();
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/sch_fee_show.php',
			data:{
				fee_show:fee_grn
			},
			success:function(e){
				$('div.sch_fee_div').html(e);
				//window.location.reload();
			}
		});
	});

	$(document).on('click','.sch_fee_verify',function(){
		//alert('huhahahuha');
		event.preventDefault();
		var flag=0;
		var fee_chng_grn=$('span.fee_chng_grn').text();
		var fee_chng=$('.fee_chng_form').serialize();
		var fee_strn=$('.fee_str').text();
		//console.log(fee_strn);
		$('.fee_chng_form').find('input').each(function(){
			if($(this).val()==null||$(this).val()==""){
				flag++;
			}
		});
		if($('input.sel_mon').length){
			if(!$('input.sel_mon').is(':checked')){
				flag++;
			}
		}
		$('.fee_chng_form').find('select').each(function(){
			if($(this).val()=="default"){
				flag++;
			}
		});
		var fee_chng_amount=$('.fee_chng_form_hide_4').text();
		var fee_chng_lfee=$('.fee_chng_form_hide_2').text();
		//console.log("fee_chng_lfee",fee_chng_lfee);
		//console.log(flag);
		if(flag==0){
			$.ajax({
				type:'POST',
				datatype:'json',
				url:'db/fee_chng_pop.php',
				data:{
					fee_chng:fee_chng,
					fee_chng_grn:fee_chng_grn,
					fee_chng_lfee:fee_chng_lfee,
					fee_chng_amount:fee_chng_amount,
					fee_strn:fee_strn
				},
				success:function(e){
					var c=JSON.parse(e);
					if(c['status']=='suceed'){
						alert("Fee added");
						//window.print();
						console.log(c);
						$.ajax({
							type:'POST',
							datatype:'json',
							url:'db/print.php',
							data:{
								c:c
							},
							success:function(f){
								$('.print_rec').html(f);
								
							}
						});
						//$('.fee_chng_form').trigger('reset');
						
					}
					else{
						//event.preventDefault();
						$('.fee_chng_form').trigger('reset');
						//console.log('filed');
						alert('Duplicate entry, please delete duplicate value from "Search Student" to make changes');
						
					}
				}
			});
		}
		else{
			alert('please fill mandatory fields');
		}
	});
	
 function cheque(){
	var c_show=$('select[name="fee_chng_form_paym"]').val();
	
	if(c_show=='cheque'){	
	$('input[name="fee_chng_form_chq"]').css({'visibility':'visible'});
	}
	else{
		$('input[name="fee_chng_form_chq"]').css('visibility','hidden');
	}
}
function fee_type(){
	var fee_chng_mdm=$('span.fee_chng_mdm').text();
	var fee_chng_std=$('span.fee_chng_std').text();
	var fee_chng_grn=$('span.fee_chng_grn').text();
	var fee_chng_type=$('select[name="fee_chng_form_fee_type"]').val();
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'db/fee_chng_type.php',
		data:{
			fee_chng_type:fee_chng_type,
			fee_chng_mdm:fee_chng_mdm,
			fee_chng_std:fee_chng_std,
			fee_chng_grn:fee_chng_grn
		},
		success:function(e){
			var chck=JSON.parse(e);
			//console.log(chck);
			if(chck['status']=="suceed"){
				$('.fee_chng_form_hide').html(chck['data']);
				$('.fee_chng_form_hide_1').html(chck['fee']);
				$('.fee_chng_form_hide_4').html(chck['fee']);
				$('.fee_chng_form_hide_5').html(chck['lfee']);
				$('.fee_chng_form_last_date').html(chck['late_date']);
				//$('.fee_chng_form_hide_3').html(chck['late']);
			}
			else{
				alert('No fee found to matching criteria, please add fee via admin panel');
				$('.fee_chng_form').trigger('reset');
			}
		}
	});
}
/* add fee -> amount monthly fee*/
 $(document).on('click','.sel_mon',function(){
	var count=0;
	$('span.fee_chng_form_hide').find('.sel_mon').each(function(){
		if($(this).is(':checked')){
			count++;
		}
	});
	var val=$('.fee_chng_form_hide_4').text();
	val=val*count;
	if(count>0){
		$('.fee_chng_form_hide_1').html(val);
	}
	var late_span=parseInt($('.fee_chng_form_hide_2').text());
	console.log(late_span);
	$('.fee_chng_form_tot_am').html(late_span+val);
 });
 /*add fee-> late fee column */
 $(document).on('change','select[name="fee_chng_form_ot"]',function(){
	if($(this).val()=='no'){
		
			$('.fee_chng_form_hide_2').css('display','inherit');
			$('.fee_chng_form_hide_5').css('display','inherit');
			var d = new Date();
			var month = d.getMonth()+1;
			var day = d.getDate();
			//console.log(day,month);
			var dateTo = d.getFullYear() + '-' +
				((''+month).length<2 ? '0' : '') + month + '-' +
				((''+day).length<2 ? '0' : '') + day;
			//console.log(output);
			var dateFrom=$('.fee_chng_form_last_date').text();
			var days = days_between(dateTo, dateFrom);
		
		
	}
	else{
		$('.fee_chng_form_hide_2').css('display','none');
		$('.fee_chng_form_hide_5').css('display','none');
		var days=0;
	}
	
	//console.log(days);
	var fee_l=$('.fee_chng_form_hide_5').text();
	//console.log(fee_l*days);
	$('.fee_chng_form_hide_2').html(fee_l*days);
	var fee_b=$('.fee_chng_form_hide_1').text();
	
	$('.fee_chng_form_tot_am').html(parseInt(fee_l*days)+parseInt(fee_b));
 });
 
 function days_between(dateTo, dateFrom) {

            // The number of milliseconds in one day
            console.log(dateTo,dateFrom);
			var a=dateTo.split('-');
			var b=dateFrom.split('-');
			//console.log(a[1],b[1]);
			if(a[1]!=b[1]){
				var day1= Math.round(((new Date(b[0], b[1]))-(new Date(b[0], b[1]-1)))/86400000);
				var day2=b[2];
				return day1-day2;
			}
			var ONE_DAY = 1000 * 60 * 60 * 24;

            date1 = new Date(dateTo);
            date2 = new Date(dateFrom);

            // Convert both dates to milliseconds
            var date1_ms = date1.getTime();
            var date2_ms = date2.getTime();

            // Calculate the difference in milliseconds
            var difference_ms = (date1_ms - date2_ms);
			
            // Convert back to days and return
			console.log(Math.round(difference_ms / ONE_DAY));
			if(Math.round(difference_ms / ONE_DAY)<0){
				return 0;
			}
            return Math.round(difference_ms / ONE_DAY);

        }
 /* add feee-> late fee column->monthly fee*/
 $(document).on('click','.sel_late',function(){
	//alert('hurrah');
	$('.fee_chng_form_hide_2').css('display','inherit');
	$('.fee_chng_form_hide_5').css('display','inherit');
	var count=0;
	var fee_d=($('.fee_chng_form_last_date').text()).split('-');
	var count_m=0;
	var mon_arr=['Jul','Aug','Sep','Oct','Nov','Dec','Jan','Feb','Mar','Apr','May','Jun'];
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var days;
	var c_month;
	var fee_l=0;
	var l_fee_tot=0;
	if(month<=6){
		c_month=month+6;
	}
	else{
		c_month=month-6;
	}
	var fee_str= '';
	$('span.fee_chng_form_hide').find('.sel_late').each(function(){
		var c_mon=$(this).val();
		if($(this).is(':checked')){
			count++;
			//var i;
			var cur_mon;
			$(mon_arr).each(function(i,v){
				//console.log(i,v);
				if(c_mon===v){
					cur_mon = (++i);
				}
			});
			
			//console.log(cur_mon,c_month, month);
			//console.log($(cur_mon));
			if(cur_mon>c_month){
				 var two = $(this).attr("checked", false);
				 alert("wrong values selected for late fees");
				 days=0;
			}
			else{
				if(cur_mon<=6){
				cur_mon=cur_mon+6;
				}
				else{
					cur_mon-=6;
				}
				var dateTo = d.getFullYear() + '-' +
					((''+month).length<2 ? '0' : '') + month+ '-' +
					((''+day).length<2 ? '0' : '') + day;
				var dateFrom=$('.fee_chng_form_last_date').text();
				dateFrom=dateFrom.slice(0,4)+"-"+(((''+cur_mon).length<2 ? '0' : '')+cur_mon)+"-"+dateFrom.slice(8,10);
//				console.log(dateTo,dateFrom);
				days = days_between(dateTo, dateFrom);
				fee_l=$('.fee_chng_form_hide_5').text();
				count_m++;
			}	
			$(this).parent().parent().find('.sel_mon').each(function(){
				if(!($(this).is(':checked'))){
					console.log($(this).parent().parent().find('.sel_late'));
					$(this).parent().parent().find('.sel_late').attr("checked", false);
					alert("wrong values selected for late fees");
					days=0;
				}
			});
			if(days!=0){
				l_fee_tot+=parseInt(fee_l*days);
				fee_str+=(fee_l*days)+" , ";
			}
			//console.log($(this).parent().parent());
		}
		
	});
	//console.log(days);
	//console.log(l_fee_tot);
//	console.log(fee_str);
	//$('.fee_str').html('fsfs');
	$('.fee_str').html(fee_str);
	$('.fee_chng_form_hide_2').html(l_fee_tot);
	var fee_b=$('.fee_chng_form_hide_1').text();	
	$('.fee_chng_form_tot_am').html(parseInt(l_fee_tot)+parseInt(fee_b));
	
	if(count>0){
		$('.fee_chng_form_hide_3').html(l_fee_tot);
		//$('.fee_chng_form_hide_3').css('display','inherit');
	}
	else{
		$('.fee_chng_form_hide_3').css('display','none');
	}
	
 });
 
 $(document).on('click','.print_add_fee',function(){
	window.print();
 });
/* search students*/
$(document).on('click','.sch_src_sub',function(event){
	event.preventDefault();		
	var sch_src=$('.sch_src').serialize();
	flag=0;
	$('.sch_src').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag++;
		
		}
	})
	if(flag==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/src_std.php',
			data:{
				sch_src:sch_src,
				count:'1'
			},
			success:function(e){
				$('div.search-div').html(e);
				//window.location.reload();
			}
		});
	}
	else{
		alert('please fill GR/SR number');
	}
});

/*search student by name */
$(document).on('click','.sch_src_name_sub',function(event){
	event.preventDefault();
	var sch_src_name=$('.sch_src_show_name').serialize();
	var flag7=0;
	$('.sch_src_show_name').find('input').each(function(){
		if($(this).val()==null||$(this).val()==""){
			flag7++;
		}
	});
	if(flag7==0){
		$.ajax({
			type:'POST',
			datatype:'json',
			url:'db/src_std_name.php',
			data:{
				sch_src_name:sch_src_name
			},
			success:function(e){
				$('div.sch_src_details_name').html(e);	
			}
		});	
	}
	else{
		alert('please Enter Name');
	}
});

$(document).on('click','.name-search-2-sub',function(event){
	event.preventDefault();
	//console.log($(this).attr('id'));
	var sch_src=$('.'+$(this).attr('id')).text();
	//console.log(sch_src);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'db/src_std.php',
		data:{
			count:'2',
			sch_src:sch_src
		},
		success:function(e){
			$('div.search-div').html(e);
			//window.location.reload();
		}
	});

});


$(document).on('click','.delete-fee',function(event){
	event.preventDefault();
	var id=$(this).attr('id');
//	console.log(id);
	var fee_rec=$('.rec-'+id).text();
	var fee_typ=$('.feet-'+id).text();
	var fee_mon=$('.mon-'+id).text();
	var fee_grn=$('.src_grn').text();
	//console.log(fee_typ);
	$.ajax({
		type:'POST',
		datatype:'json',
		url:'db/delete-fee.php',
		data:{
			fee_typ:fee_typ,
			fee_grn:fee_grn,
			fee_rec:fee_rec,
			fee_mon:fee_mon
		},
		success:function(e){
		//console.log(id);
			$('ul.'+id).slideUp('slow');
			alert('Fee entry Deleted');
		}
	});
});

 /* revenue.php*/
$(document).on('click','.rev-revenue',function(){
	$.ajax({
		url:'db/rev-revenue.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('.rev-div-main').html(e);
		}
	});
});
$(document).on('click','.rev-recieve',function(){
	$.ajax({
		url:'db/rev-recieve.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('.rev-div-main').html(e);
		}
	});
});
$(document).on('click','li.logout-span',function(){
	//alert('here');
	$.ajax({
		url:'logout.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			alert('successfully logged out');
			window.location='index.php';
		}
	});
});

/* Transaction Page*/
$(document).on('click','.srch-fee-sub',function(){
	var strdate=$('input[name="srch-str-date"]').val();
	var enddate=$('input[name="srch-end-date"]').val();
	//console.log(strdate);
	$.ajax({
		url:'db/tran.php',
		method:'POST',
		datatype:'json',
		data:{
			enddate:enddate,
			strdate:strdate
		},
		success:function(e){
			$('div.show-by-date').html(e);
		}
	});
});
$(document).on('click','.srch-mode-sub',function(){
	//alert('here');
	event.preventDefault();
	var mode=$('select.srch-mode-name').val();
	//console.log(mode);
	$.ajax({
		url:'db/tran-name.php',
		method:'POST',
		datatype:'json',
		data:{
			mode:mode		},
		success:function(e){
			$('div.show-by-date').html(e);
		}
	});
});

/* Pending Transactions*/

$(document).on('click','.rev-pend',function(){
	//alert('here');
	$.ajax({
		url:'db/pend.php',
		method:'POST',
		datatype:'json',
		success:function(e){
			$('div.rev-div-main').html(e);
		}
	});
});
 /* division dynamic*/
function div_count(){
	var mdm=$("select[name='sch_ads_mdm']").val();
	var std=$("select[name='sch_ads_std']").val();
//	console.log(mdm,std)
	$.ajax({
		url:'db/div_count.php',
		method:'POST',
		datatype:'json',
		data:{
			mdm:mdm,
			std:std
		},
		success:function(e){
			var div=JSON.parse(e);
			var block='Division: <select name="sch_ads_div" class="mando">';
			$.each(div['data'],function(index,value){
				block=block+'<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("div.div-update-show").html(block);
		}
	});
}

function div_count1(){
	var mdm=$("select[name='sch_updc_show_mdm']").val();
	var std=$("select[name='sch_updc_show_std']").val();
	//console.log(mdm,std)
	$.ajax({
		url:'db/div_count.php',
		method:'POST',
		datatype:'json',
		data:{
			mdm:mdm,
			std:std
		},
		success:function(e){
			var div=JSON.parse(e);
			var block='Division: <select name="sch_updc_show_div" class="mando">';
			$.each(div['data'],function(index,value){
				block=block+'<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("div.div-update-show").html(block);
		}
	});
}
$(document).on('change','.update-to',function(){
	var mdm=$("select[name='update-mdm']").val();
	var std=$("select[name='update-to']").val();
	//console.log(mdm,std)
	//alert('here');
	$.ajax({
		url:'db/div_count.php',
		method:'POST',
		datatype:'json',
		data:{
			mdm:mdm,
			std:std
		},
		success:function(e){
			var div=JSON.parse(e);
			var block='Division: <select name="sch_updc_show_div" class="mando">';
			$.each(div['data'],function(index,value){
				block=block+'<option value='+value+'>'+value+'</option>'
			});
			block=block+'</select>';
			//console.log(block);
			$("select[name='update-sec']").html(block);
		}
	});
});



