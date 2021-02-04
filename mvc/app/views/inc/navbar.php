<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a href="<?php echo URLROOT; ?>" class="navbar-brand">SharePosts</a>
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
                <?php if(isLoggedIn()): ?>
                <li class="nav-item">
                    <a href="<?php echo URLROOT; ?>/posts" class="nav-link">Posts</a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?php echo URLROOT . '/pages/about'; ?>" class="nav-link">About</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <!-- <a href="#" class="nav-link"><i class="fa fa-user-o"></i> <?php echo $_SESSION['user_name']; ?></a> -->
                    <a href="#" class="nav-link">Hi, <?php echo $_SESSION['user_name']; ?>! <i class="fa fa-hand-peace-o"></i></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLROOT . '/users/logout'; ?>" class="nav-link">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="<?php echo URLROOT . '/users/register'; ?>" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo URLROOT . '/users/login'; ?>" class="nav-link">Login</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>