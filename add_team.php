<?php
    if (isset($_POST['add_team'])) {
      include_once("create_database.php");

      // Retrieve and sanitize form inputs
      $team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
      $team_description = mysqli_real_escape_string($conn, $_POST['team_description']);
      $created_at = date('Y-m-d H:i:s');

      // Validate inputs
      if (empty($team_name) || empty($team_description)) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" id="alertmsg" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
          <strong>Error!</strong> All fields are required.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
          setTimeout(function() {
            window.location = "user_teams.php";
          }, 3000);
        </script>
      <?php
        exit;
      }

      // Insert team data into the teams table
      $insertQuery = "INSERT INTO teams (team_name, team_description, created_at, updated_at) VALUES ('$team_name', '$team_description', NOW(), NOW())";
      $result = mysqli_query($conn, $insertQuery);

      if ($result) {
        $team_id = mysqli_insert_id($conn);

        // Process team members
        if (!empty($_POST['members'])) {
          // Decode JSON string of member emails
          $members = json_decode($_POST['members'], true);
          $joined_at = date('Y-m-d H:i:s');

          // Insert each member into the team_members table
          foreach ($members as $user_email) {
            $safe_email = mysqli_real_escape_string($conn, $user_email);
            $role = 'Member';

            $memberQuery = "INSERT INTO team_members (team_id, user_email, role, joined_at) VALUES ('$team_id', '$safe_email', '$role', '$joined_at')";
            $memberResult = mysqli_query($conn, $memberQuery);

            if (!$memberResult) {
              echo "<div class='alert alert-danger'>Error adding member: " . mysqli_error($conn) . "</div>";
            }
          }
        } else {
          echo "<div class='alert alert-danger'>Please select at least one member!</div>";
        }

        // Success message
      ?>
        <div class="alert alert-success alert-dismissible fade show" id="alertmsg" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
          <strong>Success!</strong> Team added successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
          setTimeout(function() {
            window.location = "user_teams.php";
          }, 3000);
        </script>
      <?php
      } else {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" id="alertmsg" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
          <strong>Error!</strong> Failed to add team. Please try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
          setTimeout(function() {
            window.location = "user_teams.php";
          }, 3000);
        </script>
    <?php
      }
    }
    ?>
