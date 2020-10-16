<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
</head>
<body>
  <h1>Pusher Test</h1>
  <input type="text" id="myInput">
  <button id="button">Click Me</button>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
  <span id="res">Tets</span>

  <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    $(document).ready(function() {
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
      var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('App\\Events\\DemoEvent', function(data) {
        $('#res').text(data.message);
      });

      $(document).on('click', '#button', function() {
        var data = $('#myInput').val();
        $.ajax({
          url : "{{ route('testPusher') }}",
          data : 'message='+data,
          method : 'POST',
          headers : {
            'X-CSRF-TOKEN' : '{{ csrf_token() }}'
          },
          success : function(res) {
            console.log(res);
          }
        });
      });

    });
  </script>
</body>

{{-- pake laravel echo --}}