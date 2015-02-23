List Manager
=======

`list_manager` is a simple PHP API for fast querying and manipulating of [Mailman](http://www.gnu.org/software/mailman/) 2.1.9 data.

All requests are expected to be GET and response are returned as JSON.

For the most part, the names of the API correspond to the names of the [Mailman commandline utilities](http://wiki.list.org/DOC/4.09%20Summary%20of%20the%20mailman%20bin%20commands).

# Configuration

You'll need to create a `config.php` file that defines `MAILMAN_CMD_PREFIX`, which is typically the path to the actual mailman commandline tools. This constant is prepended to mailman commands like `list_lists`.

You can copy `config.php.template` to get started with your own `config.php` file.

# API

## list_lists.php

Returns a list of all the list names.

### Required parameters

None

### Sample response

```
["my_list_1", "my_list2", "my_list3"]
```

## list_members.php

Returns a list of list names that the given member is in.

### Required parameters

`list` - name of list

### Sample response

```
["member1@gmail.com","member2@gmail.com"]
```

## add_member.php

Adds a member to a list

### Required parameters

`member` - email of member to add
`list` - name of list

### Sample response

HTTP status code will return 200 if successful, 400 if unsuccessful.

## remove_member.php

Removes a member from a list

### Required parameters

`member` - email of member to remove
`list` - name of list

### Sample response

HTTP status code will return 200 if successful, 400 if unsuccessful.

## find_member.php

Returns a list of the names of all lists that a given member is in.

### Required parameters

`member` - email of member to look for

### Sample response

```
["my_list2", "my_list3"]
```

## remove_member_from_all_lists.php

Removes the member from all lists.

### Required parameters

`member` - email of member to look for

### Sample response

HTTP status code will return 200 if successful, 400 if unsuccessful.

