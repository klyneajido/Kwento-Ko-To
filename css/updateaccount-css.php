<style>
    body {
        font-family: 'Roboto Mono', monospace;
    }
.main-container{
    height: 100vh;
}
    .container {
        margin-top: 40px;
        margin-bottom: 40px;
        align-self: center;
        outline: 1px solid #ccc;
        padding: 50px;
        border-radius: 10px;
        background-color: rgba(249, 245, 246, 0.5);
        backdrop-filter: blur(2px);
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

    h1 {
        color: #333;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    a {
        display: inline-block;
        margin-top: 10px;
        color: #999;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    input[type="submit"] {
        align-self:center;
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
    input[type="submit"]:hover {
        box-shadow: 4px 4px 0 #000;
        transform: translate(-4px, -4px);
    }

    :focus-visible {
        outline-offset: 1px;
    }
    .image-preview-container{
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        flex-direction: column;
    }
    .image-preview{
        width: 100px;
        height: 100px;
        border-radius: 100px;
        outline: 1px solid #ccc;
        margin-right: 10px;
        display: block;
        object-fit: cover;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .choose-image-button{
        outline: 0;
    grid-gap: 8px;
    align-items: center;
    background: 0 0;
    border: 1px solid #fff;
    border-radius: 4px;
    cursor: pointer;
    display: inline-flex;
    flex-shrink: 0;
    font-family: 'Roboto Mono', monospace;
    gap: 8px;
    justify-content: center;
    line-height: 1.5;
    overflow: hidden;
    padding: 12px 16px;
    text-decoration: none;
    text-overflow: ellipsis;
    transition: all .14s ease-out;
    white-space: nowrap;
    background-color: #212121;
    color: white;
    }
    .change-image-button:hover {
    box-shadow: 4px 4px 0 #191825;
    transform: translate(-4px, -4px);
  }
</style>