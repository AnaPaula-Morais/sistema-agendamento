document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      
      locale: 'pt-br',
      //initialDate: '2023-01-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            time: arg.time,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        alert(`O agendamento ${arg.event.title} inicia ${arg.event.start}`)
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: 'http://localhost/agendamento/listar-evento.php'
      
      
    })

    calendar.render();
  });