<div align="center">

<img src="https://capsule-render.vercel.app/api?type=venom&color=gradient&customColorList=2,12,24&height=260&section=header&text=CodeCollab&fontSize=72&fontColor=fff&fontAlignY=42&desc=Collaborative%20Project%20Management%20Platform%20for%20Developers&descAlignY=62&descSize=15&descColor=fff&animation=twinkling" width="100%"/>

<br/>

<p align="center">
  <img src="https://readme-typing-svg.demolab.com?font=Fira+Code&weight=700&size=18&duration=2000&pause=600&color=gradient&customColorList=2,12,24&center=true&vCenter=true&width=800&lines=Teams+%C2%B7+Projects+%C2%B7+File+Manager+%C2%B7+Admin+Dashboard.;Built+with+PHP+%2B+MySQL+%2B+PHPMailer.;A+full-featured+collaboration+platform+from+scratch." alt="Typing SVG" />
</p>

<br/>

<img src="https://img.shields.io/badge/Author-Nevil%20Dhinoja-2196F3?style=for-the-badge&logo=github&logoColor=white&labelColor=0D1117"/>
<img src="https://img.shields.io/badge/Type-Group%20Project-22C55E?style=for-the-badge&labelColor=0D1117"/>
<img src="https://img.shields.io/badge/Backend-PHP%20%2B%20MySQL-777BB4?style=for-the-badge&logo=php&logoColor=white&labelColor=0D1117"/>
<img src="https://img.shields.io/badge/Frontend-HTML%20%2F%20CSS%20%2F%20JS%20%2F%20SCSS-FF9800?style=for-the-badge&labelColor=0D1117"/>
<img src="https://img.shields.io/badge/Email-PHPMailer-EF4444?style=for-the-badge&labelColor=0D1117"/>
<img src="https://img.shields.io/badge/Commits-51-6366F1?style=for-the-badge&labelColor=0D1117"/>

</div>

---

## What It Does

**CodeCollab** is a full-featured web platform built for developer teams to manage projects, collaborate with teammates, handle file uploads, and track work — all in one place.

Think of it as a lightweight project management tool — built entirely from scratch with PHP, MySQL, and a clean frontend. No framework shortcuts. Raw full-stack engineering.

---

## Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                      Browser (Client)                           │
│                                                                 │
│  HTML · CSS · SCSS · JavaScript · Gulp (build pipeline)         │
│                                                                 │
│  ┌──────────┐ ┌──────────┐ ┌───────────┐ ┌──────────────────┐   │
│  │  Landing │ │   Auth   │ │  Dashboard│ │  Admin Dashboard │   │
│  │  index   │ │ login /  │ │ projects  │ │  users · stats   │   │
│  │          │ │ register │ │ teams     │ │  billing         │   │
│  └─────┬────┘ └─────┬────┘ └─────┬─────┘ └────────┬─────────┘   │
└────────┼────────────┼────────────┼─────────────────┼───────────┘
         │            │            │                 │
         └────────────┴────────────┴─────────────────┘
                               │  PHP processes all requests
                               ▼
┌─────────────────────────────────────────────────────────────────┐
│                     PHP Backend Layer                           │
│                                                                 │
│  ┌──────────────┐  ┌──────────────┐  ┌───────────────────────┐  │
│  │  Auth System │  │ Project CRUD │  │  Team Management      │  │ 
│  │  register    │  │  my_projects │  │  add_team · my_teams  │  │
│  │  login       │  │  edit · del  │  │  one_user_team        │  │
│  │  activation  │  │  overview    │  │                       │  │
│  └──────┬───────┘  └──────┬───────┘  └───────────┬───────────┘  │
│         │                 │                      │              │
│  ┌──────▼───────┐  ┌──────▼───────┐  ┌───────────▼───────────┐  │
│  │  Email Flow  │  │  File Manager│  │  Admin Panel          │  │
│  │  PHPMailer   │  │  uploads/    │  │  admin_dashboard      │  │
│  │  activation  │  │  project     │  │  users · billing      │  │
│  │  forgot pass │  │  files       │  │  add_user             │  │
│  └──────┬───────┘  └──────────────┘  └───────────────────────┘  │
└─────────┼───────────────────────────────────────────────────────┘
          │
          ▼
