# Outline for final project

* [homepage_wireframe](https://drive.google.com/file/d/0B9ZWNfq8o1oJdHVyOEVXU3EtUFdrUS05R3BDcjdDVHJIQkhB/view?usp=sharing)

* [user_dashboard_wireframe](https://drive.google.com/file/d/0B9ZWNfq8o1oJSk1wUlJnak13eGNIWmFiV2RPMjdSam5QQW9N/view?usp=sharing)

* [recipes_wireframe](https://drive.google.com/file/d/0B9ZWNfq8o1oJS0RRaDNDbHN5RjhxUU1IZFZIQXhFYTlfeS0w/view?usp=sharing)

* [suggestions_wireframe](https://drive.google.com/file/d/0B9ZWNfq8o1oJYzdpTkU4aXM0clFqNVlJdmZENTZtYzZ3X3pZ/view?usp=sharing)


## Summary

The main three features of this application are as follows: The user can keep an inventory of the food items
in their home, as well as track when they will expire. They will also be able to keep track of what items they need more of. Items will be moveable between these two locations. Lastly they will be able to publish their own recipes, recipes will be made public on the front page of the site and will be searchable. Added features will include suggested recipes based on what the user has in their inventory, as well as ratings and discussion areas in each recipe that is published.

## User Story

Many people, especially students and individuals who work full time, find the task of cooking and keeping a stock of ingredients in their home very daunting. As a busy young adult, it would be helpful to have a tool that will help me keep track of what I have, what needs to be thrown away, and the ideas I come up with as I learn to cook.

## The problem and the solution

From personal experience, I can say it is very difficult as a working woman to keep track of what is in my
pantry/refridgerator, as well as what needs to be cleaned out. Also, as one becomes more experienced in cooking, you begin to start venturing out with your imagination and make your own creations. Its very easy to forget what you did that made something taste amazing. It would be nice to have something portable that you can take to the store with you and see what you actually have at home, and what you need to make your favorite dishes WITHOUT relying on memory.

## Predicted file structure

For this project, with the help of laravel, I will need migrations for an inventory table, a needs restocked table, and a recipes table each with their own models. I believe each of these three main features will need their own resource controller, as well as folders to hold the views needed for maintaining them.

## Design structure

For the design I am going to have a front page with a few defining points about the application. Beneath that, there will be an area with user created recipes, likely just the title, description, and an image if the user decided to add that with their publication. Clicking on the recipe will bring them to the full view with the ingredients and cooking instructions, as well as the discussion drop down. People who have not registered will be able to see the recipes, but they will not be able to join any discussion or upvote until they register. Upon registration, the user will be directed to their dashboard, where they will see their empty inventory, as well as links to their restock list, recipes, and suggested recipes. From their dashboard, they can add, delete, and manage the items in each of these fields.

## Data storage

Each user makes a unique username upon registration and this is what is displayed to other users. Every contribution to the site is stored with a user id which is what associates the creator to their contributions. For the inventory, I will need to store the name of the item (not nullable), the items description (nullable), the expiration date (nullable), if the item is expired (boolean->default(false)), and the quantity (not nullable). For the restock list, again I will need the name of the item, the item discription and the quantity. For the recipes, I will need the name of the recipe (not nullable), the description (not nullable in this case), the ingredients(not nullable), the instructions (not nullable), the author which will come from a foreign relation, and the upvotes (unsigned integer).
