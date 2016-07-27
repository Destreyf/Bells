// JavaScript Document
function ajaxModal(url,object){
	if(typeof(object) == 'undefined'){
		object = $("#modal");
	}
	$.get((url.search(/http/) == -1 ? baseurl : '')+url,{},function(data){
		object.html(data.body);
		object.dialog("option", "title", data.title);
		object.dialog('open');
	},'json');
}
function update_cal(event,bulk){
	bulk = bulk || false;
	var mypost = {
		dates: event.idBellDate,
		from: $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd'),
		to: $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd'),
		zone: $("#Zone").val(),
		idBellProfile: event.idBellProfile,
		force: event.force || false
	};
	$.post(baseurl+'calendar/add/'+event.idBellProfile,mypost,function(data){
		if(typeof(data.logged_out) != 'undefined'){
			alert('You are currently logged out, press ok to proceed to the login screen.');
			window.location.href=baseurl+'login';
		} else {
			if(!data.status){
				//We need to confirm this!
				if(confirm("A custom bell schedule has already been setup for this date, press OK to continue, or press cancel to abort")){
					mypost.force = true;
					$.post(baseurl+'calendar/add/'+event.idBellProfile,mypost,function(){},'json');
					if(!refresh_paused){
						$("#calendar").fullCalendar( 'refetchEvents' );
					}
				}

				if(bulk){
					alert("An error occurred...");
				}
			} else{
				if(!refresh_paused){
					$("#calendar").fullCalendar( 'refetchEvents' );
				}

				if(bulk){
					alert("Successfully updated");
				}
			}
		}
	},'json');	
}

function toggle_menu(item){
	var open = !$(item).hasClass('fa-plus');
	var ul = $(item).parent().parent().find('ul').first();

	$(item).removeClass('fa-plus');
	$(item).removeClass('fa-minus');

	if(open){
		$(item).addClass('fa-plus');
		ul.hide();
		console("Should Close");
	} else {
		$(item).addClass('fa-minus');
		ul.show();
		console.log("Should Open");
	}
}

var lastZone;
var refresh_paused = false;
var error_occurred	= false;
var players = [];

