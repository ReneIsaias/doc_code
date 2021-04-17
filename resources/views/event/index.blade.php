{{-- Extendemos del layout principal --}}
@extends('layouts.app')

{{-- Le asignamos en sufijo al titlo de la pagina --}}
@section('title_postfix', 'Citas')

{{-- Agregamos los css --}}
@section('css')

    <link href='{{ asset('fullcalendar/lib/main.css') }}' rel='stylesheet' />

@endsection

{{-- En esta section va nuestro content --}}
@section('content')

    <div class="container" id='calendar'></div>

    @include('event.modal')

@endsection

@section('js')
  <script src='{{ asset('fullcalendar/lib/main.js')}}'></script>

  <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {

                /* defaultDate: new Date(2020,9,6), */

                initialView: 'dayGridMonth',

                /* Cabezar del calendar */
                headerToolbar: {
                    left: 'prev,next today Miboton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },

                /* Agrega un boton a la cabecera */
                customButtons:{
                    Miboton:{
                        text: "Boton",
                        click: function(){
                            alert("Hola mundo");
                            $('#exampleModal').modal();
                        }
                    }
                },

                /* Captura el click en el calendar */
                dateClick: function(info){
                    $('#start').val(info.dateStr);

                    $('#exampleModal').modal();

                    console.log(info);
                    /* calendar.addEvent({
                        title: "Evento X",
                        date: info.dateStr
                    }); */
                },

                /* Ver el detalle de un evento */
                eventClick:function(info){
                    console.log(info);

                    console.log(info.event.title);
                    console.log(info.event.start);

                    console.log(info.event.end);
                    console.log(info.event.textColor);
                    console.log(info.event.backgroundColor);

                    console.log(info.event.extendedProps.descripcion);

                    dia = (info.event.start.getDate());
                    mes = (info.event.start.getMonth()+1);
                    mes = (info.event.start.getFullYear());

                    mes = (mes<10)?"0"+mes:mes;
                    dia = (dia<10)?"0"+dia:dia;

                    hora = (info.event.start.getHours() + ":" + info.event.start.getMinutes());
                    

                    $('#id').val(info.event.id);
                    $('#title').val(info.event.title);
                    $('#description').val(info.event.extendedProps.description);
                    $('#color').val(info.event.backgroundColor);
                    $('#textColor').val(info.event.textColor);
                    $('#start').val(anio + "-" + mes + "-" + dia);
                    $('#hour').val(hora);
                    $('#end').val(info.event.end);

                    $('#exampleModal').modal();
                },

                /* Agregando eventos */
                /* events: [
                    {
                        title: "Mi evento 1",
                        start: "2021-04-15 12:30:00",
                        descripcion: "Descripcion evento 1"
                    },
                    {
                        title: "Mi evento 2",
                        start: "2021-04-20 12:30:00",
                        end: "2021-04-25 12:30:00",
                        color: "#FFCCAA0",
                        textColor: "#000000",
                        descripcion: "Descripcion evento 2"
                    }
                ] */
                events: "{{ url('citas/show') }}",
            });

            calendar.setOption('locale', 'Es');

            calendar.render();

            $('#btnAgregar').click(function(){
                objEvento = recolectarDatos("POST");
                enviarInfo('', objEvento);
            });

            function recolectarDatos(method){
                nuevoEvento={
                    id: $('#id').val(),
                    title: $('#title').val(),
                    description: $('#description').val(),
                    color: $('#color').val(),
                    textColor: $('#textColor').val(),
                    start: $('#start').val() + " " + $('#hour').val(),
                    end: $('#end').val() + " " + $('#hour').val(),
                    '_token': $("meta[name='csrf-token']").attr("content"),
                    '_method': method,
                }

                 return nuevoEvento;
            }
            
            function enviarInfo(accion, objEvento){
                $.ajax(
                    {
                        type: "POST",
                        url: "{{ url('/citas') }}" + accion,
                        data: objEvento,
                        success: function(msg){
                            console.log(msg);
                            $('#exampleModal').modal('toggle');
                            calendar.refetchEvents();
                        },
                        error: function(){ alert("Ocurrio un error"); },
                    }
                );
            }
        });

    </script>

@endsection
