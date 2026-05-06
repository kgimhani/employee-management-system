# Employee Management System — Star Apparels

A full-stack web-based Employee Management System developed as 
a university group project using PHP, MySQL, and Bootstrap.

## Project Overview

This system manages employee records, branch operations, project 
assignments, orders, and dependent information for an apparel 
company environment.

## Features

- **Employee Management** — Full CRUD with personal details, 
  salary, branch assignment and dependent tracking
- **Branch Management** — Add, update and delete branch records 
  with employee assignments
- **Order & Project Tracking** — Assign employees to orders and 
  projects with hour tracking and supervisor access control
- **Dependent Management** — Track employee dependents with 
  relationship and coverage details (max 3 per employee)
- **Secure Login System** — Admin authentication with session management
- **SQL Injection Prevention** — All queries use prepared statements

## Tech Stack

`PHP` `MySQL` `HTML` `CSS` `Bootstrap` `Apache (XAMPP)`

## Database Design

- 5 normalized tables: Employee, Branch, Orders, Projects, Dependents
- Relationships enforced with foreign keys
- Follows 1NF, 2NF and 3NF normalization principles
- Full EERD diagram included in project report

## Database Tables

| Table | Description |
|-------|-------------|
| Employee | Personal details, salary, branch assignment |
| Branch | Branch name, ID, phone number |
| Employee_Order | Client orders linked to employees |
| Employee_Projects | Projects linked to employees |
| Dependent | Employee dependents for insurance |

## CRUD Operations

Full Create, Read, Update, Delete operations implemented for 
all five database entities using PHP prepared statements.
