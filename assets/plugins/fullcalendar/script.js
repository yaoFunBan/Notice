$(function(){
    var nId = "";
    var url = "event_data.php?gData=1";
    $('#selNotice').on('change', function(){
        nId = $("#selNotice").val();
        url = "event_data.php?gData=1&nId="+nId;
        
        $('#calendar').fullCalendar('removeEvents'); // ลบ events ทั้งหมด
        $('#calendar').fullCalendar('removeEventSources'); // ลบ events source
        $('#calendar').fullCalendar('addEventSource', "event.php?gData=1&sel=" + sel);
        
    });
    
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',  //  prevYear nextYea
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },  
        buttonIcons:{
            prev: 'left-single-arrow',
            next: 'right-single-arrow',
            prevYear: 'left-double-arrow',
            nextYear: 'right-double-arrow'
        },       
        events: {
            url: url,
            error: function() {

            }
        },    
        eventLimit:true,
//        hiddenDays: [ 2, 4 ],
        lang: 'th',     
    });
    
});