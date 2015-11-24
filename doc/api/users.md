# REST API `/users` resource

## `GET /users`

An array of all users.

Example:

    GET /users
    -----
    [ { id: 1,
        name: 'Mogria',
        email: 'm0gr14@gmail.com',
        created_at: '2015-11-24 17:08:21',
        updated_at: '2015-11-24 17:08:21' },
      { id: 2,
        name: 'Alkazua',
        email: 'test-mail@localhost',
        created_at: '2015-11-24 17:08:21',
        updated_at: '2015-11-24 17:08:21' },
      { id: 3,
        name: 'Johnny Rotten',
        email: 'test-mail2@localhost',
        created_at: '2015-11-24 17:08:21',
        updated_at: '2015-11-24 17:08:21' },
      { id: 4,
        name: 'Sid Vicious',
        email: 'test-mail3@localhost',
        created_at: '2015-11-24 17:08:21',
        updated_at: '2015-11-24 17:08:21' } ]

## GET `/users/{id}`

A single user object.

Example:

    GET /users/1
    ----- 
    { id: 1,
      name: 'Mogria',
      email: 'm0gr14@gmail.com',
      created_at: '2015-11-24 17:08:21',
      updated_at: '2015-11-24 17:08:21' }
