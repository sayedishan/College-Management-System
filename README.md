<div align="center">

# 🎓 College Management System

### Full-Stack Database Management Web Application

[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![XAMPP](https://img.shields.io/badge/XAMPP-Apache-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org)
[![HTML5](https://img.shields.io/badge/HTML5-Semantic-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-Styled-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![AJAX](https://img.shields.io/badge/AJAX-Dynamic_Search-brightgreen?style=for-the-badge)](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)
[![Status](https://img.shields.io/badge/Status-Active-brightgreen?style=for-the-badge)]()

<br/>

> **A production-style, full-stack web application** built to centralize and streamline college administrative operations — managing students, instructors, courses, departments, semesters, and registrations through a modern, responsive dashboard. Developed as a DBMS project at **SRM Institute of Science and Technology (SRM KTR)**.

🔗 **Repository:** [github.com/sayedishan/College-Management-System](https://github.com/sayedishan/College-Management-System)

[✨ Features](#-features) • [⚙️ Installation](#️-installation--setup) • [🗄️ Database Schema](#️-database-schema) • [📸 Screenshots](#-screenshots) • [👨‍💻 Authors](#-authors)

</div>

---

## 📌 Project Overview

The **College Management System** is a full-stack web application that replaces scattered, manual academic record-keeping with a unified digital platform. Built on **PHP** and **MySQL**, with a responsive **TailwindCSS** frontend and **AJAX-powered search**, the system gives administrators complete control over institutional data through a secure, session-protected dashboard.

The project demonstrates core principles of **relational database design**, **server-side scripting**, **dynamic client-server communication**, and **database control concepts (DCL & TCL)** — making it a practical showcase of full-stack and DBMS engineering skills.

### 🏆 Key Achievements

- ✅ Designed and implemented a **normalized relational database** (`srm_university`) with 7 interconnected tables using Primary Keys and Foreign Keys
- ✅ Delivered **full CRUD functionality** across Students, Instructors, and Courses modules — with detailed individual record views
- ✅ Built **AJAX-powered real-time search** across Students, Instructors, and Courses — no page reloads required
- ✅ Developed an **interactive DCL & TCL Demonstration Module** (`dcl_tcl_demo.php`) showcasing GRANT, REVOKE, COMMIT, ROLLBACK, and SAVEPOINT
- ✅ Implemented **session-based admin authentication** with login, logout, and dashboard access protection
- ✅ Delivered a fully **responsive UI** using TailwindCSS for a clean, professional admin experience

---

## ✨ Features

### 🔐 Authentication & Session Management
- Admin login with password-protected access (`admin123`)
- Session management — all pages protected against unauthenticated access
- Secure logout with full session destruction

### 👨‍🎓 Student Module
- View all students in a structured data table
- Add new student records via form
- Real-time AJAX search across student records
- View individual student details page
- Delete student records

### 👨‍🏫 Instructor Module
- View all instructors in a structured data table
- Add new instructor records via form
- Real-time AJAX search across instructor records
- View individual instructor details page
- Delete instructor records

### 📚 Course Module
- View all courses in a structured data table
- Add new course records via form
- Real-time AJAX search across course records
- View individual course details page
- Delete course records

### 🏛️ Department Module
- View all departments and their details

### 📅 Semester Module
- View all defined academic semesters

### 📝 Registration Module
- View all student course registrations with relational data

### 🔍 AJAX Dynamic Search
- Instant, asynchronous search across Students, Instructors, and Courses
- Results rendered dynamically without page reload via JavaScript + PHP backend (`search.php`)

### 🗂️ DCL & TCL Demonstration Module
- **Data Control Language (DCL):** Live demonstration of `GRANT` and `REVOKE` privilege commands
- **Transaction Control Language (TCL):** Live demonstration of `COMMIT`, `ROLLBACK`, and `SAVEPOINT`
- Supported by a dedicated SQL script (`dcl_tcl_demo.sql`) for reproducibility
- Designed as an educational tool to illustrate database management concepts

---

## 🛠️ Technology Stack

| Layer | Technology | Purpose |
|---|---|---|
| **Frontend Markup** | HTML5 | Semantic page structure |
| **Frontend Styling** | CSS3 + TailwindCSS 3.x | Responsive UI and utility-first styling |
| **Frontend Interactivity** | JavaScript (ES6+) | DOM manipulation, AJAX calls |
| **Async Communication** | AJAX | Dynamic search without page reload |
| **Backend** | PHP 8.x | Server-side logic, session management, DB queries |
| **Database** | MySQL 8.0 | Relational data storage, constraints, transactions |
| **Local Server** | XAMPP (Apache) | Development environment |

---

## 🏗️ System Architecture

```
┌─────────────────────────────────────────────────────────┐
│                    CLIENT BROWSER                        │
│      HTML5 + CSS3 + TailwindCSS + JavaScript/AJAX       │
└───────────────────────┬─────────────────────────────────┘
                        │  HTTP Requests / AJAX Calls
                        ▼
┌─────────────────────────────────────────────────────────┐
│               APACHE WEB SERVER (XAMPP)                  │
│             http://localhost/College-Management-System/  │
└───────────────────────┬─────────────────────────────────┘
                        │
                        ▼
┌─────────────────────────────────────────────────────────┐
│                   PHP BACKEND LAYER                       │
│                                                          │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐  │
│  │  login.php   │  │ CRUD Modules │  │  search.php  │  │
│  │  logout.php  │  │ add_*.php    │  │  (AJAX JSON) │  │
│  │  layout.php  │  │ delete_data  │  │              │  │
│  └──────────────┘  │ details.php  │  └──────────────┘  │
│                    └──────────────┘                      │
│  ┌─────────────────────────────────────────────────┐    │
│  │            dcl_tcl_demo.php                      │    │
│  │     (DCL & TCL Demonstration Module)             │    │
│  └─────────────────────────────────────────────────┘    │
└───────────────────────┬─────────────────────────────────┘
                        │  MySQLi
                        ▼
┌─────────────────────────────────────────────────────────┐
│              MYSQL DATABASE — srm_university             │
│                                                          │
│  Department  │  Instructor  │  Course  │  Semester       │
│         Student  │  Registration  │  Registration_Log    │
└─────────────────────────────────────────────────────────┘
```

**Request Flow:**
1. Admin logs in — PHP validates credentials and initialises the session
2. Dashboard and module pages check session on every load via `layout.php`
3. CRUD actions trigger form submissions handled by dedicated PHP files
4. AJAX search sends asynchronous requests to `search.php`, which returns filtered data rendered by JavaScript
5. DCL/TCL demo executes privilege and transaction commands and displays results inline

---

## 🗄️ Database Schema

**Database Name:** `srm_university`

### Entity Relationship Overview

```
Department ──< Instructor
Department ──< Course ──< Registration >── Student
                                               │
                                           Semester
                                               │
                                      Registration_Log
```

### Table Definitions

#### 📋 `Department`
| Column | Type | Constraint |
|---|---|---|
| `dept_id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `dept_name` | VARCHAR(150) | NOT NULL, UNIQUE |

#### 📋 `Instructor`
| Column | Type | Constraint |
|---|---|---|
| `instructor_id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `name` | VARCHAR(100) | NOT NULL |
| `email` | VARCHAR(150) | UNIQUE, NOT NULL |
| `dept_id` | INT | FOREIGN KEY → Department |

#### 📋 `Course`
| Column | Type | Constraint |
|---|---|---|
| `course_id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `course_name` | VARCHAR(150) | NOT NULL |
| `course_code` | VARCHAR(20) | UNIQUE, NOT NULL |
| `credits` | INT | NOT NULL |
| `dept_id` | INT | FOREIGN KEY → Department |

#### 📋 `Semester`
| Column | Type | Constraint |
|---|---|---|
| `semester_id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `semester_name` | VARCHAR(50) | NOT NULL |
| `academic_year` | YEAR | NOT NULL |

#### 📋 `Student`
| Column | Type | Constraint |
|---|---|---|
| `student_id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `name` | VARCHAR(100) | NOT NULL |
| `email` | VARCHAR(150) | UNIQUE, NOT NULL |
| `phone` | VARCHAR(20) | — |
| `dept_id` | INT | FOREIGN KEY → Department |
| `enrollment_date` | DATE | NOT NULL |

#### 📋 `Registration`
| Column | Type | Constraint |
|---|---|---|
| `reg_id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `student_id` | INT | FOREIGN KEY → Student |
| `course_id` | INT | FOREIGN KEY → Course |
| `semester_id` | INT | FOREIGN KEY → Semester |
| `reg_date` | DATETIME | DEFAULT CURRENT_TIMESTAMP |

#### 📋 `Registration_Log`
| Column | Type | Constraint |
|---|---|---|
| `log_id` | INT | PRIMARY KEY, AUTO_INCREMENT |
| `reg_id` | INT | — |
| `action` | VARCHAR(50) | — |
| `log_time` | DATETIME | DEFAULT CURRENT_TIMESTAMP |

### 🧠 Database Concepts Demonstrated

| Concept | Implementation |
|---|---|
| **Normalization (1NF–3NF)** | Tables decomposed to eliminate redundancy; atomic column values throughout |
| **Primary Keys** | Every table has a unique auto-increment PK |
| **Foreign Keys** | Cross-table relationships enforced via FK constraints |
| **CRUD Operations** | Full Create, Read, Delete implemented across Student, Instructor, Course modules |
| **Relational JOINs** | INNER JOINs used in registration and search queries to pull related data |
| **DCL — GRANT / REVOKE** | Demonstrated live in `dcl_tcl_demo.php` |
| **TCL — COMMIT / ROLLBACK / SAVEPOINT** | Demonstrated live in `dcl_tcl_demo.php` |
| **Audit Logging** | `Registration_Log` table records registration activity |

---

## 📁 Project Structure

```
College-Management-System/
│
├── index.php               # Entry point → redirects to login or dashboard
├── login.php               # Admin login page and authentication handler
├── logout.php              # Session destruction and redirect
├── layout.php              # Shared layout wrapper (nav, session guard)
│
├── students.php            # View all students
├── add_student.php         # Add new student form and handler
│
├── instructors.php         # View all instructors
├── add_instructor.php      # Add new instructor form and handler
│
├── courses.php             # View all courses
├── add_course.php          # Add new course form and handler
│
├── departments.php         # View all departments
├── semesters.php           # View all semesters
├── registrations.php       # View all registrations
│
├── details.php             # Shared detail view page (Student / Instructor / Course)
├── delete_data.php         # Shared delete handler for all entities
├── search.php              # AJAX search endpoint (returns filtered data)
│
├── dcl_tcl_demo.php        # DCL & TCL interactive demonstration module
├── dcl_tcl_demo.sql        # Supporting SQL script for DCL/TCL demo
│
├── db_connect.php          # Database connection configuration (MySQLi)
├── dbms.sql                # Full database schema + sample data dump
│
├── README.md               # Project documentation
│
└── assets/
    └── css/
        └── style.css       # Custom CSS styles
```

---

## ⚙️ Installation & Setup

### ✅ Prerequisites

- [XAMPP](https://www.apachefriends.org/download.html) (v8.x recommended — includes Apache, MySQL, PHP)
- A modern web browser (Chrome, Firefox, or Edge)
- A code editor (VS Code recommended)
- Git _(optional, for cloning)_

---

### 📥 Step 1 — Clone or Download the Repository

**Option A — Clone with Git:**
```bash
git clone https://github.com/sayedishan/College-Management-System.git
```

**Option B — Download ZIP:**
- Click **Code → Download ZIP** on the repository page
- Extract the ZIP file

---

### 📂 Step 2 — Move Project to XAMPP `htdocs`

Copy or move the project folder into your XAMPP web root:

| OS | Path |
|---|---|
| **Windows** | `C:\xampp\htdocs\College-Management-System\` |
| **macOS** | `/Applications/XAMPP/htdocs/College-Management-System/` |
| **Linux** | `/opt/lampp/htdocs/College-Management-System/` |

---

### 🚀 Step 3 — Start XAMPP Services

1. Open the **XAMPP Control Panel**
2. Click **Start** next to **Apache** → wait for the green status indicator
3. Click **Start** next to **MySQL** → wait for the green status indicator

---

### 🗄️ Step 4 — Import the Database

1. Open your browser and go to:
   ```
   http://localhost/phpmyadmin
   ```

2. In the left sidebar, click **New** to create a new database

3. Enter the database name exactly as shown:
   ```
   srm_university
   ```
   Set collation to `utf8mb4_general_ci` → Click **Create**

4. Select **`srm_university`** from the left panel

5. Click the **Import** tab at the top

6. Click **Choose File** and navigate to the project folder → select:
   ```
   dbms.sql
   ```

7. Click **Go** at the bottom to run the import

8. A success message confirms all tables have been created with sample data ✅

---

### 🔧 Step 5 — Verify Database Configuration

Open `db_connect.php` and confirm the credentials match your XAMPP setup:

```php
<?php
$host     = "localhost";
$username = "root";
$password = "";           // Default XAMPP MySQL password is empty
$database = "srm_university";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

> **Note:** If you have configured a custom MySQL password in XAMPP, update the `$password` field accordingly.

---

### 🌐 Step 6 — Launch the Application

Open your browser and navigate to:

```
http://localhost/College-Management-System/
```

You will be automatically redirected to the **Admin Login Page**.

---

### 🔑 Login Credentials

| Field | Value |
|---|---|
| **Password** | `admin123` |

> ⚠️ These are development credentials. Do not use in a production environment.

---

## 📸 Screenshots

> _Replace the placeholders below with actual screenshots from your running application._

### 🖥️ Admin Dashboard
```
[ Screenshot: dashboard.png ]
Overview with navigation sidebar and module summary
```

### 🔐 Login Page
```
[ Screenshot: login.png ]
Centered login form with password field
```

### 👨‍🎓 Students — List View
```
[ Screenshot: students.png ]
Data table with AJAX search bar, Add Student button, and action links
```

### 👤 Student Detail Page
```
[ Screenshot: student_details.png ]
Individual student record with all fields displayed
```

### 👨‍🏫 Instructors — List View
```
[ Screenshot: instructors.png ]
Instructor table with search, add, view detail, and delete actions
```

### 📚 Courses — List View
```
[ Screenshot: courses.png ]
Course catalog table with AJAX search
```

### 🔍 AJAX Search in Action
```
[ Screenshot: ajax_search.png ]
Real-time filtered results appearing as the user types
```

### 🏛️ Departments & Semesters
```
[ Screenshot: departments_semesters.png ]
Department and semester listing pages
```

### 📝 Registrations
```
[ Screenshot: registrations.png ]
Registration table with student, course, and semester details
```

### 🗂️ DCL & TCL Demonstration Module
```
[ Screenshot: dcl_tcl_demo.png ]
Interactive panel showing GRANT, REVOKE, COMMIT, ROLLBACK, SAVEPOINT outputs
```

---

## 💡 Skills Demonstrated

**Backend Development**
- PHP scripting with MySQLi for all database interactions
- Server-side form handling and input processing
- Session-based authentication and page-level access control
- Shared layout and code reuse via `layout.php`, `db_connect.php`, `delete_data.php`

**Database Engineering**
- Relational schema design with normalization (1NF, 2NF, 3NF)
- Primary Key and Foreign Key constraint design across 7 tables
- Multi-table INNER JOINs for registration and detail queries
- Transaction control (TCL): `COMMIT`, `ROLLBACK`, `SAVEPOINT`
- Privilege control (DCL): `GRANT`, `REVOKE`
- Audit trail implementation via `Registration_Log` table

**Frontend Development**
- Semantic HTML5 page structure
- Responsive UI built with TailwindCSS utility classes and custom CSS3
- Asynchronous search using JavaScript (AJAX) calling `search.php`
- Dynamic DOM updates for real-time search result rendering

**Software Engineering Practices**
- Flat-file PHP project structure with clean separation of responsibilities
- Reusable shared files reducing code duplication
- Consistent naming conventions and logical module organisation
- SQL schema and demo scripts committed alongside application code

---

## 🎓 Learning Outcomes

- Understood the **end-to-end full-stack development workflow** — from schema design to rendered UI
- Applied **database normalization principles** in a multi-entity relational schema
- Built practical experience with **PHP-MySQL integration** using MySQLi
- Implemented **asynchronous client-server communication** using AJAX and vanilla JavaScript
- Demonstrated **DCL and TCL database concepts** in an applied, interactive context
- Gained hands-on experience configuring a **local LAMP-stack environment** using XAMPP
- Produced a deployable, portfolio-ready application aligned with **DBMS course objectives**

---

## 🚀 Future Enhancements

| Feature | Description |
|---|---|
| 🔒 Password Hashing | Replace plain-text password with bcrypt hashing |
| ✏️ Edit / Update Records | Add update functionality to complete full CRUD for all modules |
| 📊 Dashboard Analytics | Summary cards and charts for student/course enrollment statistics |
| 📤 CSV Export | Export student, instructor, or course data as CSV |
| 🔎 Advanced Filtering | Filter tables by department, semester, or enrollment date |
| 📋 Grade Management | Add grade entry and GPA tracking to the Registration module |
| 🧪 Input Validation | Client-side and server-side validation with user-friendly error messages |
| 🌐 Deployment | Deploy to a live server using cPanel or a cloud hosting provider |

---

## 📄 Resume Description

> _Ready to copy directly into a resume or LinkedIn project section._

**College Management System** | PHP · MySQL · TailwindCSS · JavaScript · AJAX · XAMPP

Developed a full-stack College Management System web application using PHP, MySQL, TailwindCSS, and JavaScript to manage students, instructors, courses, departments, semesters, and registrations through a centralized admin dashboard. Implemented session-based admin authentication, CRUD operations across multiple modules, AJAX-driven real-time search, and an interactive DCL/TCL demonstration module showcasing database privilege and transaction management concepts. Designed a normalized relational database (`srm_university`) with 7 tables, enforcing referential integrity through Primary Keys and Foreign Keys.

---

## 👨‍💻 Authors

<table>
<tr>
<td align="center">

**Sayed Ishan**
B.Tech Artificial Intelligence
SRM Institute of Science and Technology (SRM KTR)

🐱 [github.com/sayedishan](https://github.com/sayedishan)

</td>
<td align="center">

**Ananya Mahajan**
B.Tech Artificial Intelligence
SRM Institute of Science and Technology (SRM KTR)

</td>
</tr>
</table>

---

## 📜 License

This project is licensed under the **MIT License**.

```
MIT License — Copyright (c) 2025 Sayed Ishan, Ananya Mahajan

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
```

---

<div align="center">

**Built with ❤️ by Sayed Ishan & Ananya Mahajan**
B.Tech Artificial Intelligence — SRM Institute of Science and Technology (SRM KTR)

_A DBMS project demonstrating full-stack web development and relational database design_

⭐ If this project was helpful, consider giving it a star on [GitHub](https://github.com/sayedishan/College-Management-System)!

</div>