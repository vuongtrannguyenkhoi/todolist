# installation steps
- sudo docker build -t todolist_php (build custom php with some extensions by Dockerfile)
- sudo docker-composer up
- access mysql container to create database and table with user: root and password: secret
    - sudo docker exec -it db_mysql_1 bash
    - mysql -u root -p
- (optional): you can use any GUI tool like mysql workbench to remote access database with port 33060
- table tasks:
````
CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `user_id` int NOT NULL,
  `status` tinyint DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
````
Now you can test the api via address: ip:8080
- GET ip:8080/tasks
- POST ip:8080/tasks
````
{
    "user_id": 1,
    "name": "My first task"
}
````
- GET ip:8080/tasks/1

- PUT ip:8080/tasks/1
````
{
    "name": "[update] my first task",
    "status": 1
}
````
- DELETE ip:8080/tasks/1
