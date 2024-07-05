<x-layout :notShowNavBar="false">

    <div class="flex justify-center items-center">
        <x-card class="w-full max-w-6xl">
            <x-flash-message/>
            <div class="w-full h-full " id="calendar"></div>
        </x-card>
    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet"/>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    timeZone: 'local',
                    initialView: 'dayGridMonth',
                    slotMinTime: '08:00:00',
                    slotMaxTime: '19:00:00',
                    headerToolbar: {
                        end: 'today,dayGridMonth,timeGridWeek,timeGridDay,listWeek',
                        center: 'title',
                        start: 'prev,next,createTaskButton',

                    },
                    customButtons: {
                        createTaskButton: {
                            text: 'Criar Tarefa',
                            click: function() {
                                var redirectUrl = '/tarefa/create';
                                window.location.href = redirectUrl;
                            }
                        }
                    },
                    buttonText: {
                        today: 'Hoje',
                        month: 'Mês',
                        week: 'Semana',
                        day: 'Dia',
                        list: 'Compromissos'
                    },
                    events: @json($tarefas),
                    eventMouseEnter: function (info) {
                        info.el.style.backgroundColor = 'grey';
                        info.el.style.color = '#00545c'
                    },
                    eventMouseLeave: function (info) {
                        info.el.style.backgroundColor = '#00545c';
                        info.el.style.color = 'white';
                    },
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
                            slotMinTime: '08:00:00',
                            slotMaxTime: '19:00:00',
                            dayMaxEvents: 4 // Máximo de eventos por dia
                        },
                        timeGridDay: { // Visualização de dia
                            type: 'timeGridDay',
                            slotMinTime: '08:00:00',
                            slotMaxTime: '19:00:00',
                            dayMaxEvents: 4 // Máximo de eventos por dia
                        }
                    },
                });
                calendar.render();

            });

            function openModal() {
                document.getElementById('eventModal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('eventModal').classList.add('hidden');
            }
        </script>
    @endpush
</x-layout>
