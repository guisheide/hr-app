# **HR Management App**

This is a Human Resources (HR) management application built with the Laravel framework, using the TALL stack (Tailwind CSS, Alpine.js, Livewire, Laravel).

## **Main Features**

* Company Management  
* Department Management  
* Designation Management  
* Employee Management  
* Contract Management  
* Reactive interface with Livewire and Alpine.js

## **Technologies Used**

* **Backend:** PHP 8+, Laravel 10+  
* **Frontend:** Livewire, Alpine.js, Tailwind CSS  
* **Database:** MySQL  
* **Server:** Nginx or Apache (configured for Laravel)  
* **PHP Package Manager:** Composer  
* **JS Package Manager:** Node.js (npm or yarn)

## **Prerequisites**

Ensure you have the following software installed on your local machine:

* PHP (version compatible with the Laravel used, usually 8.1+)  
* Composer  
* Node.js and npm (or yarn)  
* MySQL (or a compatible database server)  
* Git

## **Local Installation**

Follow these steps to set up the local development environment:

1. **Clone the repository:**  
   git clone \[https://github.com/guisheide/hr-app.git\](https://github.com/guisheide/hr-app.git)  
   cd hr-app

2. **Install PHP dependencies:**  
   composer install

3. **Install Node.js dependencies:**  
   npm install  
   \# or, if you use yarn:  
   \# yarn install

4. **Configure the environment file:**  
   * Copy the example file: cp .env.example .env  
   * Open the .env file and configure the database variables (DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD, etc.) according to your local MySQL setup.  
5. **Generate the application key:**  
   php artisan key:generate

6. **Run the database migrations:**  
   php artisan migrate

   * *Optional:* If you have seeders to populate the database with initial data:  
     php artisan db:seed

7. **Compile frontend assets:**  
   npm run dev  
   \# or, for production:  
   \# npm run build

## **Usage**

To start the local Laravel development server, run:

php artisan serve

The application will be accessible at http://127.0.0.1:8000 (or the port specified by the command).

## **Contribution**

Contributions are welcome\! If you find a bug or have a suggestion for improvement, please open an *issue* on the GitHub repository. To contribute code, *fork* the project, create a *branch* for your feature (git checkout \-b feature/new-feature), and submit a *Pull Request*.

## **License**

This project is open-source and licensed under the [MIT License](https://www.google.com/search?q=LICENSE). Feel free to use and modify the code as needed.