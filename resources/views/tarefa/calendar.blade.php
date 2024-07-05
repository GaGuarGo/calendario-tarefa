<x-layout>
    <div class="flex justify-center">

        <div class="bg-white p-8 rounded-md flex-col h-min">

            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-6 text-center">Visualização do Calendário</h2>
                <div class="calendar-buttons">
                    <button class="active" data-view-type="dayGridMonth">Mês</button>
                    <button data-view-type="timeGridWeek">Semana</button>
                    <button data-view-type="timeGridDay">Dia</button>
                </div>
            </div>


            <div class="max-w-6xl w-full " id='calendar'></div>
        </div>

    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    slotMinTime: '8:00:00',
                    slotMaxTime: '19:00:00',
                    events: @json($tarefas),
                    eventTimeFormat: {
                        hour: '2-digit',
                        minute: '2-digit',
                    },
                    dayMaxEvents: 4,
                    locale: 'pt-br',
                    views: {
                        dayGridMonth: { // Visualização de mês
                            dayMaxEvents: 4 // Máximo de eventos por dia
                        },
                        timeGridWeek: { // Visualização de semana
                            type: 'timeGridWeek',
                            slotMinTime: '8:00:00',
                            slotMaxTime: '19:00:00',
                            dayMaxEvents: 4 // Máximo de eventos por dia
                        },
                        timeGridDay: { // Visualização de dia
                            type: 'timeGridDay',
                            slotMinTime: '8:00:00',
                            slotMaxTime: '19:00:00',
                            dayMaxEvents: 4 // Máximo de eventos por dia
                        }
                    },

                });
                calendar.render();
                document.querySelectorAll('.calendar-buttons button').forEach(function(button) {
                    button.addEventListener('click', function() {
                        var viewType = this.dataset.viewType;
                        calendar.changeView(viewType);
                        document.querySelectorAll('.calendar-buttons button').forEach(function(btn) {
                            btn.classList.remove('active');
                        });
                        this.classList.add('active');
                    });
                });
            });
        </script>
    @endpush

</x-layout>
