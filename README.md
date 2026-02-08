# COPD GUARD

COPD GUARD is a web-based health management system designed to assist Healthcare Providers in monitoring and managing patients with Chronic Obstructive Pulmonary Disease (COPD). It facilitates prescription management, health tracking, and communication between patients and providers.

## Features

### Roles

*   **Administrator**: Manages system users (Healthcare Providers and Admins) and oversees platform statistics.
*   **Healthcare Provider (Doctor)**: Manages assigned patients, prescribes medication, views patient health records, and receives notifications about patient status (Good Health, At Risk, Danger).
*   **Patient**: (Managed by the system) Patients have their health records tracked, including vital signs and CAT questionnaire scores.

### Key Functionalities

*   **Authentication & Authorization**: Secure login and registration for Admins and Healthcare Providers. Password reset functionality.
*   **Dashboards**: Tailored dashboards for Admins and Healthcare Providers to view relevant data at a glance.
*   **Patient Management**: View patient profiles, health history, and vital signs (Heart Rate, Oxygen Saturation, Peak Flow).
*   **Prescription System**: Add and view prescriptions for patients.
*   **Health Tracking**: Algorithm to determine patient health status based on daily records (Good Health, At Risk, Danger).
*   **Notifications**: Alert system for Healthcare Providers when a patient is at risk.

## Technology Stack

*   **Backend**: PHP
*   **Database**: MySQL
*   **Frontend**: HTML, CSS, JavaScript

## Installation & Setup

1.  **Prerequisites**: Ensure you have a local server environment installed (e.g., XAMPP, WAMP, MAMP) that supports PHP and MySQL.
2.  **Clone/Download**: Place the project folder in your server's root directory (e.g., `htdocs` for XAMPP).
3.  **Database Setup**:
    *   Open phpMyAdmin (usually at `http://localhost/phpmyadmin`).
    *   Create a new database named `copd_guard`.
    *   Import the `database/copd_guard.sql` file located in the project directory.
4.  **Configuration**:
    *   Open `dbcon.php`.
    *   Update the database connection details if your local setup differs from the defaults:
        ```php
        $servername = "localhost";
        $username = "root";
        $password = ""; // Your DB password
        ```
5.  **Run**: Open your browser and navigate to `http://localhost/copd-guard/` (or your specific folder path).

## Default Credentials (for testing)

**Admin:**
*   Email: `admin123@admin.com`
*   Password: `admin123`

**Healthcare Provider:**
*   Email: `samiali@gmail.com`
*   Password: `123123`

## Project Structure

*   `Index.php`: Landing page and routing logic based on login status.
*   `Controller.php`: Contains core business logic and database operations.
*   `dbcon.php`: Database connection settings.
*   `utils.php`: Helper functions (redirection, alerts, encryption).
*   `AdminDashboard.php` / `HPDashboard.php`: Main dashboards.
*   `Login.php` / `Registration.php`: User authentication pages.
*   `database/`: Contains the SQL dump file.
*   `css/`, `js/`, `imgs/`, `webfonts/`: Static assets.

## License

[Add License Information Here]
