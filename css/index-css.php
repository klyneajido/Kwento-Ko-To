<style>
    /* Body styles */
    body {
        font-family: 'Roboto Mono', monospace;
        margin: 0;
        height: 100vh;
        background-color: #f2f2f2;
        display: flex;
        flex-direction: column;
    }

    #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #f2f2f2;
        z-index: -1;
    }


    /* Header styles */
    .header {
        display: flex;
        background-color: #212121;
        padding: 20px;
        align-items: center;
        justify-content: center;
    }

    .header-content {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 90%;
    }

    .logo h1 a {
        color: whitesmoke;
        font-size: 30px;
        margin: 0;
        text-decoration: none;
    }

    .icons {
        display: flex;
        margin: 20px;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 140px;
    }

    .notification,
    .message,
    .settings {
        font-size: 23px;
        color: whitesmoke;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        font-size: 20px;
        color: whitesmoke;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 100px;
        z-index: 1;
        background-color: whitesmoke;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-size: 15px;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #ccc;
    }

    /* No Post */
    .no-posts {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        align-self: center;
        margin-top: 20px;
        padding: 20px;
        width: 20%;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        outline: 1px solid #ccc;
    }

    /* Post card styles */
    .post-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        width: 50%;
    }

    .post-card h3 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }

    .post-card p {
        margin: 10px 0;
        font-size: 14px;
        color: #666;
    }

    .post-card .meta {
        font-size: 12px;
        color: #888;
    }

    .post-card .actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .post-card .actions a,
    .post-card .actions button {
        font-size: 20px;
        color: #007bff;
        text-decoration: none;
        background: none;
        border: none;
        cursor: pointer;
    }

    .post-card .actions a:hover,
    .post-card .actions button:hover {
        transform: translateY(-3px);
    }

    .post-card .actions button {
        margin-left: 10px;
    }

    /* Create post section styles */
    .create-post-text {
        font-size: 15px;
        width: 10%;
        margin-left: 20px;
    }

    .post-form {
        margin: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        align-self: center;
        width: 50%;
    }

    .post-form input[type="text"] {
        padding: 10px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 545px;
        height: 30px;
        font-family: 'Roboto Mono', monospace;
    }

    .post-form button[type="submit"] {
        outline: 0;
        grid-gap: 8px;
        align-items: center;
        background: 0 0;
        border: 1px solid #000;
        border-radius: 4px;
        cursor: pointer;
        display: inline-flex;
        flex-shrink: 0;
        font-size: 16px;
        gap: 8px;
        justify-content: center;
        line-height: 1.5;
        overflow: hidden;
        padding: 12px 30px;
        text-decoration: none;
        text-overflow: ellipsis;
        transition: all .14s ease-out;
        white-space: nowrap;

    }

    .post-form button[type="submit"]:hover {
        box-shadow: 4px 4px 0 #000;
        transform: translate(-4px, -4px);
    }

    :focus-visible {
        outline-offset: 1px;
    }

    /* Cards container styles */
    .cards {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .time {
        font-size: 12px;
        color: #888;
    }

    /* Search form styles */
    .search-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-form input[type="text"] {
        padding: 10px;
        font-size: 14px;
        border-radius: 100px;
        width: 600px;
        height: 20px;
        font-family: 'Roboto Mono', monospace;
    }

    /* Reveal form styles */
    #reveal {
        background: #fafafa;
        width: 100%;
        display: none;
        border-radius: 3px;
        box-shadow: 1px 1px 3px #555;
        padding-top: 25px;
        padding-bottom: 25px;
        padding-left: 20px;
        padding-right: 20px;
    }

    /* Button styles */
    .button {
        font-family: 'Roboto Mono', monospace;
        --bg: #fff;
        --hover-bg: #fff;
        --hover-text: #000;
        color: #000;
        border: 1px solid grey;
        border-radius: 4px;
        padding: 0.8em 2em;
        background: var(--bg);
        transition: 0.2s;
    }

    .button:hover {
        color: var(--hover-text);
        transform: translate(-0.25rem, -0.25rem);
        background: var(--hover-bg);
        box-shadow: 0.25rem 0.25rem var(--bg);
    }

    .button:active {
        transform: translate(0);
        box-shadow: none;
    }

    .btn {
        font-family: Arial, Helvetica, sans-serif;
        text-transform: uppercase;
    }

    .btn:hover .btn-slide-show-text1 {
        margin-left: 65px;
    }

    #hover-area {
        margin-left: 165px;
        display: inline-block;
        width: 100%;
        outline: 0;
        border: 0;
        cursor: pointer;
        border-radius: 8px;
        padding: 10px 10px 10px;
        font-size: 15px;
        font-weight: 700;
        line-height: 1;
        transition: transform 200ms;
        background: transparent;
        color: #000000;
        box-shadow: 0 0 0 3px #000000 inset;
    }

    #hover-area:hover {
        transform: translateY(-2px);
    }

    .like i {
        color: 'blue';
    }

    .profile {
        display: flex;
        flex-direction: row;
        align-items: center;
        align-self: center;
    }

    .profile_picture {
        width: 50px;
        height: 50px;
        border-radius: 100px;
        outline: 1px solid #ccc;
        margin-right: 10px;
        display: block;
        object-fit: cover;
    }
    .header {
        display: flex;
        background-color: #212121;
        padding: 20px;
        align-items: center;
        justify-content: center;
    }

    .header-content {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 90%;
    }

    .logo h1 a {
        color: whitesmoke;
        font-size: 30px;
        margin: 0;
        text-decoration: none;
    }

    .icons {
        display: flex;
        margin: 20px;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 140px;
    }

    .notification,
    .message,
    .settings {
        font-size: 23px;
        color: whitesmoke;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {
        font-size: 20px;
        color: whitesmoke;
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 100px;
        z-index: 1;
        background-color: whitesmoke;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-size: 15px;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #ccc;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .header-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .icons {
            margin: 0;
            justify-content: flex-end;
            width: 100%;
            margin-top: 10px;
        }

        .notification,
        .message,
        .settings {
            font-size: 18px;
        }

        .dropdown-content a {
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .logo {
            margin-bottom: 10px;
        }

        .logo h1 a {
            font-size: 25px;
        }

        .icons {
            flex-wrap: wrap;
            width: 100%;
        }

        .dropdown-content a {
            font-size: 12px;
        }
    }
    @media (max-width: 768px) {
        .search-form input[type="text"] {
            width: 300px;
        }

        .search-form button.button {
            padding: 8px 20px;
        }
    }

    @media (max-width: 480px) {
        .search-form input[type="text"] {
            width: 200px;
        }

        .search-form button.button {
            padding: 6px 16px;
        }
    }
</style>