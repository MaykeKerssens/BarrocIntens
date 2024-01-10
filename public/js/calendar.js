document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 650,

        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            meridiem: false,
            hour12: false
        },

        // All events
        events: [
            { // this object will be "parsed" into an Event Object
                title: 'IKEA', // a property!
                start: '2024-01-07T09:30', // a property!
                end: '2023-01-08', // a property! ** see important note below about 'end' **
                description: ' ashfkjdf jasdfhasjdfhsjkf afsdjkdlhdaflajk',
                color: '#ffd700',
            },
            {
                title: 'Albert Heijn',
                start: '2024-01-08T10:45',
                end: '2024-01-08T12:45',
                color: '#ffd700',
            },
        ],
        overlap: false,
        eventDisplay: 'list-item',

    });
    calendar.render();
});
