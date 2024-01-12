const userId = document.getElementById('user-data').getAttribute('data-user-id');
console.log(userId);
const maintenanceAppointmentsUrl = `http://barrocintens.test/api/maintenance-appointments/${userId}`;

console.log(maintenanceAppointmentsUrl);

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

    events: fetchEvents
});

calendar.render();

// Fetch appointments for calendar
function fetchEvents(info, successCallback, failureCallback) {
fetch(maintenanceAppointmentsUrl)
    .then(response => response.json())
    .then(data => {
    // Transform data for FullCalendar
    const events = data.map(appointment => {
        const { id, title, description, start, end, company, city, street } = appointment;

        // Adjust date format according to FullCalendar requirements
        const formattedStartDate = new Date(start);
        const formattedEndDate = new Date(end);

        return {
        id: id,
        title: title,
        description: description,
        start: formattedStartDate,
        end: formattedEndDate,
        // extendedProps: {
        //     company: company,
        //     city: city,
        //     street: street
        // },
        color: '#ffd700',
        };
    });

    successCallback(events);
    })
    .catch(appointment => {
    console.error('Error fetching data for appointments:', appointment);
    failureCallback(appointment);
    });
}
