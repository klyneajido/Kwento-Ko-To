<style>
    #particles-js {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #f2f2f2;
        z-index: -1;
    }

    .post-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        padding-left: 40px;
    }

    .time {
        margin-left: 10px;
    }

    span {
        margin-left: 10px;
        font-size: 13px;
        color: gray;
    }

    .post-content {
        margin-left: 10px;
    }

    .comments-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        padding-left: 40px;
    }

    .post-comment {
        display: flex;
        align-items: center;
    }

    .post-comment textarea {
        padding: 10px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 545px;
        height: 30px;
        font-family: 'Roboto Mono', monospace;
        resize: none;
        width: 100%;
        max-width: 100%;
    }

    .post-comment button[type="submit"] {
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

    .post-comment button[type="submit"]:hover {
        box-shadow: 4px 4px 0 #000;
        transform: translate(-4px, -4px);
    }

    :focus-visible {
        outline-offset: 1px;
    }

    .comment {
        display: flex;
        flex-direction: row;
        margin-bottom: 10px;
        padding: 20px;
        background: 0 0;
    }

    .comment-profile-picture {
        width: 50px;
        height: 50px;
        border-radius: 100px;
        outline: 1px solid #ccc;
        margin-right: 10px;
        display: block;
        object-fit: cover;
    }

    .comment-name-time {
        display: flex;
        flex-direction: row;

    }

    .delete-comment-button button {
        margin-left: 1020px;
        background: none;
        border: none;
        padding: 0;
    }

    .comment-details {
        padding: 10px;
        font-size: 14px;
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 545px;
        height: auto;
        font-family: 'Roboto Mono', monospace;
        resize: none;
        width: 100%;
        max-width: 100%;
    }
    .no-comment-title{
        text-align: center;
    }
</style>