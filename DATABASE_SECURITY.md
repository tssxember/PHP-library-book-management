# Database Security Setup

## Overview
The database credentials have been separated for security purposes. The database password is stored in a separate file that is not tracked by Git.

## Files:
- `env` - Main environment configuration (database password removed)
- `database_credentials.env` - Contains sensitive database credentials (not tracked by Git)
- `.gitignore` - Updated to exclude the credentials file

## Setup Instructions:
1. Copy `database_credentials.env.example` to `database_credentials.env`
2. Update the password in `database_credentials.env` with your actual database password
3. The application will automatically load the credentials from this file

## Note:
Never commit the `database_credentials.env` file to version control as it contains sensitive information.
