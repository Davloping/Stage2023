<?php 
include 'navigation.php';

echo'<h3>Connexion</h3>';
echo'<form action="traitementsql.php" method="POST">
    <div class ="col-md-4 mx-auto my-5 px-5 pb-5 pt-3 bg-black text-light">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Identifiant</label>
            <input type="text" class="form-control" id="identifiantinscrip" name="idenifiantinscrip">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="motdepassse" name="motdepasse">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>';


echo'</body>
</html>';
?>