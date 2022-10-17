document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'bootstrap'],
    timeZone: 'UTC',
    header: {
      left: 'title',
      center: 'dayGridMonth,timeGridWeek,timeGridDay',
      right: 'prev,next today'
    },
    editable: true,
    eventLimit: true, // when too many events in a day, show the popover
    events: 'https://fullcalendar.io/demo-events.json?overload-day',
    themeSystem: 'bootstrap'
  });

  calendar.render();
});

