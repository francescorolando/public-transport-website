# _Torino Bus & Tram_ - PHP Public Transport Website

A public transport company website built using core PHP and MySQL. This project features user account management (registration, login, profiles), an administration panel for managing transport services, and a REST API for accessing public transport data.

## Features

-   **User Account Management:** Secure user registration, login, logout, and profile management features.
-   **Public Interface:** Allows users to view routes, schedules, stops, etc.
-   **Administration Panel:** A dedicated interface for administrators to manage core data.
-   **REST API:** Provides programmatic access to ticket and users data.

## Technologies Used

-   **Frontend:** HTML, CSS, JavaScript
-   **Backend:** PHP 8.3
-   **Database:** MySQL

## Getting Started

Follow these instructions to set up the project locally for development or testing.

### Prerequisites

-   PHP
-   MySQL Server
-   A web server (like Apache or Nginx) with PHP support configured

### Installation

**Clone the repository:**

```bash
git clone [https://github.com/francescorolando/REPOSITORY_NAME.git]
cd REPOSITORY_NAME
```

### Database Setup

1.  **Create a database:** Create a new database in your MySQL server for this project (e.g., `public_transport_db`).
2.  **Import schema:** Import the database structure and content using the provided SQL file. Locate the schema file (`src/sql/schema.sql`) and import it into your newly created database using a tool like phpMyAdmin, Adminer, or the MySQL command line.

    ```bash
    # Example using mysql command line:
    mysql -u YOUR_DB_USER -p YOUR_DATABASE_NAME < path/to/your/schema.sql
    ```

### Configuration

To connect the application to your local database, follow these steps:

1.  Locate the example configuration file named `config.php.example` in the project's root directory (or the relevant config directory).
2.  Create a **copy** of this file in the same directory.
3.  Rename the copied file to `config.php`.
4.  Open the newly created `config.php` file with a text editor.
5.  Update the defined constants within the file with your **local** database credentials:
    -   `DB_HOST`: Set this to your database host (e.g., `'localhost'`, `'127.0.0.1'`).
    -   `DB_USER`: Set this to your database username (e.g., `'root'`).
    -   `DB_PASSWORD`: Set this to the password for your database user.
    -   `DB_NAME`: Set this to the name of the database you created in the previous step.
6.  Save the changes to the `config.php` file.

**Important:** The `config.php` file contains sensitive information and is intentionally kept out of version control (it should be listed in your `.gitignore` file). **Do not commit `config.php` to Git.** Only the template file, `config.php.example`, should be tracked by the repository.

### Web Server Setup

Configure your local web server (Apache, Nginx, etc.) to serve the project files. Ensure the document root points to the main directory of the project (or a specific `/public` directory if your project uses one).

_Example Apache VirtualHost (basic):_

```apache
<VirtualHost *:80>
    ServerName local.transport-site.com # Or your preferred local hostname
    DocumentRoot /path/to/your/cloned/repository/YOUR_REPOSITORY_NAME # Adjust path

    <Directory /path/to/your/cloned/repository/YOUR_REPOSITORY_NAME>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

## Usage

1. **Access the Website**: Open your web browser and navigate to the URL you configured in your web server setup (e.g., `http://localhost/REPOSITORY_NAME` or `http://local.transport-site.com`).
2. **User Accounts**: Register a new account or log in using existing credentials.
3. **Admin Panel**: Access the administration interface, usually via the specific path `/servizi/admin/admin.php` (e.g., `http://your-local-url//servizi/admin/admin.php`).
   **! Admin users can only be created via your MySQL server !**
4. **REST API**:
   The API endpoints allow access to public data. The base URL is be `/api-rest`.
