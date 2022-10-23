<?php
add_role('company', __(
   'Company'),
   array(
       'read'            => true, // Allows a user to read
       'create_posts'    => true, // Allows user to create new posts
       'edit_posts'      => true, // Allows user to edit their own posts
       )
);

add_role('intern', __(
   'Intern'),
   array(
       'read'            => true, // Allows a user to read
       'create_posts'    => true, // Allows user to create new posts
       'edit_posts'      => true, // Allows user to edit their own posts
       )
);