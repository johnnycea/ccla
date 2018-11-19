function actualizarEventos(){


  $.ajax({
    url: './metodos_ajax/evento/mostrar_eventos_index.php',
        type: 'POST', // Send post data
        async: false,
        success: function(s){
          // alert(s);
          freshevents = s;
          $('#calendar').fullCalendar('removeEvents');
          $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
        }
  });
}
