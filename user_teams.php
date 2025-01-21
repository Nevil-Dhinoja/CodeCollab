<?php
session_start();
include_once("create_database.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email = $_SESSION['email'];
  $pass = $_SESSION['password'];
  $q = "SELECT * FROM users WHERE user_email = '$email'";
  $result = mysqli_query($conn, $q);
?>
  <!DOCTYPE html>
  <html lang="en">

  <!-- Mirrored from htmlstream.com/front-dashboard/user-profile-my-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 09:38:11 GMT -->

  <head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Teams</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo-mini.svg" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/css/vendor.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="assets/css/theme.minc619.css?v=1.0">

    <link rel="preload" href="assets/css/theme.min.css" data-hs-appearance="default" as="style">
    <link rel="preload" href="assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

    <style data-hs-appearance-onload-styles>
      * {
        transition: unset !important;
      }

      body {
        opacity: 0;
      }
    </style>

    <!-- ONLY DEV -->

    <style>
      body {
        opacity: 0;
      }
    </style>

  </head>
  <?php include_once("user_header.php") ?>

  <body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

    <script src="assets/js/hs.theme-appearance.js"></script>

    <script src="assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

    <?php while ($row = mysqli_fetch_array($result)) {
      $profile_complete = 0;

      // Check profile fields for completeness
      if (!empty($row['user_name'])) {
        $profile_complete++;
      }
      if (!empty($row['profile'])) {
        $profile_complete++;
      }
      if (!empty($row['user_email'])) {
        $profile_complete++;
      }
      if (!empty($row['Mobile_no'])) {
        $profile_complete++;
      }
      if (!empty($row['user_password'])) {
        $profile_complete++;
      }
      if (!empty($row['profile_header']) && $row['profile_header'] == 1) {
        $profile_complete++;
      }

      // Calculate the percentage based on the number of fields completed
      $total_fields = 6; // Total number of fields to track (user_name, profile, user_email, Mobile_no)
      $progress_percentage = ($profile_complete / $total_fields) * 100;
    }
    ?>
    <main id="content" role="main" class="main">
      <!-- Content -->
      <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
          <div class="row align-items-end mb-3">
            <div class="col-sm mb-2 mb-sm-0">

              <h1 class="page-header-title">Teams</h1>
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#shareWithPeopleModal">
                <i class="bi-plus me-1"></i> Add team
              </button>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->

          <!-- Nav -->
          <!-- Nav -->
          <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <span class="hs-nav-scroller-arrow-prev" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="bi-chevron-left"></i>
              </a>
            </span>

            <span class="hs-nav-scroller-arrow-next" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="bi-chevron-right"></i>
              </a>
            </span>

            <ul class="nav nav-tabs page-header-tabs" id="projectsTab" role="tablist">
              <li class="nav-item">
              </li>
            </ul>
          </div>
          <!-- End Nav -->
        </div>
        <!-- End Page Header -->

        <!-- Card -->
        <div class="card">
          <!-- Header -->
          <div class="card-header card-header-content-md-between">
            <div class="mb-2 mb-md-0">
              <form>
                <!-- Search -->
                <div class="input-group input-group-merge input-group-borderless">
                  <div class="input-group-prepend input-group-text">
                    <i class="bi-search"></i>
                  </div>
                  <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
                </div>
                <!-- End Search -->
              </form>
            </div>
            <!-- End Col -->

            <div class="d-grid d-sm-flex align-items-sm-center gap-2">
              <!-- Datatable Info -->
              <div id="datatableCounterInfo" style="display: none;">
                <div class="d-flex align-items-center">
                  <span class="fs-5 me-3">
                    <span id="datatableCounter">0</span> Selected
                  </span>

                  <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                    <i class="bi-trash"></i> Delete
                  </a>
                </div>
              </div>
              <!-- End Datatable Info -->
            </div>
          </div>
          <!-- End Header -->
          <!-- Table -->
          <div class="table-responsive datatable-custom">
            <table id="datatable" class="table table-borderless table-thead-bordered card-table" data-hs-datatables-options='{
                   "autoWidth": false,
                   "columnDefs": [{
                      "targets": [0, 4],
                      "orderable": false
                    }],
                   "columns": [
                      null,
                      null,
                      { "width": "50%" },
                      null,
                      null
                    ],
                   "order": [],
                   "info": {
                     "totalQty": "#datatableWithPaginationInfoTotalQty"
                   },
                   "search": "#datatableSearch",
                   "entries": "#datatableEntries",
                   "pageLength": 8,
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatablePagination"
                 }'>
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="table-column-pe-0">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                      <label class="form-check-label" for="datatableCheckAll"></label>
                    </div>
                  </th>
                  <th scope="col" class="table-column-ps-0">Team</th>
                  <th scope="col" style="min-width: 20rem;">Description</th>
                  <th scope="col">Members</th>
                  <th scope="col">Info</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td class="table-column-pe-0">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="teamDataCheck1">
                      <label class="form-check-label" for="teamDataCheck1"></label>
                    </div>
                  </td>
                  <td class="table-column-ps-0"><a href="#">#digitalmarketing</a></td>
                  <td>Our group promotes and sells products and services by leveraging online marketing tactics</td>
                  <td>
                    <div class="avatar-group avatar-group-xs avatar-circle">
                      <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Ella Lauda">
                        <img class="avatar-img" src="assets/img/160x160/img9.jpg" alt="Image Description">
                      </span>
                      <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                        <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                      </span>
                      <span class="avatar avatar-soft-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Antony Taylor">
                        <span class="avatar-initials">A</span>
                      </span>
                      <span class="avatar avatar-soft-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Sara Iwens">
                        <span class="avatar-initials">S</span>
                      </span>
                      <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Finch Hoot">
                        <img class="avatar-img" src="assets/img/160x160/img5.jpg" alt="Image Description">
                      </span>
                      <span class="avatar avatar-light avatar-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Sam Kart, Amanda Harvey and 1 more">
                        <span class="avatar-initials">+3</span>
                      </span>
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-white btn-sm" id="teamsDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                        More <i class="bi-chevron-down ms-1"></i>
                      </button>

                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown1">
                        <a class="dropdown-item" href="#">Rename team</a>
                        <a class="dropdown-item" href="#">Add to favorites</a>
                        <a class="dropdown-item" href="#">Archive team</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td class="table-column-pe-0">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="teamDataCheck2">
                      <label class="form-check-label" for="teamDataCheck2"></label>
                    </div>
                  </td>
                  <td class="table-column-ps-0"><a href="#">#ethereum</a></td>
                  <td>Focusing on innovative and disruptive business models</td>
                  <td>
                    <div class="avatar-group avatar-group-xs avatar-circle">
                      <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Sam Kart">
                        <img class="avatar-img" src="assets/img/160x160/img4.jpg" alt="Image Description">
                      </span>
                      <span class="avatar avatar-soft-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Teresa Eyker">
                        <span class="avatar-initials">T</span>
                      </span>
                      <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="Amanda Harvey">
                        <img class="avatar-img" src="assets/img/160x160/img10.jpg" alt="Image Description">
                      </span>
                      <span class="avatar" data-bs-toggle="tooltip" data-bs-placement="top" title="David Harrison">
                        <img class="avatar-img" src="assets/img/160x160/img3.jpg" alt="Image Description">
                      </span>
                      <span class="avatar avatar-soft-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Olivier L.">
                        <span class="avatar-initials">O</span>
                      </span>
                      <span class="avatar avatar-light avatar-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Brian Halligan, Rachel Doe and 7 more">
                        <span class="avatar-initials">+9</span>
                      </span>
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn btn-white btn-sm" id="teamsDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                        More <i class="bi-chevron-down ms-1"></i>
                      </button>

                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end" aria-labelledby="teamsDropdown2">
                        <a class="dropdown-item" href="#">Rename team</a>
                        <a class="dropdown-item" href="#">Add to favorites</a>
                        <a class="dropdown-item" href="#">Archive team</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- End Table -->

          <!-- Footer -->
          <div class="card-footer">
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
              <div class="col-sm mb-2 mb-sm-0">
                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                  <span class="me-2">Showing:</span>

                  <!-- Select -->
                  <div class="tom-select-custom">
                    <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                      <option value="4">4</option>
                      <option value="6">6</option>
                      <option value="8" selected>8</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                  <!-- End Select -->

                  <span class="text-secondary me-2">of</span>

                  <!-- Pagination Quantity -->
                  <span id="datatableWithPaginationInfoTotalQty"></span>
                </div>
              </div>
              <!-- End Col -->

              <div class="col-sm-auto">
                <div class="d-flex justify-content-center justify-content-sm-end">
                  <!-- Pagination -->
                  <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
          <!-- End Footer -->
        </div>
        <!-- End Table -->
      </div>
      <!-- End Card -->
      </div>
      <!-- End Content -->

      <!-- Footer -->


      <!-- End Col -->
      </div>
      <!-- End Row -->
      </div>

      <!-- End Footer -->
    </main>
    <div class="modal fade" id="shareWithPeopleModal" tabindex="-1" aria-labelledby="shareWithPeopleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="shareWithPeopleModalLabel">Create New Team</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form id="createTeamForm">
              <!-- Team Name -->
              <div class="mb-4">
                <div class="input-group mb-2 mb-sm-0">
                  <input type="text" class="form-control" name="team_name" placeholder="Team Name" required>
                </div>
              </div>

              <!-- Team Description -->
              <div class="mb-4">
                <div class="input-group mb-2 mb-sm-0">
                  <textarea class="form-control" name="team_description" placeholder="Team Description" rows="3"></textarea>
                </div>
              </div>

              <!-- Team Creator Role -->
              <div class="mb-4">
                <label class="form-label">What is the role of the member?</label>
                <div class="input-group mb-2 mb-sm-0">
                  <input type="text" class="form-control" name="role" placeholder="Viewer" required readonly>
                </div>
              </div>

              <!-- Created At -->
              <div class="mb-4">
                <label class="form-label">Created At</label>
                <input type="text" class="form-control" id="createdAt" name="created_at" readonly>
              </div>

              <!-- Search and Add Members -->
              <div class="mb-4">
                <label class="form-label">Search and Add Team Members</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="userSearch"
                    placeholder="Type to search for users..."
                    autocomplete="off">
                </div>

                <!-- Search Results -->
                <div id="searchResults" class="border rounded mt-2" style="max-height: 200px; overflow-y: auto; display: none;">
                  <!-- Search results will appear here -->
                </div>
              </div>

              <!-- Selected Users -->
              <div class="mt-3">
                <label class="form-label">Selected Team Members</label>
                <div id="selectedUsers" class="border rounded p-2" style="min-height: 100px;">
                  <!-- Selected users will appear here -->
                </div>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary w-100" id="createTeamButton">Create Team</button>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Auto-generate the created_at timestamp
      document.getElementById('shareWithPeopleModal').addEventListener('show.bs.modal', () => {
        const createdAtField = document.getElementById('createdAt');
        const now = new Date();
        createdAtField.value = now.toISOString().slice(0, 19).replace('T', ' ');
      });
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const selectedUsers = new Map();
        let searchTimeout = null;

        // Get DOM elements
        const userSearch = document.getElementById('userSearch');
        const searchResults = document.getElementById('searchResults');
        const selectedUsersContainer = document.getElementById('selectedUsers');

        // Style for search results and selected users
        const style = document.createElement('style');
        style.textContent = `
    .search-result-item {
        padding: 8px 12px;
        cursor: pointer;
        border-bottom: 1px solid rgb(56, 68, 80);
    }

    .search-result-item:last-child {
        border-bottom: none;
    }

    .search-result-item:hover {
        background-color: rgb(48, 52, 56);
    }

    .selected-user-tag {
        display: inline-flex;
        align-items: center;
        background-color: rgb(65, 71, 77);
        border-radius: 4px;
        padding: 4px 8px;
        margin: 2px;
        font-size: 0.875rem;
    }

    .remove-user {
        cursor: pointer;
        color: #dc3545;
        margin-left: 8px;
        font-size: 1.2rem;
        line-height: 1;
    }

    .remove-user:hover {
        color: #bb2d3b;
    }
`;

        document.head.appendChild(style);

        // Handle search input with debounce
        userSearch.addEventListener('input', () => {
          clearTimeout(searchTimeout);
          const query = userSearch.value.trim();

          if (query.length >= 1) {
            // Show loading state
            searchResults.innerHTML = '<div class="p-3 text-center">Searching...</div>';
            searchResults.style.display = 'block';

            searchTimeout = setTimeout(() => {
              fetch(`search_users.php?query=${query}`)
                .then(response => response.json())
                .then(data => {
                  console.log('Search results:', data);
                  if (userSearch.value.trim().length > 0) { // Only display if search input still has text
                    displaySearchResults(data);
                  }
                })
                .catch(error => {
                  console.error('Error fetching search results:', error);
                  if (userSearch.value.trim().length > 0) { // Only display if search input still has text
                    searchResults.innerHTML = '<div class="p-3 text-center text-danger">Error searching users</div>';
                    searchResults.style.display = 'block';
                  }
                });
            }, 300);
          } else {
            searchResults.style.display = 'none';
          }
        });

        // Display search results
        function displaySearchResults(users) {
          searchResults.innerHTML = '';

          if (Array.isArray(users) && users.length > 0) {
            // Remove the filtering here since the database is already providing different users
            users.forEach(user => {
              const userItem = document.createElement('div');
              userItem.classList.add('search-result-item');
              userItem.innerHTML = `
                <strong>${user.user_name}</strong><br>
                <small class="text-muted">${user.user_email}</small>
            `;
              userItem.dataset.userId = user.user_id;
              userItem.dataset.userName = user.user_name;
              userItem.dataset.userEmail = user.user_email;

              userItem.addEventListener('click', () => {
                addSelectedUser(user.user_id, user.user_name, user.user_email);
                searchResults.style.display = 'none';
                userSearch.value = '';
                // Focus back on search input for adding more users
                userSearch.focus();
              });

              searchResults.appendChild(userItem);
            });
            searchResults.style.display = 'block';
          } else {
            searchResults.innerHTML = '<div class="p-3 text-center text-muted">No users found</div>';
            searchResults.style.display = 'block';
          }
        }
        function renderSelectedUsers() {
  // Clear the container
  selectedUsersContainer.innerHTML = '';

  // Loop through the selectedUsers map and display all users
  selectedUsers.forEach((user, id) => {
    const userTag = document.createElement('div');
    userTag.classList.add('selected-user-tag');
    userTag.dataset.userId = id;
    userTag.innerHTML = `
      <span>${user.name}</span>
      <small class="text-muted">(${user.email})</small>
      <span class="remove-user">&times;</span>
    `;

    // Add click listener to remove the user
    userTag.querySelector('.remove-user').addEventListener('click', (e) => {
      e.stopPropagation(); // Prevent event bubbling
      selectedUsers.delete(id); // Remove the user from the map
      renderSelectedUsers(); // Re-render the selected users
    });

    selectedUsersContainer.appendChild(userTag);
  });
}

        // Add selected user
        function addSelectedUser(userId, userName, userEmail) {
          // Add the user to the map
          selectedUsers.set(userId, {
            name: userName,
            email: userEmail
          });

          // Clear and re-render the selected users
          selectedUsersContainer.innerHTML = '';
          selectedUsers.forEach((user, id) => {
            const userTag = document.createElement('div');
            userTag.classList.add('selected-user-tag');
            userTag.dataset.userId = id;
            userTag.innerHTML = `
        <span>${user.name}</span>
        <small class="text-muted">(${user.email})</small>
        <span class="remove-user">&times;</span>
    `;

            // Add click listener to remove the user
            userTag.querySelector('.remove-user').addEventListener('click', (e) => {
              e.stopPropagation(); // Prevent event bubbling
              selectedUsers.delete(id); // Remove user from map
              userTag.remove(); // Remove the user tag from UI
            });

            selectedUsersContainer.appendChild(userTag);
          });
        }

        // Handle form submission
        const createTeamForm = document.getElementById('createTeamForm');
        createTeamForm.addEventListener('submit', (e) => {
          e.preventDefault();

          if (selectedUsers.size === 0) {
            alert('Please select at least one team member.');
            return;
          }

          const selectedUsersArray = Array.from(selectedUsers.entries()).map(([id, data]) => ({
            id: id,
            name: data.name,
            email: data.email
          }));

          console.log('Selected team members:', selectedUsersArray);
          alert('Team created successfully!');

          // Reset form and selections
          createTeamForm.reset();
          selectedUsers.clear();
          selectedUsersContainer.innerHTML = '';
          searchResults.style.display = 'none';
        });

        // Close search results when clicking outside
        document.addEventListener('click', (e) => {
          if (!userSearch.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
          }
        });

        // Ensure search results show when focusing back on search input
        userSearch.addEventListener('focus', () => {
          if (userSearch.value.trim().length > 0) {
            // Trigger the search again
            userSearch.dispatchEvent(new Event('input'));
          }
        });
      });
    </script>


    <script src="assets/js/vendor.min.js"></script>
    <script>
      $(document).on('ready', function() {
        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init($('#datatable'), {
          select: {
            style: 'multi',
            selector: 'td:first-child input[type="checkbox"]',
            classMap: {
              checkAll: '#datatableCheckAll',
              counter: '#datatableCounter',
              counterInfo: '#datatableCounterInfo'
            }
          },
          language: {
            zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
          }
        });

        const datatable = HSCore.components.HSDatatables.getItem(0)

        $('.js-datatable-filter').on('change', function() {
          var $this = $(this),
            elVal = $this.val(),
            targetColumnIndex = $this.data('target-column-index');

          if (elVal === 'null') elVal = ''

          datatable.column(targetColumnIndex).search(elVal).draw();
        });
      });
    </script>
    <?php
    if (isset($_POST['update'])) {
      include_once("create_database.php");
      // Handle file upload
      if (isset($_POST['update']) && isset($_FILES['file'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          $profile_header = $_FILES["file"]["name"];
          $updateQuery = "UPDATE users SET profile_header = '$profile_header', profile_header_updated = 1 WHERE user_email = '$email'";
          $result3 = mysqli_query($conn, $updateQuery);
        } else {
          echo "Error uploading file.";
        }
      }
      if ($result3) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" id="alertmsg" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
          <strong>Success!</strong> Header Updated.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
          setTimeout(function() {
            window.location = "dashboard.php"; // Redirect after 3 seconds
          }, 3000);
        </script>
      <?php
      } else {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" id="alertmsg" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
          <strong>Error!</strong> Select Image.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
          setTimeout(function() {
            window.location = "dashboard.php"; // Redirect after 3 seconds
          }, 3000);
        </script>
    <?php
      }
    }

    ?>
  <?php
  include_once("user_footer.php");
} else {
  header("Location: login_user.php");
}
  ?>
  </body>

  </html>