<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <style>
      body {
        background-image: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fak6.picdn.net%2Fshutterstock%2Fvideos%2F31206496%2Fthumb%2F1.jpg&f=1&nofb=1&ipt=a82709eb36c008834339ed02265f1bf1ebed92c2d8d3837c9359a35ea1910065&ipo=images);
        background-size: 7.5%;
        overflow: hidden;
        background-position: center;
        background-repeat: repeat;
        background-color: #fff;
        display: flex;
        justify-content: center;
      }

      body form {
        display: grid;
        width: fit-content;
        margin-top: 29vh;
        padding: 4%;
        backdrop-filter: blur(1.5px);
        border: 0.5px white solid;
        box-shadow: 0.40px 0.20px 5px 0.1px black;
        transition: 2s;
      }

      body form input {
        border: none;
        border-bottom: 0.1px #fff solid;
        background-color: transparent;
        margin-bottom: 2vh;
      }
    </style>
  </head>

  <body>
    <form action="./../Controller/loginController.php" method="post">
      <input
        type="email"
        name="email"
        id="email"
        placeholder="Email"
        required
      />
      <input
        type="password"
        name="password"
        id="password"
        placeholder="Password"
        required
      />
      <button type="submit">Login</button>
    </form>
  </body>
</html>
