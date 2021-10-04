<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Login page for Stocktake admin </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
        <h1> Login </h1>
        <form method="post" enctype="aplication/x-www-form-urlencoded" action="scripts/validate_login.php">
            <fieldset id="login">
                <p id=required_text>* Required Information</p>
                <div>
                    <label for="username">Username*: </label>
                    <input type="text" placeholder="Username" id="username" name="username" maxlength="50" required>
                </div>

                <div>
                    <label for="password">Password*: </label>
                    <input type="password" id="password" name="password" minlength = 8 maxlength="50" required>
                </div>

                <input type="submit" value="Sign in" id="submit_login">
            </fieldset>
        </form>
    </body>
</html>

