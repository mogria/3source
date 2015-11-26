# REST API `/dungeons` resource

## `GET /dungeons`

An array of all dungeons.

Example:

    GET /dungeons
    -----
    [ { id: 1, name: 'Under your bed', min_level: 1 },
      { id: 2, name: 'Basement', min_level: 5 },
      { id: 3, name: 'Secret Cave', min_level: 9 } ]


## GET `/dungeons/{id}`

A single dungeon.

Example:

    GET /dungeons/1
    ----- 
    { id: 1,
      name: 'Under your bed',
      min_level: 1,
      monsters: 
       [ { id: 1, experience_drop: 2, energy_drop: 5 },
         { id: 2, experience_drop: 3, energy_drop: 4 } ] }
