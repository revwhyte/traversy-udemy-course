<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a href="<?php echo URLROOT; ?>" class="navbar-brand">Home</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?php echo URLROOT; ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLROOT . '/pages/about'; ?>" class="nav-link">About</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo URLROOT . '/users/register'; ?>" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLROOT . '/users/login'; ?>" class="nav-link">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>