
<!doctype html>
<head>
  <title>Cross Storage Hub</title>
</head>
<body>
  <script type="text/javascript" src="{{ asset('fge_tok-hub/js/LSCD/hub.js') }}"></script>
  <script>
    CrossStorageHub.init([
      {origin: /.*/, allow: ['get', 'set', 'del']}
    ]);    
  </script>
</body>
</html>
