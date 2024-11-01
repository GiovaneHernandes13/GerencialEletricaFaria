@extends('layout.index')
@push('css')
    
    <style>
        #calendar a{
            color: #000000;
            text-decoration: none;
        }

        .mr-auto{
            margin-right: auto;
        }
    </style>
@endpush
@section('conteudo')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" arial-hiden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="hidden" id="eventId">
                        <label for="title">
                            Title
                        </label>
                        <input type="text" placeholder="Enter Title" class="form-control" id="title" name="title" value="" required>
                    </div>
                    <div>
                        <label for="is_all_day">
                            All Day
                        </label>
                        <input type="checkbox" id="is_all_day" checked name="is_all_day" value="" required>
                    </div>
                    <div>
                        <label for="starDateTime">
                            Start Date/Time
                        </label>
                        <input type="text" placeholder="Select start date" readonly class="form-control" 
                            id="startDateTime"
                            name="endDate"
                            value="" required>
                    </div>
                    <div>
                        <label for="description">
                            Description
                        </label>
                        <textarea placeholder="Eneter Description" class="form-control" id="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger mr-auto" style="display: none" id="deleteEventBnt"
                        onclick="deleteEvent()">Delete Event
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialDate: new Date(),
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                }, 
                dateClick: function(info) {
                    console.log(info);
                }
            });
            calendar.render();
        });
    </script>

@endpush