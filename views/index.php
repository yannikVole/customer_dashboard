<?php include 'shared/header.php' ?>

    <div class="container">
        <form action="http://restful.api/api/customer/add" method="POST">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="first_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="last_name">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="" name="phone">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="address">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="city">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="state">
                </div>
            </div>
            <button class="btn btn-secondary form-control">Submit</button>
        </form>
        <?php include 'shared/customer_search.component.php'; ?>
    </div>

<?php include 'shared/footer.php' ?>