┌─────────────────────────────────────────────────────────────────┐
│                         MySQL Database                          │
│                                                                 │
│   users · projects · teams · team_members · files · billing     │
│   sessions · password_resets · activation_tokens                │
└─────────────────────────────────────────────────────────────────┘
```

---

## Features

### User Features
- **Registration + Email Activation** — PHPMailer sends activation link on signup
- **Login / Logout** — session-based authentication with password hashing
- **Forgot Password** — secure password reset via email link
- **User Profile** — view and update personal information
- **My Projects** — create, view, edit, and delete personal projects
- **My Teams** — create teams, add members, view team projects
- **Project File Manager** — upload and manage files per project
- **Search Users** — find other users on the platform

### Admin Features
- **Admin Dashboard** — overview of all users, projects, and platform stats
- **User Management** — add, view, and manage all users
- **Billing** — account billing management
- **Platform Oversight** — full visibility into all teams and projects

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Frontend | HTML5, CSS3, SCSS, JavaScript |
| Build Pipeline | Gulp (SCSS compilation, asset bundling) |
| Backend | PHP (procedural) |
| Database | MySQL |
| Email | PHPMailer |
| File Uploads | PHP native file handling |
| Auth | PHP Sessions + password_hash |
| Server | Apache / XAMPP |

---

## Project Structure

```
CodeCollab/
├── pages/                      # Page-specific PHP includes
├── partials/                   # Reusable header/footer components
│   ├── header.php
│   ├── footer.php
│   └── user_header.php
├── assets/                     # CSS, JS, images
├── gulp-tasks/                 # Gulp build configuration
├── uploads/                    # User-uploaded project files
├── PHPMailer/                  # Email library
│
├── index.php                   # Landing page
├── register.php                # User registration
├── register_insert.php         # Registration handler
├── account_activation.php      # Email activation
├── login_user.php              # Login page
├── login_action.php            # Login handler
├── logout.php                  # Session destroy
├── forgot.php                  # Forgot password page
├── process-forgot-password.php # Reset handler
├── change_pass.php             # Password change
│
├── dashboard.php               # User dashboard
├── my_projects.php             # User's projects list
├── one_project_overview.php    # Single project view
├── one_user_project.php        # Project details
├── project_file_manager.php    # File upload/manage
│
├── my_teams.php                # User's teams list
├── add_team.php                # Create new team
├── one_user_team.php           # Team details
├── teams.php                   # All teams browse
│
├── my_profile.php              # User profile
├── update_profile.php          # Profile update handler
├── user_profile.php            # Public profile view
├── account_settings.php        # Account settings
├── search_users.php            # User search
│
├── admin_dashboard.php         # Admin overview
├── users.php                   # Admin user management
├── add_user.php                # Admin add user
├── account_bill.php            # Billing page
│
├── create_database.php         # DB setup helper
├── create_table.php            # Table creation helper
├── edit.php                    # Edit handler
├── delete.php                  # Delete handler
│
└── documentation.php           # Platform documentation
```

---

## Getting Started

### Prerequisites
- XAMPP (Apache + MySQL + PHP)
- A browser
- Node.js (for Gulp asset compilation)

### Setup
```bash
# Clone the repo
git clone https://github.com/Nevil-Dhinoja/CodeCollab.git

# Move to XAMPP htdocs
cp -r CodeCollab/ /xampp/htdocs/codecollab/

# Start XAMPP — Apache + MySQL

# Create the database
# Open browser → http://localhost/codecollab/create_database.php
# Then → http://localhost/codecollab/create_table.php

# Configure PHPMailer
# Edit PHPMailer/src/PHPMailer.php with your SMTP credentials

# Install Gulp dependencies (optional — for SCSS recompilation)
npm install
gulp

# Open the app
# http://localhost/codecollab/
```

---

## Key Pages

| URL | What it does |
|-----|-------------|
| `/index.php` | Landing page |
| `/register.php` | Sign up |
| `/login_user.php` | Login |
| `/dashboard.php` | User home after login |
| `/my_projects.php` | Your projects |
| `/my_teams.php` | Your teams |
| `/admin_dashboard.php` | Admin panel |
| `/project_file_manager.php` | File uploads per project |
| `/search_users.php` | Find users |

---

## What I Learned Building This

- Full PHP MVC-style architecture from scratch — no framework
- Session management, auth flows, password hashing
- Email activation and password reset flows with PHPMailer
- MySQL schema design for real relational data (users, teams, projects, files)
- Frontend build pipelines with Gulp + SCSS
- File upload handling in PHP
- Admin dashboard architecture and role separation
- The discipline of 51 commits — iterating on a real product over time

---

## The Journey

CodeCollab was my most complex project before I entered AI engineering. 51 commits. A real authentication system. Email flows. Admin panel. File management. Multi-entity database design.

This is where I learned that software engineering is about systems, not just functions.

---

<div align="center">

**From building collaboration tools to building AI systems. The engineering compounds.**

[![GitHub](https://img.shields.io/badge/GitHub-Nevil--Dhinoja-181717?style=flat-square&logo=github)](https://github.com/Nevil-Dhinoja)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-nevil--dhinoja-0A66C2?style=flat-square&logo=linkedin)](https://linkedin.com/in/nevil-dhinoja)

</div>
<div align="center">


<br/>

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="180" align="center" valign="top">

<img src="https://github.com/Nevil-Dhinoja.png" width="120" style="border-radius:50%"/>

</td>
<td width="30"></td>
<td valign="middle">

<h2 align="left">Nevil Dhinoja</h2>
<p align="left"><i>AI / ML Engineer &nbsp;·&nbsp; Full-Stack Developer &nbsp;·&nbsp; Gujarat, India</i></p>
<p align="left">
I build AI systems that are practical, deployable, and free to run.<br/>
This project is part of a larger series of open-source AI tools — each one<br/>
designed to teach a real concept through a working, shippable product.
</p>

</td>
</tr>
</table>

<br/>

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Nevil%20Dhinoja-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/nevil-dhinoja)
[![GitHub](https://img.shields.io/badge/GitHub-Nevil--Dhinoja-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Nevil-Dhinoja)
[![Gmail](https://img.shields.io/badge/Email-nevil%40email.com-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:dhinoja.nevil@email.com)

<br/>

If this project helped you or saved you time, a star on the repo goes a long way.

![Views](https://komarev.com/ghpvc/?username=Nevil-Dhinoja&repo=data-analyst-agent&color=blue)

<br/>

<br/>
<img src="https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=2,12,24&height=120&section=footer" width="100%"/>

</div>
