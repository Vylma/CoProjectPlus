<?php echo $errorMessage; ?>
<form class="loginform" method="post">
    <table>
        <tr>
        <td>Identifiant:</td>
        <td><input type="text" name="login"/></td>
        </tr>
    
        <tr>
        <td>Mot de passe:</td>
        <td><input type="password" name="pwd"/></td>
        </tr>
    </table>
           
    <br/>
    <button type="submit" class="bouton">SE CONNECTER</button>
</form>