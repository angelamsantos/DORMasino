 $(document).ready(function() {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();


  var calendar = $('#calendar').fullCalendar({
   //editable: true,
   header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listMonth'
   },
   defaultView: 'month',
   businessHours: {
	  // days of week. an array of zero-based day of week integers (0=Sunday)
	  dow: [ 1, 2, 3, 4, 5 ], // Monday - Thursday

	  start: '08:00', // a start time (10am in this example)
	  end: '16:00', // an end time (6pm in this example)
	  
	},
	minTime: '08:00:00',
	maxTime: '16:00:00',
	slotDuration: '01:00:00',
	forceEventDuration: true,
	allDaySlot: false,
	allDayDefault:false,
	editable: false,
	contentHeight: 510,
	weekends: false,
	longPressDelay: 1000,
	selectOverlap: false,
	themeSystem: 'bootstrap3',
   events: "events.php",
	eventLimit: true,

    eventRender: function(event, element) {  
            element.find('.fc-content').append(event.complain + "<br/>" + event.dentistName); 
        },
		
	
    selectable: true,
	selectHelper: true,
   
	select: function(start, end, ) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
	},
   



   editable: true,
   eventDrop: function(event, delta) {
   var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
   var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
   $.ajax({
	   url: 'update_events.php',
	   data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
	   type: "POST",
	   success: function(json) {
	    alert("Updated Successfully");
	   }
   });
   },
   
   eventClick: function(event) {
	var decision = confirm("Do you really want to do that?"); 
	if (decision) {
	$.ajax({
		type: "POST",
		url: "delete_event.php",
		data: "&id=" + event.id,
		 success: function(json) {
			 $('#calendar').fullCalendar('removeEvents', event.id);
			  alert("Updated Successfully");}
	});
	}
  	},
   eventResize: function(event) {
	   var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
	   var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
	   $.ajax({
	    url: 'update_events.php',
	    data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
	    type: "POST",
	    success: function(json) {
	     alert("Updated Successfully");
	    }
	   });
	}
   
  });
  
 });
