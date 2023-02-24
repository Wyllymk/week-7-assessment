<h2 class="text-center text-primary mt-5"><u>Create Employees</u> </h2>
<div class="container mt-5">
    <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6 card shadow">
        <?php if(isset($error_message)) { ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
            <form class="form"action="" method="post">
                <div class="form-group">
                    <label for="">First Name:</label>
                    <input type="text" name="firstname" id="name" class="form-control" placeholder="Input First Name">
                </div>
                <div class="form-group">
                    <label for="">Last Name:</label>
                    <input type="text" name="lastname" id="name" class="form-control" placeholder="Input Last Name">
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Input Email">
                </div>
                <div class="form-group">
                    <label for="">Phone Number:</label>
                    <input type="number" name="phone" id="project" class="form-control" placeholder="Enter Phone Number">
                </div>
                <div class="row justify-content-center">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <input type="submit" name="submitemployee" value="Submit" class="btn btn-primary px-5 mt-2">
                        </div>

                </div>
            </form>
        </div>
    </div>
    
</div>