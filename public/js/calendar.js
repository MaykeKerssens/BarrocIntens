const userId = document.getElementById('user-data').getAttribute('data-user-id');
const maintenanceAppointmentsUrl = `http://barrocintens.test/api/maintenance-appointments/${userId}`;

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

    events: fetchEvents,

    eventClick: function(info) {

        var appointmentsTodayEl = document.getElementById('appointments-today');
        var detailsEl = document.getElementById('appointment-details');
        var headerEl = document.getElementById('appointment-header');

        // Company data elements
        var streetEl = document.getElementById('appointment-street');
        var zipCityEl = document.getElementById('appointment-zip-city');
        var phoneEl = document.getElementById('appointment-phone');
        var emailEl = document.getElementById('appointment-email');

        // Appointment data elements
        var dateTimesEl = document.getElementById('appointment-date-times');
        var titleEl = document.getElementById('appointment-title');
        var descriptionEl = document.getElementById('appointment-description');

        // Toggle appointment details and appointments today
        if (detailsEl.style.display === 'none') {
            detailsEl.style.display = 'block';
            appointmentsTodayEl.style.display = 'none';
            headerEl.innerText = info.event.title;
        } else {
            detailsEl.style.display = 'none';
            appointmentsTodayEl.style.display = 'block';
            headerEl.innerText = 'Reperaties vandaag:';
        }

        //Format date and times
        var dateStart = format(new Date(info.event.start), "dd/mm/yyyy");
        var timeStart = format(new Date(info.event.start), "hh:mm");
        var timeEnd = format(new Date(info.event.end), "hh:mm");

        // Show Company data
        streetEl.innerText = info.event.extendedProps.street;
        zipCityEl.innerText = info.event.extendedProps.zip + ' ' + info.event.extendedProps.city;
        phoneEl.innerText = info.event.extendedProps.phone;
        emailEl.innerText = info.event.extendedProps.email;
        // Show Appointment data
        titleEl.innerText = info.event.extendedProps.appointmentTitle;
        dateTimesEl.innerText = dateStart + ' | ' + timeStart + '-' + timeEnd;
        descriptionEl.innerText = info.event.extendedProps.description;


    }
});

calendar.render();

// Fetch appointments for calendar
function fetchEvents(info, successCallback, failureCallback) {
fetch(maintenanceAppointmentsUrl)
    .then(response => response.json())
    .then(data => {
    // Transform data for FullCalendar
    const events = data.map(appointment => {
        const { id, title, description, start, end, company, city, street, zip, phone, email } = appointment;

        const formattedStartDate = new Date(start);
        const formattedEndDate = new Date(end);

        return {
        id: id,
        title: company,
        start: formattedStartDate,
        end: formattedEndDate,
        extendedProps: {
            appointmentTitle: title,
            description: description,
            company: company,
            city: city,
            street: street,
            zip: zip,
            phone: phone,
            email: email,
        },
        color: '#ffd700',
        display: 'list-item',
        };
    });

    successCallback(events);
    })
    .catch(appointment => {
    console.error('Error fetching data for appointments:', appointment);
    failureCallback(appointment);
    });
}
