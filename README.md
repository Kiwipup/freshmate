# FreshMate: about this project

Freshmate is my capstone project to finalize my graduation from Awesome Inc U software developement bootcamp.
There were two issues I had in mind while creating this application. One issue is the amount of food waste the USA produces each year, the other is how difficult it is to maintain a stock of food at home and have a positive environment for sharing ideas as someone learns to cook.

With this application, the user can keep an inventory of food items they have at home and be reminded when they are about to expire. They also have a shopping list to keep track of food items they need more of, and items can be moved back and forth between these two lists. The site also allows users to post recipes that they have created and get feedback on those recipes in a constructive environment where they will not get harsh criticism. The culture of the site is to encourage learning, not scold others for doing things that are considered "wrong" as they learn to cook. Ingredients from any recipe can also be added to a users shopping list if they would like to make that recipe. Each user's dashboard also contains a suggestions area where they will be shown any recipes that have ingredients matching items in their inventory. 


## Installation instructions

### To clone this repository:

1. From your shell terminal, cd into the directory that you would like to hold this
repository. Also, create a database that you would like to connect to this project.

2. Get the clone link for this repo, enter git clone <link> into your command line.

3. cd into the directory containing this project, it will have the same name as the repository is named on Github. Run composer install, and npm install in your terminal.

4. cp .env.example to .env -- after you do that, edit the .env file in your text editor to contain your database credentials. In your terminal, run php artisan key:generate.

5. In your terminal, run php artisan serve to start your development server. You are now ready to start working in this repository!
