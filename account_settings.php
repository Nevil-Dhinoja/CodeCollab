<?php
session_start();
include_once("create_database.php");
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
  $email = $_SESSION['email'];
  $pass = $_SESSION['password'];
  $q = "SELECT * FROM users WHERE user_email = '$email'";
  $result = mysqli_query($conn, $q);
  while ($row = mysqli_fetch_array($result)) {
      $name = $row['user_name'];
      $mob = $row['Mobile_no'];
      $email = $row['user_email'];
      $pass = $row['user_password'];
      $profile = $row['profile'];
  }
  if (isset($_POST['lgn_btn'])) {
      $current = $_POST['current'];
      $new = $_POST['new'];
      $confirm = $_POST['confirm'];
      $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/";

      if ($current === $pass) {
          if (preg_match($passwordPattern, $new)) {
              if ($new === $confirm) {
                  $query = "UPDATE users SET user_password='$new' WHERE user_email='$email'";
                  $res = mysqli_query($conn, $query);

                  if ($res) {
                      echo "<div class='alert alert-success'>Password Changed.</div>";
                  } else {
                      echo "<div class='alert alert-dark'>Error in changing your password.</div>";
                  }
              } else {
                  echo "<div class='alert alert-danger'>New password and confirm password must match.</div>";
              }
          } else {
              echo "<div class='alert alert-danger'>New password must be between 8-16 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.</div>";
          }
      } else {
          echo "<div class='alert alert-danger'>Incorrect current password.</div>";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Account Settings</title>

    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/vendor.min.css">
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
    <style>
        body {
            opacity: 0;
        }
    </style>
    <script>
        window.hs_config = {
            "autopath": "@@autopath",
            "deleteLine": "hs-builder:delete",
            "deleteLine:build": "hs-builder:build-delete",
            "deleteLine:dist": "hs-builder:dist-delete",
            "previewMode": false,
            "startPath": "/index.html",
            "vars": {
                "themeFont": "https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap",
                "version": "?v=1.0"
            },
            "layoutBuilder": {
                "extend": {
                    "switcherSupport": true
                },
                "header": {
                    "layoutMode": "default",
                    "containerMode": "container-fluid"
                },
                "sidebarLayout": "default"
            },
            "themeAppearance": {
                "layoutSkin": "default",
                "sidebarSkin": "default",
                "styles": {
                    "colors": {
                        "primary": "#377dff",
                        "transparent": "transparent",
                        "white": "#fff",
                        "dark": "132144",
                        "gray": {
                            "100": "#f9fafc",
                            "900": "#1e2022"
                        }
                    },
                    "font": "Inter"
                }
            },
            "languageDirection": {
                "lang": "en"
            },
            "skipFilesFromBundle": {
                "dist": ["assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "assets/js/demo.js"],
                "build": ["assets/css/theme.css", "assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js", "assets/js/demo.js", "assets/css/theme-dark.html", "assets/css/docs.css", "assets/vendor/icon-set/style.html", "assets/js/hs.theme-appearance.js", "assets/js/hs.theme-appearance-charts.js", "node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.html", "assets/js/demo.js"]
            },
            "minifyCSSFiles": ["assets/css/theme.css", "assets/css/theme-dark.css"],
            "copyDependencies": {
                "dist": {
                    "*assets/js/theme-custom.js": ""
                },
                "build": {
                    "*assets/js/theme-custom.js": "",
                    "node_modules/bootstrap-icons/font/*fonts/**": "assets/css"
                }
            },
            "buildFolder": "",
            "replacePathsToCDN": {},
            "directoryNames": {
                "src": "./src",
                "dist": "./dist",
                "build": "./build"
            },
            "fileNames": {
                "dist": {
                    "js": "theme.min.js",
                    "css": "theme.min.css"
                },
                "build": {
                    "css": "theme.min.css",
                    "js": "theme.min.js",
                    "vendorCSS": "vendor.min.css",
                    "vendorJS": "vendor.min.js"
                }
            },
            "fileTypes": "jpg|png|svg|mp4|webm|ogv|json"
        }
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if (/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)) {
                c = hex.substring(1).split('');
                if (c.length == 3) {
                    c = [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c = '0x' + c.join('');
                return 'rgba(' + [(c >> 16) & 255, (c >> 8) & 255, c & 255].join(',') + ',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>
</head>
<?php include_once("user_header.php") ?>
<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">
    <script src="assets/js/hs.theme-appearance.js"></script>
    <script src="assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title">Settings</h1>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <a class="btn btn-primary" href="my_profile.php">
                            <i class="bi-person-fill me-1"></i> My profile
                        </a>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Page Header -->

            <div class="row">
                <div class="col-lg-3">
                    <!-- Navbar -->
                    <div class="navbar-expand-lg navbar-vertical mb-3 mb-lg-5">
                        <!-- Navbar Toggle -->
                        <!-- Navbar Toggle -->
                        <div class="d-grid">
                            <button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse" data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu">
                                <span class="d-flex justify-content-between align-items-center">
                                    <span class="text-dark">Menu</span>

                                    <span class="navbar-toggler-default">
                                        <i class="bi-list"></i>
                                    </span>

                                    <span class="navbar-toggler-toggled">
                                        <i class="bi-x"></i>
                                    </span>
                                </span>
                            </button>
                        </div>
                        <!-- End Navbar Toggle -->
                        <!-- End Navbar Toggle -->

                        <!-- Navbar Collapse -->
                        <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                            <ul id="navbarSettings" class="js-sticky-block js-scrollspy card card-navbar-nav nav nav-tabs nav-lg nav-vertical" data-hs-sticky-block-options='{
                     "parentSelector": "#navbarVerticalNavMenu",
                     "targetSelector": "#header",
                     "breakpoint": "lg",
                     "startPoint": "#navbarVerticalNavMenu",
                     "endPoint": "#stickyBlockEndPoint",
                     "stickyOffsetTop": 20
                   }'>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#content">
                                        <i class="bi-person nav-icon"></i> Basic information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#emailSection">
                                        <i class="bi-at nav-icon"></i> Email
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#passwordSection">
                                        <i class="bi-key nav-icon"></i> Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#deleteAccountSection">
                                        <i class="bi-trash nav-icon"></i> Delete account
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Navbar Collapse -->
                    </div>
                    <!-- End Navbar -->
                </div>

                <div class="col-lg-9">
                    <div class="d-grid gap-3 gap-lg-5">
                        <!-- Card -->
                        <div class="card">
                            <!-- Profile Cover -->
                            <div class="profile-cover">
                                <div class="profile-cover-img-wrapper">
                                    <img id="profileCoverImg" class="profile-cover-img" src="assets/img/1920x400/img2.jpg" alt="Image Description">

                                    <!-- Custom File Cover -->
                                    <div class="profile-cover-content profile-cover-uploader p-3">
                                        <form action="account_settings.php" method="post">
                                        <input type="submit" name="save" class="js-file-attach profile-cover-uploader-input" id="profileCoverUplaoder">
                                        <label class="profile-cover-uploader-label btn btn-sm btn-white" for="profileCoverUplaoder">
                                            <i class="bi-camera-fill"></i>
                                            <span class="d-none d-sm-inline-block ms-1" name="save">Update header</span>
                                        </label>
                                        </form>
                                    </div>
                                    <!-- End Custom File Cover -->
                                </div>
                            </div>
                            <!-- End Profile Cover -->

                            <!-- Avatar -->
                            <label class="avatar avatar-xxl avatar-circle avatar-uploader profile-cover-avatar" for="editAvatarUploaderModal">
                                <img id="editAvatarImgModal" class="avatar-img" src="assets/img/160x160/img6.jpg" alt="Image Description">

                                <input type="file" class="js-file-attach avatar-uploader-input" name="file"  id="editAvatarUploaderModal" data-hs-file-attach-options='{
                            "textTarget": "#editAvatarImgModal",
                            "mode": "image",
                            "targetAttr": "src",
                            "allowTypes": [".png", ".jpeg", ".jpg"]
                         }'>

                                <span class="avatar-uploader-trigger">
                                    <script>
                                    </script>
                                    <i class="bi-pencil-fill avatar-uploader-icon shadow-sm"></i>
                                </span>
                            </label>
                            <!-- End Avatar -->
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title h4">Basic information</h2>
                            </div>

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <form>
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Full name <i class="bi-question-circle text-body ms-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Displayed on public forums, such as Front."></i></label>

                                        <div class="col-sm-9">
                                            <div class="input-group input-group-sm-vertical">
                                                <input type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="Your first name" aria-label="Your first name" value="<?php echo "$name"  ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email</label>

                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" id="emailLabel" placeholder="Email" aria-label="Email" value="<?php echo "$email"  ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone <span class="form-label-secondary">(Optional)</span></label>

                                        <div class="col-sm-9">
                                            <input type="text" class="js-input-mask form-control" name="phone" id="phoneLabel" placeholder="+x(xxx)xxx-xx-xx" aria-label="+x(xxx)xxx-xx-xx" value="<?php echo "$mob"  ?>" data-hs-mask-options='{
                               "mask": "+0(000)000-00-00"
                             }'>
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="organizationLabel" class="col-sm-3 col-form-label form-label">Password</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="password" id="organizationLabel" placeholder="Your organization" aria-label="Your organization" value="<?php echo "$pass"  ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" name="save">Save changes</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->

                        <!-- Card -->
                        <div id="passwordSection" class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change your password</h4>
                            </div>

                            <!-- Body -->
                            <div class="card-body">
                                <!-- Form -->
                                <form id="changePasswordForm" method="POST" enctype="multipart/form-data">
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="currentPasswordLabel" class="col-sm-3 col-form-label form-label">Current password</label>

                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="current" id="currentPasswordLabel" placeholder="Enter current password" aria-label="Enter current password">
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="newPassword" class="col-sm-3 col-form-label form-label">New password</label>

                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new" id="newPassword" placeholder="Enter new password" aria-label="Enter new password">
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="confirmNewPasswordLabel" class="col-sm-3 col-form-label form-label">Confirm new password</label>

                                        <div class="col-sm-9">
                                            <div class="mb-3">
                                                <input type="password" class="form-control" name="confirm" id="confirmNewPasswordLabel" placeholder="Confirm your new password" aria-label="Confirm your new password">
                                            </div>

                                            <h5>Password requirements:</h5>

                                            <p class="fs-6 mb-2">Ensure that these requirements are met:</p>

                                            <ul class="fs-6">
                                                <li>Minimum 8 characters long - the more, the better</li>
                                                <li>At least one lowercase character</li>
                                                <li>At least one uppercase character</li>
                                                <li>At least one number, symbol, or whitespace character</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Form -->

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" name="lgn_btn">Save Changes</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                            <!-- End Body -->
                        </div>

                        <!-- Card -->
                        <div id="deleteAccountSection" class="card">
                            <div class="card-header">
                                <h4 class="card-title">Delete your account</h4>
                            </div>

                            <!-- Body -->
                            <div class="card-body">
                                <p class="card-text">When you delete your account, you lose access to Front account services, and we permanently delete your personal data. You can cancel the deletion for 14 days.</p>

                                <div class="mb-4">
                                    <!-- Form Check -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="deleteAccountCheckbox">
                                        <label class="form-check-label" for="deleteAccountCheckbox">
                                            Confirm that I want to delete my account.
                                        </label>
                                    </div>
                                    <!-- End Form Check -->
                                </div>

                                <div class="d-flex justify-content-end gap-3">
                                    <a class="btn btn-white" href="#">Learn more</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            <!-- End Body -->
                        </div>
                        <!-- End Card -->
                    </div>

                    <!-- Sticky Block End Point -->
                    <div id="stickyBlockEndPoint"></div>
                </div>
            </div>
            <!-- End Row -->
        </div>

        <!-- End Footer -->

    </main>
    <?php
    include_once("user_footer.php");
    ?>
        <?php
    if (isset($_POST['save'])) {
        $mobile1 = $_POST['phone'];

        // Handle file upload
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $profile1 = $_FILES['file']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($profile1);

            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            } else {
                $profile1 = '';
            }
        }

        if (isset($profile1) && !empty($profile1)) {
            $b = "UPDATE users SET `Mobile_no`=$mobile1, `profile`='$profile1' WHERE `user_email`='$email1'";
        } else {
            $b = "UPDATE users SET `Mobile_no`=$mobile1 WHERE `user_email`='$email1'";
        }

        $result2 = mysqli_query($conn, $b);
        if ($result2) {
    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
                <strong>Success!</strong> Your details have been updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <script>
                setTimeout(function() {
                    window.location = "account_settings.php"; // Redirect after 3 seconds
                }, 2000);
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Error in data updating");
                window.location = "account_settings.php";
            </script>
    <?php
        }
    }
    ?>
   <?php
    } 
    else {
        header("Location: login_user.php");
      }
?>
</body>


</html>