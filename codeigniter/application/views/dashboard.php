<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2>Dashboard</h2>
        <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
    </div>
    <p>Welcome to your dashboard. Manage your account and trips from here.</p>
    
    <!-- Account Management -->
    <div class="mt-4">
        <h3>Account Management</h3>
        <form id="userForm" action="<?php echo site_url('dashboard/add_user'); ?>" method="post">
            <div class="form-group">
                <label for="accountName">Name</label>
                <input type="text" class="form-control" name="name" id="accountName" placeholder="Enter name" required>
            </div>
            <div class="form-group">
                <label for="accountEmail">Email</label>
                <input type="email" class="form-control" name="email" id="accountEmail" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
            </div>
            <button id="formButton" type="submit" class="btn btn-primary">Submit Account</button>
        </form>

        <h4 class="mt-4">Accounts List</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">UserId</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?php echo $user->id; ?></th>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm edit-btn" 
                            data-userid="<?php echo $user->id; ?>" 
                            data-username="<?php echo $user->name; ?>" 
                            data-useremail="<?php echo $user->email; ?>">
                        Edit
                        </a>
                        <a href="<?php echo site_url('dashboard/delete_user/' . $user->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Trip Management -->
    <div class="mt-4">
        <h3>Trip Management</h3>
        <form id="tripForm" action="<?php echo site_url('dashboard/add_trip'); ?>" method="post">
            <div class="form-group">
                <label for="tripName">Trip Name</label>
                <input type="text" class="form-control" id="tripName" name="name" placeholder="Enter trip name" required>
            </div>
            <div class="form-group">
                <label for="tripDescription">Description</label>
                <textarea class="form-control" id="tripDescription" name="description" rows="3" placeholder="Enter trip description" required></textarea>
            </div>
            <button type="submit" id="tripButton" class="btn btn-primary">Submit Trip</button>
        </form>
        
        <h4 class="mt-4">Trips List</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">TripId</th>
                    <th scope="col">Trip Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trips as $trip): ?>
                <tr>
                    <th scope="row"><?php echo $trip->id; ?></th>
                    <td><?php echo $trip->name; ?></td>
                    <td><?php echo $trip->description; ?></td>
                    <td>
                        <button class="btn btn-info btn-sm edit-trip-btn" data-tripid="<?php echo $trip->id; ?>" data-tripname="<?php echo $trip->name; ?>" data-tripdescription="<?php echo $trip->description; ?>">Edit</button>
                        <a href="<?php echo site_url('dashboard/delete_trip/' . $trip->id); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to set form for editing
        function setupEdit(userId, name, email) {
            document.getElementById('accountName').value = name;
            document.getElementById('accountEmail').value = email;
            // Optional: Clear the password field or you can also populate it if you have a placeholder
            document.getElementById('password').value = '';

            document.getElementById('userForm').action = "<?php echo site_url('dashboard/update_user/'); ?>" + userId;
            document.getElementById('formButton').textContent = 'Edit Account';
        }
        // Attach edit event listeners
        Array.from(document.querySelectorAll('.edit-btn')).forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the link from navigating
                var userId = this.dataset.userid;
                var name = this.dataset.username;
                var email = this.dataset.useremail;
                setupEdit(userId, name, email);
            });
        });
        // Function to set trip form for editing
        function setupTripEdit(tripId, tripName, tripDescription) {
            document.getElementById('tripName').value = tripName;
            document.getElementById('tripDescription').value = tripDescription;

            document.getElementById('tripForm').action = "<?php echo site_url('dashboard/update_trip/'); ?>" + tripId;
            document.getElementById('tripButton').textContent = 'Edit Trip';
        }
        // Attach edit event listeners to trip edit buttons
        Array.from(document.querySelectorAll('.edit-trip-btn')).forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default button behavior
                var tripId = this.dataset.tripid;
                var tripName = this.dataset.tripname;
                var tripDescription = this.dataset.tripdescription;
                setupTripEdit(tripId, tripName, tripDescription);
            });
        });
    });
</script>


</body>
</html>
