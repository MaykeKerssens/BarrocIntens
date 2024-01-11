const maintenanceAppointmentsUrl = "http://barrocintens.test/api/maintenance-appointments";

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

    // Hardcoded adding events -------------------------------------------------------------------------------------------------------------
    // events: [
    //     { // this object will be "parsed" into an Event Object
    //         title: 'IKEA',
    //         start: '2024-01-07T09:30',
    //         end: '2023-01-08',
    //         description: ' ashfkjdf jasdfhasjdfhsjkf afsdjkdlhdaflajk',
    //         color: '#ffd700',
    //     },
    // ],

});

calendar.render();

  // Fetch appointments for calendar
  function fetchEvents(info, successCallback, failureCallback) {
    fetch(maintenanceAppointmentsUrl)
      .then(response => response.json())
      .then(data => {
        // Transform data for FullCalendar
        const events = data.map(appointment => {
          const { id, start, end, title, note } = appointment;

          // Adjust date format according to FullCalendar requirements
          const formattedStartDate = new Date(start);

          const formattedEndDate = new Date(end);

        //   console.log(data);
          return {
            id: id,
            title: title,
            start: formattedStartDate,
            end: formattedEndDate,
            description: note,
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
