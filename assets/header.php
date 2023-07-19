<div class="header">
        <div class="header-content">
            <div class="logo">
                <h1><a href="index.php">KKT</a></h1>
            </div>
            <div class="search-form">
                <form method="GET" action="search.php">
                    <input type="text" name="search" placeholder="Search posts">
                    <button class="button" type="submit">Search</button>
                </form>
            </div>
            <div class="icons">
                <div class="notification">
                    <div class="dropdown">
                        <button class="dropbtn">
                            <i class="ri-notification-2-fill"></i>
                        </button>
                        <div class="dropdown-content">
                            <!-- Notifications -->
                            <a href="#">Notification 1</a>
                            <a href="#">Notification 2</a>
                            <a href="#">Notification 3</a>
                        </div>
                    </div>
                </div>

                <div class="message">
                    <div class="dropdown">
                        <button class="dropbtn">
                            <i class="ri-chat-3-line"></i>
                        </button>
                        <div class="dropdown-content">
                            <!-- Messages from users -->
                            <a href="#">Message 1</a>
                            <a href="#">Message 2</a>
                            <a href="#">Message 3</a>
                        </div>
                    </div>
                </div>
                <div class="settings">
                    <div class="dropdown">
                        <button class="dropbtn">
                            <i class="ri-settings-3-fill"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Settings</a>
                            <a href="updateAccount.php?userId=<?php echo $_SESSION['user_id']; ?>">Account</a>
                            <a href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
<?php include 'css\index-css.php'; ?>