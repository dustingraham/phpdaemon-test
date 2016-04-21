<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>WebSocket test page</title>
</head>
<body>
<script type="text/javascript">
    function create() {
        // Example
        ws = new WebSocket('ws://'+document.domain+':8047');
        ws.onopen = function () {document.getElementById('log').innerHTML += 'WebSocket opened <br/>';}
        ws.onmessage = function (e) {document.getElementById('log').innerHTML += 'WebSocket message: '+e.data+' <br/>';}
        ws.onclose = function () {document.getElementById('log').innerHTML += 'WebSocket closed <br/>';}
    }
</script>
<button onclick="create();">Create WebSocket</button>
<button onclick="ws.send('ping');">ping</button>
<button onclick="ws.send('check');">check</button>
<button onclick="ws.close();">Close WebSocket</button>
<div id="log" style="width:300px; height: 300px; border: 1px solid #999999; overflow:auto;"></div>
</body>
</html>
