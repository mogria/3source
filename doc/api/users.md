# REST API `/users` resource

## `GET /users`

An array of all users.

Example:

    GET /users
    -----
    [ { id: 1, name: 'Mogria' },
      { id: 2, name: 'Alkazua' },
      { id: 3, name: 'Johnny Rotten' },
      { id: 4, name: 'Sid Vicious' } ]

## GET `/users/{id}`

A single user object.

Example:

    GET /users/1
    ----- 
    { id: 1, name: 'Mogria' }
