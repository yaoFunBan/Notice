$(function(){
    var nId = "";
    var url = "event_data.php";
    
    $('#selNotice').on('change', function(){
        $('#calendar').fullCalendar('destroy');
        RenderCalendar($(this).val());
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
                url: "event_data.php",
                cache: true,
                type: 'POST',
                data: {
                  gData: "1"
                },
                error: function() {
                    alert('there was an error while fetching events!');
                }
            },    
            eventLimit:true,
    //        hiddenDays: [ 2, 4 ],
            lang: 'th',     
        });
    
    
    function RenderCalendar(eId) {
//        alert(eId);
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
                url: "event_data.php",
                cache: true,
                type: 'POST',
                data: {
                  nId : eId,
                  gData: "1"
                },
                error: function() {
                    alert('there was an error while fetching events!');
                }
            },    
            eventLimit:true,
    //        hiddenDays: [ 2, 4 ],
            lang: 'th',     
        });
    }
    
    
    
});