1. Error: Laravel : Syntax error or access violation: 1055 Error
    Fix: 
        In config\database.php --> "mysql" array

        Set 'strict' => false; //to disable all.

        .... or
        You can leave 'strict' => true and add modes to "mysql" option in

        'mysql' => [
            ...
            ....
            'strict' => true,
            'modes' => [
                    //'ONLY_FULL_GROUP_BY', // Disable this to allow grouping by one column
                    'STRICT_TRANS_TABLES',
                    'NO_ZERO_IN_DATE',
                    'NO_ZERO_DATE',
                    'ERROR_FOR_DIVISION_BY_ZERO',
                    'NO_AUTO_CREATE_USER',
                    'NO_ENGINE_SUBSTITUTION'
                ],
        ]


    2. Lệnh set giá trị của column trong 1 table = null
        UPDATE table
        SET column=null
