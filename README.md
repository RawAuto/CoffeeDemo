# CoffeeDemo
Demo project of a tiny PHP App.

The root of the app is /app/form.coffee.php

This sample is hosted here for convenience to play with the functionaliy: http://coffee-list.eu-west-2.elasticbeanstalk.com/app/form.coffee.php

<b>The problem:</b> Bert and Ernie handle the office drinks orders. Bert is notorious for getting the size of drinks wrong - try a large espresso - and Ernie has no idea what he's doing. Ernie also likes to take the Lattes for himself.

<b>The solution:</b> Bert has a place to collate orders with some guidance on size. This automatically generates guidance for Ernie making the drinks in the shop.

<b>Try it out:</b> Try and add a variety of combinations of drinks and sizes to Bert's order list. He can only handle four at once. Observe what happens to Ernie's instruction sheets that appear below. Can you see how he labels the Lattes?

Notes:
 - Purposefully a PHP heavy repo with no specific framework and just enough HTML/CSS to make the sample tolerable to interact with.
 - No considerations made to prevent XSS or other security concerns which could be an issue if the site were real.
 - Session is being used for storage solely to avoid integrating a database for the demo.
