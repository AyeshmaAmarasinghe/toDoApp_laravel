<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">To Do App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    
                </ul>
                <a class="btn btn-outline-success" href="{{ route("tasks.add") }}">Add Task</a>
                
                <a class="btn btn-outline-danger" href="{{ route("logout") }}" style="margin-left: 10px;">Logout</a>
            </div>
        </div>
    </nav>
</header>