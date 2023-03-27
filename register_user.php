
<!DOCTYPE html>
<html>
<head>
    <?php include('header.php') ?>
    <?php
    // session_start();
    // if(isset($_SESSION['login_id'])){
    //     header('Location:home.php');
    // }
    ?>
    <title>Register</title>
</head>
<style>
    body {
        background-image: url(./assets/img/bus.jpg);
        height: 96vh;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body id='login-body' class="bg-light">
<div class="card col-md-4 offset-md-4 mt-4">
    <div class="card-header-edge text-white">
        <strong>Register</strong>
    </div>
    <div class="card-body">
        <form id="register-frm">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Blood Type</label>
                <select class="form-select" name="blood_type" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="number" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Second Phone Number</label>
                <input type="number" name="phone_2" class="form-control" required>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-primary btn-block" name="submit">Register</button>
            </div>

        </form>
    </div>
</div>

</body>

<script>
    $(document).ready(function(){
        $('#register-frm').submit(function(e){
            e.preventDefault()
            $('#register-frm button').attr('disable',true)
            $('#register-frm button').html('Please wait...')

            $.ajax({
                url:'./save_member.php',
                method:'POST',
                data:$(this).serialize(),
                error:err=>{
                    console.log(err)
                    alert('An error occured');
                    $('#register-frm button').removeAttr('disable')
                    $('#register-frm button').html('Register')
                },
                success:function(resp){
                    if(resp == 1){
                        location.replace('./login_user.php')
                    }else{
                        alert("Use another username.")
                        $('#register-frm button').removeAttr('disable')
                        $('#register-frm button').html('Register')
                    }
                }
            })

        })
    })
</script>
</html>