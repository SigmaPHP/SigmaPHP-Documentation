# SigmaPHP-Documentation

This repository contains the official documentation for the SigmaPHP framework.
You can clone the project and run it locally, or feel free to visit the live documentation at:
https://www.sigmaphp.com

## Getting Started

Before start please make sure you have **MySQL** or **MariaDB** installed locally !

1- Clone the repository:

```bash
git clone https://github.com/SigmaPHP/SigmaPHP-Documentation.git
```

2- Navigate into the Project Directory:

```bash
cd SigmaPHP-Documentation/
```

3- Install all dependencies:

```bash
composer install
```

4- Copy the `.env` file:

```bash
cp .env.example .env
```

And make sure to edit the `.env` file , and update he database credentials.

5- Run all migrations and seeds:

```bash
./bin/sigma-cli fresh
```

6- Start the documentation server:

```bash
./bin/sigma-cli run
```

Now open the documentation in your browser:
[http://localhost:8888](http://localhost:8888)
