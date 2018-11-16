<div class="settings">
    
    <h3>Settings</h3>
    <form action="includes/edit_profile.php" method="POST">
        <label>Full Name</label>
        <input type="text" name="username" value="<?php echo $login_username ?>">
        <input type="submit" name="change-name" value="change">
    </form>
    <form id="form-password" action="includes/edit_profile.php" method="POST">
        <label>Password</label>
        <input type="text" name="old-password" placeholder="Old Password">
        <input type="text" id="pswd1" name="new-password" placeholder="New Password">
        <input type="text" id="pswd2" placeholder="Retype new Password">
        <input type="submit" name="change-password" value="change">
    </form>

    <script>
        let form = document.getElementById('form-password');
        form.addEventListener('submit', (e) => {

            e.preventDefault();

            let pswd1 = document.getElementById('pswd1');
            let pswd2 = document.getElementById('pswd2');
            let p1 = pswd1.value.trim();
            let p2 = pswd2.value.trim();
            console.log(p1);
            console.log(p2);
            if (p1 !== p2) {
                myToast.showError("Passwords doesn't match", null);
                return false;
            } else {
                return true;
            }
        });
    </script>
</div>