<p align="center">
  <img src="public/images/icsa_logo.png" width="200" alt="ICSA Logo">
</p>

<h1 align="center">ICSA Collection Management System</h1>

## 📖 About ICSA CMS

The ICSA Collection Management System (ICSA CMS) is a web-based application designed to simplify and automate the collection management process for the Institute of Computing Student Association (ICSA). It provides an efficient and secure platform to manage student contributions, track payments, and generate detailed reports.

## ✨ Key Features

🔐 User Authentication & Authorization
Secure login system for users and administrators.

- Role-based access control:
- Admin: Full access to manage collections, users, and reports.

💰 Collection Management

- Track student contributions and payments.
- Easy payment processing with detailed transaction records.

📊 Reporting System

- Generate financial reports and collection summaries.
- Export reports in multiple formats (e.g., PDF, Excel) for further analysis.

## 🛠️ Tech Stack

## Frontend

- TailwindCSS: A utility-first CSS framework for responsive and modern UI design.
- Blade Templates: Laravel's powerful templating engine for dynamic content rendering.

## Backend

- Laravel 11: A robust PHP framework for building scalable and secure web applications.

## Database

- MySQL: A reliable relational database for storing and managing data.

## 🚀 Getting Started

Prerequisites:

- PHP 8.0 or higher
- Composer (for dependency management)
- MySQL database
- Node.js and npm (for frontend dependencies)

## Installation

1. Clone the repository:

```bash
  git clone https://github.com/Vustron/icsa_collection_management_system.git
  cd icsa_collection_management_system
```

2. Install dependencies:

```bash
  composer install
  npm install
```

3. Set up the environment:

- Copy .env.example to .env and configure your database credentials:
    ```bash
      cp .env.example .env
    ```
- Generate an application key:
    ```bash
      php artisan key:generate
    ```

4. Run migrations and seed the database:

```bash
  php artisan migrate --seed
```

5. run the application:

```bash
  composer run dev
```

6. Access the application:
   Open your browser and navigate to http://localhost:8000/iccms

## 📊 Project Analytics

![Alt](https://repobeats.axiom.co/api/embed/3f977d2d3ef680382bb862b62787e434404db6e1.svg "Repobeats analytics image")

## 🙏 Acknowledgments

Special thanks to the Institute of Computing Student Association (ICSA) for their support.

Built with ❤️ by the Codex Programming Club.
