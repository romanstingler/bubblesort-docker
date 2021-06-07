# bubblesort-docker

### Installation and getting started
**Prerequisites: docker-compose**  

For simplicity well known containers has been used. 
When creating own container focus on size and security is required.

Clone this repository and run `docker-compose up`.

### Usage
The script location is `api/task1.php`.
First you will need the secret, which is provided for now in the above mentioned script.
This secret must be provided as header parameter `secret`.

You have an API endpoint at
`http://localhost:9999/api/task1.php`
where you can enter an unsorted array of integers and will receive the desc sorted array back.

For simplicity no external packages have been used and only the most important checks have been made.
* valid secret
* valid JSON
* POST method used
* "values" key exists in POST data
* "values" array consists only of integers

### Sample
POST body JSON data
```json
{
    "values": [6,8,9,8,3,9,7]
}
```


**Postman request**
```
  curl -X POST \
  http://localhost:9999/api/task1.php \
  -H 'cache-control: no-cache' \
  -H 'postman-token: 827d606e-1fc9-183f-84bf-39b25e125d20' \
  -H 'secret: R4Nd0M' \
  -d '{
  "values": [1,2,33,54,56,2,354,2345,3465,3463456]
}'
```

### API Dcoumentation

http://localhost:9999/api/doc/



TODO: remove .php in nginx config
