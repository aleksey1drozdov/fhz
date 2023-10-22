<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="app">
    My name: <div id="name">{{Auth::user()->name}}</div>
    <div id="chat" style="width: 100%; height: auto; min-height: 500px; border: solid 1px black; margin-bottom: 5px;"></div>
        <input id="text" type="text" autocomplete="off" aria-autocomplete="none" style="width: 100%; margin-bottom: 5px;">
        <input id="submit" type="button" value="send" >
</div>
@vite('resources/js/app.js')
</body>
</html>
