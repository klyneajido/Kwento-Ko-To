<style>
body {
            font-family: 'Roboto Mono', monospace;
            background-color: #f2f2f2;
            height: 120vh;
        }

        .background {
            width: 45%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 100px;
        }

        .mainform {
            position: absolute;
            top: 55%;
            left: 80%;
            height: 100%;
            transform: translate(-50%, -50%);
            display: block;
            width: 100%;
            max-width: 450px;
            background-color: #FFF;
            padding: 2.25em;
            box-sizing: border-box;
            border: solid 1px #DDD;
            border-radius: 0.5em;
            font-family: 'Roboto Mono', monospace;
        }

        form .svgContainer {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 1em;
            border-radius: 50%;
            background: none;
            border: solid 2.5px #212121;
            overflow: hidden;
            pointer-events: none;
        }

        form .svgContainer div {
            position: relative;
            width: 100%;
            height: 0;
            overflow: hidden;
            padding-bottom: 100%;
        }

        form .svgContainer .mySVG {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        form .inputGroup {
            margin: 0 0 2em;
            padding: 0;
            position: relative;
        }

        form .inputGroup:last-of-type {
            margin-bottom: 0;
        }

        form label {
            margin: 0 0 12px;
            display: block;
            font-size: 1.25em;
            color: #212121;
            font-weight: 700;
            font-family: inherit;
        }

        form input[type=email],
        form input[type=text],
        form input[type=password] {
            display: block;
            margin: 0;
            padding: 0 1em 0;
            background-color: #fff;
            border: solid 2px #3F3D56;
            border-radius: 4px;
            -webkit-appearance: none;
            box-sizing: border-box;
            width: 100%;
            height: 50px;
            font-size: 15px;
            color: #3F3D56;
            font-weight: 600;
            font-family: inherit;
            transition: box-shadow 0.2s linear, border-color 0.25s ease-out;
        }

        form input[type=email]:focus,
        form input[type=text]:focus,
        form input[type=password]:focus {
            outline: none;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            border: solid 2px #3F3D56;
        }

        form input[type=email],
        form input[type=text] {
            padding: 5px 1em 0px;
        }

        form button {
            font-family: inherit;
            outline: 0;
            grid-gap: 8px;
            align-items: center;
            background-color: #212121;
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
            padding: 12px 16px;
            text-decoration: none;
            text-overflow: ellipsis;
            transition: all .14s ease-out;
            white-space: nowrap;
            width: 100%;
            color: #fff;
        }

        form button:hover,
        form button:active {
            box-shadow: 4px 4px 0 #000;
            transform: translate(-4px, -4px);
        }

        form button:focus-visible {
            outline-offset: 1px;
        }

        form .inputGroup1 .helper {
            position: absolute;
            z-index: 1;
            font-family: inherit;
        }

        form .inputGroup1 .helper1 {
            top: 0;
            left: 0;
            transform: translate(1.4em, 2.6em) scale(1);
            transform-origin: 0 0;
            color: #217093;
            font-size: 4px;
            font-weight: 400;
            opacity: 0.65;
            pointer-events: none;
            transition: transform 0.2s ease-out, opacity 0.2s linear;
        }

        form .inputGroup1.focusWithText .helper {
            transform: translate(1.4em, 2em) scale(0.65);
            opacity: 1;
        }

        .password-toggle {
            position: absolute;
            top: 70%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-toggle i {
            color: #999;
        }

        .password-toggle i:hover {
            color: #333;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }

        .signup {
            text-align: center;
        }

        @media (max-width: 600px) {
            .background {
                display: none;
            }
        }
    </style>