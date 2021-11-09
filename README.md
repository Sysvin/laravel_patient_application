The purpose of this application is to create a list of patients and record blood pressure levels.

This application is built with Tailwind, Alpine.js, Livewire, and Laravel (TALL stack).

After project is downloaded, follow these steps: 
(a) Open the project in the code editor.
(b) change the name of the ".env.example" file to ".env" if necessary.
(c) in the .env file, configure a database. 
(d) In the terminal, run the command "composer install" while in the project folder
(e) Next run "php artisan migrate:fresh --seed" to create the tables. The seeder is currently set to auto-generate 50k fake patients
(f) Next run "php artisan serve" 

When you browse to the project you may be ask to generate a project key. This should allow the application to open in the browser. 

Once the project is open, authentication is required in order to create, read or update patient information. 

A general account can be registered with false credentials, as email verification is not set up in this app. 