$(function(){
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	
	$('#secondaryContent span.schedule').each(function() {
		var eventObject = {
			title: $.trim($(this).children('h3').text()),
			idBellProfile: $(this).attr('idBellProfile'),
		};
		
		$(this).data('eventObject', eventObject);
		
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0,  //  original position after the drag
			handle:"h3",
			cursor:"move",
			helper: function(e){
				return $("<div></div>").text($(e.currentTarget).children('h3').text()).addClass("ui-widget-header");
			}
		});
		
	});
		
	var DayClick = false;
	$('#calendar').fullCalendar({
		eventSources: [
			{
				url: baseurl+'calendar/events',
				type:'POST',
				data: {
					zone: $("#Zone").val()
				},
				dataType: 'json',
				error: function(e){
					alert('Unable to fetch the bell schedule entries, please reload this page.');
				},
				success: function(data){
					if(typeof(data.logged_out) != 'undefined'){
						window.location.href=baseurl+'login';
					}
				}
			}
		],
		theme: true,
		//selectable: true,
		droppable: true,
		drop: function( date, allDay, event, ui ) {
			var originalEventObject = $(this).data('eventObject');
			var copiedEventObject = $.extend({}, originalEventObject);
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			update_cal(copiedEventObject);
		},
		header: {
			left: 'prev,next today',
			center: 'title',
			right: ''//'month,agendaWeek,agendaDay'
		},
		editable: true,
		eventResize: function(event, dayDelta, minuteDelta, revertFunc, jsEvent, ui, view ){
			var id = event._id.replace(/_fc/,'');
			if(typeof(event.source.events) != 'undefined'){
				event = event.source.events[parseInt(id)-1];
			}
			update_cal(event);
		},
		eventDrop: function( event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view ) { 
			var id = event._id.replace(/_fc/,'');
			if(typeof(event.source.events) != 'undefined'){
				event = event.source.events[parseInt(id)-1];
			}
			update_cal(event);
		},
		eventDropStart: function(){ refresh_paused = true; },
		eventDropStop: function(){ refresh_paused = false; },
		eventDragStart: function(){ refresh_paused = true; },
		eventDragStop: function(){ refresh_paused = false; },
		eventResizeStart: function(){ refresh_paused = true; },
		eventResizeStop: function(){ refresh_paused = false; },
		eventClick: function( event, jsEvent, view ) {
			// Do nothing.. SERIOUSLY DONT DO ANYTHING
		}
	}); 
	$("#modal").dialog({ autoOpen: false,resizable:false,modal:true,draggable:false,width:800 });
	$(".ui-widget-overlay").live('click',function(e){
		$("#modal").dialog('close');
	});

	var myRefresh = function(){
		if(!error_occurred){
			if(!refresh_paused){
				$("#calendar").fullCalendar( 'refetchEvents' );
			}
			setTimeout(myRefresh,10000);
		}
	}
	setTimeout(myRefresh,3000);
	$("#Zone").click(function(e){
		if($("#Zone").val() != lastZone){
			//Zone has been changed
			$("#calendar").fullCalendar( 'removeEvents' );
			$("#calendar").fullCalendar( 'removeEventSource', baseurl+'calendar/events' );
			$("#calendar").fullCalendar( 'addEventSource', {
				url: baseurl+'calendar/events',
				type:'POST',
				data: {
					zone: $("#Zone").val()
				},
				dataType: 'json',
				error: function(e){
					alert('Unable to fetch the bell schedule entries, please reload this page.');
				},
				success: function(data){
					if(typeof(data.logged_out) != 'undefined'){
						window.location.href=baseurl+'login';
					}
				}
			});
			lastZone = $("#Zone").val();
		}
	});
	lastZone = $("#Zone").val();
	
	if($(".quick_play").length > 0){
		var Player = document.createElement("div");
		Player.style.display = "block";
		Player.setAttribute("id", "TinyWavBlock");
		document.body.appendChild(Player);
		var vars = {}; var params = {'scale': 'noscale', 'bgcolor': '#FFFFFF'};
		swfobject.embedSWF(baseurl+"resources/flash/wavplayer.swf?gui=none", "TinyWavBlock", "1", "1", "0.0.0.0", baseurl+"resources/flash/expressInstall.swf", vars, params, params);
		window.TinyWav.init();
		
		$(".quick_play").click(function(e){
			e.preventDefault();
			$(".quick_play").removeClass('playing').text('Listen');
			$(this).addClass('playing');
			window.TinyWav.Play($(this).attr('href'));
		});
	}
	$("#change_file").click(function(e){
		e.preventDefault();
		if($(this).text() == 'Cancel'){
			$("#file").text($("#file").attr('title'));
			$("#listen").show();
			$(this).text("Change");
		} else {
			$("#file").html("").append('<input type="file" name="filename"/> .mp3 & .wav only');
			$("#listen").hide();
			$(this).text("Cancel");
		}
	});
	$(".delete").live('click', function(e){
		e.preventDefault();
		var obj = $(this);
		if(confirm(($(this).attr('title') != '' && typeof($(this).attr('title')) != 'undefined' ? $(this).attr('title') : 'Are you sure you want to delete this item?'))){
			$.post($(this).attr('href'),{'confirm':'Confirm'},function(data){
				if(data.status){
					if(obj.attr('parent') == ':refresh'){
						window.location.href = window.location.href;
					} else if(obj.attr('parent') != '' && typeof(obj.attr('parent')) != 'undefined'){
						obj.closest(obj.attr('parent')).remove();
					} else {
						if(obj.parent('td').length > 0){
							obj.parent().parent().remove();
						} else {
							obj.text('Deleted!');
						}
					}
				} else {
					alert(data.message);
				}
			},'json');
		}
	});
	$("#new_time").click(function(e){
		e.preventDefault();
		var index = last_index+1;
		last_index = index;
		var target 		= $(this).next('table').children('tbody:first');
		var template	= $(this).next('table').children('tfoot:first').html().replace(/\?\-\?/gim,index);
		target.append(template);
	});
	$(".remove_time").live("click", function(e){
		e.preventDefault();
		$(this).closest('tr').remove();
	});
});