<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Super BL0G</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<!-- TODO: Gem data selvom der er errors i formen, så brugeren ikke skal genindtaste korrekte felter¿ -->
<body>
<div class="container">
    <div class="errors">
        <?php
        echo "PHP er for vildt";
        ?>
    </div>
    <form id="contact" action="handleRegistration.php" method="post">
        <h3>Hshop register form</h3>
        <fieldset>
            <input placeholder="Your name" name="name" type="text" tabindex="1" autofocus>
        </fieldset>
        <fieldset>
            <input placeholder="Your Email Address" name="email" type="text" tabindex="2" >
        </fieldset>
        <fieldset>
            <input placeholder="Your Phone Number (optional)" name="phone" type="tel" tabindex="3" >
        </fieldset>
        <fieldset>
            <select name="pet">
                <option value="dog" selected>Dog</option>
                <option value="cat">Cat</option>
                <option value="rat">Rat</option>
                <option value="bird">Bird</option>
            </select>
            <label for="pet"><strong>&nbsp;&nbsp;&nbsp;Your favorite pet</strong></label>
        </fieldset>
        <fieldset>
            <textarea placeholder="A description of you..." name="description" tabindex="5" ></textarea>
        </fieldset>
        <fieldset>
            <input placeholder="Password" name="password" type="password" tabindex="5" ></input>
        </fieldset>
        <fieldset>
            <input placeholder="Password_again" name="password_again" type="password" tabindex="5" ></input>
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="submit" data-submit="...Sending">Submit</button>
        </fieldset>
        <p class="copyright">Designed by <a href="http://www.hshop.dk" target="_blank" title="Colorlib">hshop.dk</a></p>
    </form>
</div>
</body>
</html>
