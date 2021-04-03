<html lang="en">

<head>

</head>
<body>

    <div id="app">
        <router-link to="/">home</router-link>
<router-link to="/front">front</router-link>
        

<router-view></router-view>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>