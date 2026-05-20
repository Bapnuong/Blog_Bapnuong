<div id="navbar-app">

    <navbar-component
        :user='@json(auth()->user())'
        :is-admin='@json(auth()->user()->role === "admin")'
    />

</div>
