# bubblesort-docker

### Installation and getting started
**Prerequisites: docker-compose**

Clone this repository and run `docker-compose up`.

### Usage
First you will need the secret.
This secret must be provided as header parameter `secret`.

You have an API endpoint at
`http://localhost:9999/api/task1.php`
where you can enter an unsorted array of integers and will receive the desc sorted array back.

POST body JSON data
```
{
    "values": [6,8,9,8,3,9,7]
}
```

### API Dcoumentation

http://localhost:9999/api/doc/



TODO: remove .php in nginx config