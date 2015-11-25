# REST API `/users` resource

## `GET /users`

An array of all users.

Example:

    GET /users
    -----
    [ { id: 1, name: 'Mogria', email: 'm0gr14@gmail.com' },
      { id: 2, name: 'Alkazua', email: 'test-mail@localhost' },
      { id: 3, name: 'Johnny Rotten', email: 'test-mail2@localhost' },
      { id: 4, name: 'Sid Vicious', email: 'test-mail3@localhost' } ]

## GET `/users/{id}`

A single user object.

Example:

    GET /users/1
    ----- 
    { id: 1, name: 'Mogria', email: 'm0gr14@gmail.com' }
