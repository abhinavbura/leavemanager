# College Leave Manager

This application is a leave management system designed for colleges to streamline the process of leave requests and approvals. Built using PHP, HTML, and CSS, and utilizing XAMPP as the server for SQL database management, this application was hosted at a college and used for a year before being taken down due to maintenance issues.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Application Structure](#application-structure)
- [Usage](#usage)
- [Installation](#Installation)
- [Contributing](#contributing)
- [License](#license)

## Introduction

The College Leave Manager application provides a streamlined process for managing leave requests within a college. It supports hierarchical approval workflows and includes dashboards for department heads to monitor and manage requests.

## Features

- Hierarchical leave request approval system
- Roles: Admin, Principal, Head of Department, Faculty
- Department-wise dashboards for Heads of Department
- Final approval of leave requests by the Principal

## Technologies Used

- PHP
- HTML
- CSS
- XAMPP (for SQL database management)

## Application Structure

- **Admin:** Manages users and oversees the leave request process.
- **Principal:** Provides the final approval for leave requests.
- **Head of Department:** Reviews and approves leave requests within their department.
- **Faculty:** Submits leave requests.

### Leave Request Workflow

1. **Faculty** submits a leave request.
2. The request is reviewed by the **Head of Department**.
3. If approved, the request moves up to the **Principal** for final approval.
4. The **Principal** grants or denies the leave request.

## Usage

1. Access the application through the provided URL or localhost setup.
2. Log in as Admin, Principal, Head of Department, or Faculty using the provided credentials.
3. Navigate through the application to manage or review leave requests based on your role.

## Installation

To set up the application locally:
1. Clone the repository
```bash
  git clone https://github.com/abhinavbura/leavemanager.git
```
2. Navigate to the project directory:
```bash
  cd leavemanager
```
3. Set up XAMPP and create a new database.
4. Import the SQL database file located in the project directory into the new database.
5. Configure the database connection in the config.php file.
6. Start the XAMPP server and access the application through http://localhost/leavemanager.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request if you have any improvements or bug fixes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
