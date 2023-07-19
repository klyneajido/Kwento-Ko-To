<style>
  body {
    font-family: 'Roboto Mono', monospace;
    background-color: #f2f2f2;
  }

  .main-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px;
  }

  .background {
    width: 60%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .container {
    width: 400px;
    padding: 40px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
  }

  h2 {
    text-align: center;
    margin-bottom: 20px;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  label {
    margin-bottom: 8px;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"] {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: 'Roboto Mono', monospace;
    font-size: 13px;
    font-weight: 600;
  }

  input[type="submit"],
  input[type="file"] {
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

  input[type="submit"]:hover,
  input[type="file"]:hover {
    box-shadow: 4px 4px 0 #191825;
    transform: translate(-4px, -4px);
  }

  :focus-visible {
    outline-offset: 1px;
  }

  .login-link {
    text-align: center;
    margin-top: 16px;
  }

  .login-link a {
    color: blue;
    text-decoration: underline;
  }

  svg {
    width: 70%;
    height: 70%;
  }

  /* Image input */
  .image-input {
    display: flex;
    flex-direction: column;
    text-align: center;
    align-items: center;
    justify-content: center;

  }

  .image-preview-container {
    display: flex;
    flex-direction: column;
    text-align: center;
    align-items: center;
    justify-content: center;
  }

  .image-input input {
    display: none;
  }

  .image-input label {
    display: block;
    font-size: 115%;
    cursor: pointer;
    display: inline-block;
    outline: 0;
    border: 0;
    cursor: pointer;
    background: #212121;
    color: #FFFFFF;
    border-radius: 8px;
    padding: 14px 14px 14px;
    font-size: 15px;
    line-height: 1;
    transition: transform 200ms, background 200ms;
    text-align: center;
    margin-top: 10px;
  }
  .image-input label:hover {
      transform: translateY(-2px);
    }
  .image-input img {
    max-width: 175px;
    display: none;
  }

  .image-input img {
    border-radius: 100px;
    outline: 1px solid #000;
  }
  .pfp {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .image-input span {
    display: none;
    text-align: center;
    cursor: pointer;
  }

  .change-image {
    display: inline-block;
    outline: 0;
    border: 0;
    cursor: pointer;
    background: #212121;
    color: #FFFFFF;
    border-radius: 8px;
    padding: 14px 10px 10px;
    font-size: 12px;
    line-height: 1;
    transition: transform 200ms, background 200ms;
    text-align: center;
    margin-top: 10px;
  }
  .change-image:hover {
      transform: translateY(-2px);
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
    }
</style>