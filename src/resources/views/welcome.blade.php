<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="app">
    <div>UserName: {{Auth::user()->name}}</div>
    <div id="chat" style="width: 100%; height: auto; min-height: 500px; border: solid 1px black; margin-bottom: 5px;"></div>
        <input id="text" type="text" style="width: 100%; margin-bottom: 5px;">
        <input id="submit" type="button" value="send">
</div>
@vite('resources/js/app.js')
</body>
</html>
